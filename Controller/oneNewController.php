<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/polytech/Models/ContentModel.php");

class OneNewController{
    private $contentModel;

    public function __construct($model)
    {
        $this->contentModel = $model;
    }

    public function shoOneArticle($id): void
    {
        $articles = $this->contentModel->getOneArticle($id);
        require './Views/oneNewView.php';
    }
}

$model = new ContentModel();
$controller = new OneNewController($model);
$controller->shoOneArticle($id);

?>