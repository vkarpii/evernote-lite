<?php
namespace App\Controller;

use App\Service\NoteService;

class NoteController{

    public function __construct(private NoteService $noteService) {}
}

?>