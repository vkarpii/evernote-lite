<?php
namespace App\Controller;

class NoteController{
    public function index(): void{
        #Redirect
        if(!isset($_SESSION['user_id'])){
            header('Location: login');
        }

        $notes = [];

        ob_start();
        require __DIR__ . '/../../views/notes/index.php';
        $content = ob_get_clean();

        require __DIR__ . '/../../views/layout.php';
    }
}

?>