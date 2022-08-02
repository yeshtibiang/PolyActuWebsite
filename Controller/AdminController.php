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
        $url ="http://localhost:8082/servicesr_war/webapi/articles/all_json";
        $client = curl_init($url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        $articles = json_decode($response, true);
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
    header("Location: /polytech/login");

}

