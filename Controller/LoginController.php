<?php
session_start();

if (isset($_SESSION["email"])){
    header("location: http://localhost/polytech");
}
else{
    include $_SERVER['DOCUMENT_ROOT']."/polytech/Models/db.classe.php";
    include $_SERVER['DOCUMENT_ROOT']."/polytech/Models/login.class.php";
    if (isset($_POST["submit"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $signIn = new Login();
            $signIn->login($email, $password);
        }
        else{
            $errorEmail = "Email ou Mot de passe Invalide!";
            header("location: http://localhost/polytech/login");
        }

    }
    include "./Views/login.php";
}






