<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/polytech/Models/ContentModel.php");

class IndexController{

    private $contentModel;
    public function __construct(ContentModel $model)
    {
        $this->contentModel = $model;
    }

    public function showAllArticles(): void
    {
        $articles = $this->contentModel->getAllArticles();

        require_once './Views/indexView.php';
    }
}

$model = new ContentModel();
$controller = new IndexController($model);
$controller->showAllArticles();
?>