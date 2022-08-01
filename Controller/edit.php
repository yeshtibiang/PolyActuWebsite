<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/polytech/Models/ContentModel.php");

if (isset($_SESSION["email"])){
    $model = new ContentModel();
    $articles = $model->getOneArticle($id);

    if (isset($_POST["submit"])){
        var_dump($_POST["submit"]);
        if ($articles != null){
            $model->updateOneArticle($id, $_POST["title"], $_POST["content"], $_POST["category"]);
            header("location: /polytech/admin");
        }
        else{
            echo "Error";
        }
    }else
    {
        $model = new ContentModel();
        $article = $model->getOneArticle($id);
        require_once($_SERVER['DOCUMENT_ROOT'].'/polytech/Views/editone.php') ;
    }
}
else{
    header("Location: /login");
}