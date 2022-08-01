<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/polytech/Models/ContentModel.php");

if (isset($_SESSION["email"])){

    $model = new ContentModel();
    $result = $model->deleteOneArticle($id);

    if ($result == "success"){
        header("location: /polytech/admin");
    }
    else{
        echo "Error";
    }
}

?>
