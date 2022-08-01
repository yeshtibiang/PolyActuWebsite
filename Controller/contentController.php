<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/polytech/Models/ContentModel.php");
class ContentController{

    private $contentModel;
    public function __construct(ContentModel $model)
    {
        $this->contentModel = $model;
    }

    public function showArticlesByCategory($category): void
    {
        $articles = $this->contentModel->getArticlesByCategory($category);
        require './Views/indexView.php';
    }
}

$model = new ContentModel();
$controller = new ContentController($model);

$controller->showArticlesByCategory($category);


//class ContentController{
//    public function __construct()
//    {
//    }
//
//    public function run(): void{
//        require './Models/contentModel.php';
//        $articles = (new ContentModel())->getArticlesByCategory();
//        require './Views/indexView.php';
//require "./Models/ArticleDAO.php";
//$articles = (new ArticleDAO())->getAllArticlesByCategory($category);
//
////$articles = (new ContentModel())->getArticlesByCategory();
//require './Views/indexView.php';


?>