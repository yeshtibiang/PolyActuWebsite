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
            $requete = 'SELECT * FROM articles';
            $dbreq = $this->db->prepare($requete);
            $dbreq->execute();
            $this->closeConnection();
            return $dbreq->fetchAll();
        }
        catch(PDOException $e){
            die("erreur: ".$e->getMessage());
        }
    }

    public function getAllArticlesByCategory($category){

        try{
            //$category = $_GET["category"];
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = 'SELECT * FROM articles where category = :category';
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
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = 'INSERT INTO articles (title, category, content) VALUES (:title, :category, :content)';
            $dbreq = $this->db->prepare($requete);
            $dbreq->execute([
                'title' => $title,
                'category' => $category,
                'content' => $content
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