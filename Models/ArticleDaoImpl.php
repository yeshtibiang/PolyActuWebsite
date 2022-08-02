<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/polytech/Models/ArticleInterface.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/polytech/Models/DaoFactory.php');


class ArticleDaoImpl implements ArticleInterface
{
    private DaoFactory $daoFactory;
    private PDO|null $db;

    public function __construct(DaoFactory $daoFactory)
    {
        $this->daoFactory = $daoFactory;
        $this->db = $this->daoFactory->getConnection();
    }

    public function getAllArticles(){

        try{
            $requete = 'SELECT * FROM articles order by createdDate desc';
            $dbreq = $this->db->prepare($requete);
            $dbreq->execute();
            $this->closeConnection();
            return $dbreq->fetchAll();
        }
        catch(PDOException $e){
            die("erreur: ".$e->getMessage());
        }
    }

    public function getArticlesBySql($sql){
        try{
            $dbreq = $this->db->prepare($sql);
            $dbreq->execute();
            $this->closeConnection();
            return $dbreq->fetchAll();
        }
        catch(PDOException $e){
            die("erreur: ".$e->getMessage());
        }
    }

    public function getArticlesRowsNumber(){
        try{
            $url ="http://localhost:8082/servicesr_war/webapi/articles/all_json";
            $client = curl_init($url);
            curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($client);
            $articles = json_decode($response, true);
            return count($articles);
        }
        catch(PDOException $e){
            die("erreur: ".$e->getMessage());
        }
    }

    public function getAllArticlesByCategory($category){

        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = 'SELECT * FROM articles where category = :category order by createdDate desc';
            $dbreq = $this->db->prepare($requete);
            $dbreq->execute([
                'category' => $category
            ]);
            $this->closeConnection();
            return $dbreq->fetchAll();
        }
        catch(PDOException $e){
            die("erreur: ".$e->getMessage());
        }
    }

    function addOneArticle($title, $category, $content){
        try{
            $createdDate = date("Y-m-d H:i:s");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = 'INSERT INTO articles (title, category, content, createdDate) VALUES (:title, :category, :content, :createdDate)';
            $dbreq = $this->db->prepare($requete);
            $dbreq->execute([
                'title' => $title,
                'category' => $category,
                'content' => $content,
                'createdDate' => $createdDate
            ]);
            $this->closeConnection();
            return 1;
        }
        catch(PDOException $e){
            die("erreur: ".$e->getMessage());
        }
    }

    function getOneArticle($id){
        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = 'SELECT * FROM articles where id = :id';
            $dbreq = $this->db->prepare($requete);
            $dbreq->execute([
                'id' => $id
            ]);
            $this->closeConnection();
            return $dbreq->fetchAll();
        }
        catch(PDOException $e){
            die("erreur: ".$e->getMessage());
        }
    }

    public function updateOneArticle($id, $title, $content, $category){
        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = 'UPDATE articles SET title = :title, content = :content, category = :category WHERE id = :id';
            $dbreq = $this->db->prepare($requete);
            $dbreq->execute([
                'id' => $id,
                'title' => $title,
                'content' => $content,
                'category' => $category
            ]);
            $this->closeConnection();
            return "sucess";
        }
        catch(PDOException $e){
            die("erreur: ".$e->getMessage());
        }
    }

    public function deleteOneArticle($id){
        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = 'DELETE FROM articles WHERE id = :id';
            $dbreq = $this->db->prepare($requete);
            $dbreq->execute([
                'id' => $id
            ]);
            $this->closeConnection();
            return "success";
        }
        catch(PDOException $e){
            die("erreur: ".$e->getMessage());
        }
    }

    function closeConnection(){
        $this->db = null;
    }
}