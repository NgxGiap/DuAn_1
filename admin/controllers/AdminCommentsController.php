<?php

class AdminCommentsController
{
    public $modelComments;
    public function __construct()
    {
        $this->modelComments = new AdminComments;
    }
    public function listComments()
    {
        $listComments = $this->modelComments->getAllComments();
        require_once './views/comments/listComments.php';
    }
}
