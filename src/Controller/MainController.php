<?php
namespace App\Controller;

use App\Service\NoteService;
use App\Service\AuthService;

class MainController{
    public function __construct(private NoteService $noteService,private AuthService $authService)
    {}

    public function index(): void{
        #Redirect
        if(!isset($_SESSION['user_id'])){
            header('Location: login');
        }
        $user = $this->authService->getCurrentUser();

        $notes = $this->noteService->getNotesForUser($user->getId());

        ob_start();
        require __DIR__ . '/../../views/notes/index.php';
        $content = ob_get_clean();
        require __DIR__ . '/../../views/layout.php';
    }

    public function addNewNote(): void{
        #Redirect
        if(!isset($_SESSION['user_id'])){
            header('Location: login');
        }
        $user = $this->authService->getCurrentUser();

        ob_start();
        require __DIR__ . '/../../views/create-edit/index.php';
        $content = ob_get_clean();
        require __DIR__ . '/../../views/layout.php';
    }
}
?>