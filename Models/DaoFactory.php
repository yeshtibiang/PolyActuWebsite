<?php

class DaoFactory{
    private string $url;
    private string $username;
    private string $password;

    public function __construct($url, $username, $password)
    {
        $this->url = $url;
        $this->username = $username;
        $this->password = $password;
    }
//$this->db = new PDO('mysql:host=localhost;dbname=polyactu;charset=utf8', 'root', 'root');

    public static function getInstance() : DaoFactory{
        return new DaoFactory('mysql:host=localhost;dbname=polyactu;charset=utf8', 'root', 'root');
    }

    public function getConnection(): PDO
    {
        try {
            $pdo = new PDO($this->url, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        catch (PDOException){
            die("Erreur de connection à la base de données");
        }

    }

    // Recuperons le dao
    public function getArticleDao(): ArticleDaoImpl
    {
        return new ArticleDaoImpl($this);
    }

}