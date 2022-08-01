<?php

class Db{

    private function getConnection(): PDO
    {
        try {
            $username = "root";
            $password = "root";
            return new PDO('mysql:host=localhost;dbname=ecole;charset=utf8', $username, $password);
        }
        catch (PDOException){
            die("Erreur de connection à la base de données");
        }

    }
}
