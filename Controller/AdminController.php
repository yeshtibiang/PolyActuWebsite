<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/polytech/Models/ContentModel.php");
class AdminController{

    private ContentModel $contentModel;
    public function __construct(ContentModel $model)
    {
        $this->contentModel = $model;
    }


    public function showAllArticles(): void
    {
        $articles = $this->contentModel->getAllArticles();
        require_once($_SERVER['DOCUMENT_ROOT'].'/polytech/Views/adminIndex.php') ;
    }

    public function addOneArticle($title, $category, $content): void
    {
        $article = $this->contentModel->addOneArticle($title, $category, $content);
        if ($article == 1){
            header("location: /polytech/admin");
        }
    }
}

$model = new ContentModel();
$controller = new AdminController($model);

if (isset($_SESSION["email"])){
    if (isset($_POST["submit"])){
        $controller->addOneArticle($_POST["title"], $_POST["category"], $_POST["content"]);
    }
    else{
        $controller->showAllArticles();
    }


} else {
    header("Location: /login");

}

