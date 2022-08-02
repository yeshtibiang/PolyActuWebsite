<?php

$url = [''];
$catRoutes = ["sport", "politique", "education", "sante"];

if (isset($_GET['url'])){
    $url = explode('/', $_GET['url']);
}
if ($url[0] == ''){
    $page = $_GET['page'] ?? 1;
    require './Controller/indexController.php';

}
elseif ($url[0] == "login" and !isset($url[1])){
    $errorMessage = $_GET['errorMessage'] ?? "";
    require './Controller/LoginController.php';
}
elseif ($url[0] == "logout" and !isset($url[1])){
    require './Controller/LogoutController.php';
}
elseif ($url[0] == "admin" and !isset($url[1])){
    require './Controller/adminController.php';
}
elseif (in_array($url[0], $catRoutes) and !isset($url[1])){
    $category = $url[0];
    require './Controller/contentController.php';
}
elseif ($url[0] == "admin" and isset($url[1]) and isset($url[2]) and $url[2] == "delete"){
    $id = $url[1];
    require './Controller/delete.php';
}
elseif ($url[0] == "admin" and isset($url[1]) and isset($url[2]) and $url[2] == "edit"){
    $id = $url[1];
    require './Controller/edit.php';
}
elseif (isset($url[1]) && $url[1] != '' and !isset($url[2])){
    $id = intval($url[1]);
    require './Controller/oneNewController.php';
}
else{
    require './Views/404.php';
}

?>

