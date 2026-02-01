<?php
namespace App\Core;

use ReflectionClass;

class Container
{
    private array $instances = [];

    // Вручну зареєстровані інстанси
    public function set(string $id, $value): void
    {
        $this->instances[$id] = $value;
    }

    public function get(string $class)
    {
        if (isset($this->instances[$class])) {
            return $this->instances[$class];
        }

        $reflection = new ReflectionClass($class);
        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            return $this->instances[$class] = new $class();
        }

        $params = [];
        foreach ($constructor->getParameters() as $param) {
            $type = $param->getType();

            if (!$type) {
                throw new \Exception("No type hint for {$param->getName()} in $class");
            }

            $typeName = $type->getName();

            // Якщо primitive чи manual, беремо з $instances
            if (isset($this->instances[$typeName])) {
                $params[] = $this->instances[$typeName];
            } else {
                // рекурсивно створюємо
                $params[] = $this->get($typeName);
            }
        }

        return $this->instances[$class] = $reflection->newInstanceArgs($params);
    }
}
?>