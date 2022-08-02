<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <style><?php include './Styles/style.css'; ?></style>
    <title>ActusPolytech</title>
</head>
<body>
<div class="polyhead">
    <h3>Actus Polytech</h3>
</div>
<nav class="menu">
    <ul>
        <li>
            <a href="http://localhost/polytech/">Accueil</a>
        </li>
        <li>
            <a href="http://localhost/polytech/sport">Sport</a>
        </li>
        <li>
            <a href="http://localhost/polytech/politique">Politique</a>
        </li>
        <li>
            <a href="http://localhost/polytech/education">Education</a>
        </li>
        <li>
            <a href="http://localhost/polytech/sante">Santé</a>
        </li>
        <li>
            <a href="http://localhost/polytech/admin">
                Administration Articles
            </a>
        </li>
        <?php if (isset($_SESSION["email"]))
        {
        ?>
            <li>
                <a href="http://localhost/polytech/logout">
                    Déconnexion
                </a>
            </li>
        <?php
        }else{
            ?>
            <li>
                <a href="http://localhost/polytech/login">Login</a>
            </li>
        <?php }
        ?>
    </ul>
</nav>