<?php
declare(strict_types=1);

session_start();

spl_autoload_register(function($class){
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../src/';
    
    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }

    $relative_class = substr($class, strlen($prefix));
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

use App\Core\Container;
$container = new Container();
$container->set(\PDO::class, new PDO(
    'mysql:host=localhost;dbname=evernote_lite',
    'root',
    ''
));

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace("index.php",'',$uri);
#var_dump($uri);
$method = $_SERVER['REQUEST_METHOD'];

$routes = [
    'GET' => [
        '/' => [App\Controller\NoteController::class, 'index'],
        '/login' => [App\Controller\AuthController::class, 'login'],
        '/registration' => [App\Controller\AuthController::class, 'registration'],
        '/exit' => [App\Controller\AuthController::class, 'exit']
    ],
    'POST' => [
       '/loginAction' => [App\Controller\AuthController::class, 'loginAction'],
       '/registrationAction' => [App\Controller\AuthController::class, 'registrationAction'],
    ],
];

if(!isset($routes[$method][$uri])){
    http_response_code(404);
    exit();
}

[$controllerClass, $action] = $routes[$method][$uri];
$controller = $container->get($controllerClass);
$controller->$action();

?>