<?php

require($_SERVER['DOCUMENT_ROOT'].'/polytech/Models/DaoFactory.php');
require($_SERVER['DOCUMENT_ROOT'].'/polytech/Models/ArticleDaoImpl.php');

class ContentModel{
    private $daoFact;
    public function __construct()
    {
        $this->daoFact = DaoFactory::getInstance();
    }

    public function getArticlesByCategory($category){
        return (new ArticleDaoImpl($this->daoFact))->getAllArticlesByCategory($category);
    }

    public function addOneArticle($title, $category, $content){
        return (new ArticleDaoImpl($this->daoFact))->addOneArticle($title, $category, $content);
    }

    public function getOneArticle($id){
        return (new ArticleDaoImpl($this->daoFact))->getOneArticle($id);
    }

    public function getAllArticles(){
        return (new ArticleDaoImpl($this->daoFact))->getAllArticles();
    }

    public function getArticlesBySql($sql){
        return (new ArticleDaoImpl($this->daoFact))->getArticlesBySql($sql);
    }

    public function getArticlesRowsNumber(){
        return (new ArticleDaoImpl($this->daoFact))->getArticlesRowsNumber();
    }

    public function updateOneArticle($id, $title, $content, $category){
        return (new ArticleDaoImpl($this->daoFact))->updateOneArticle($id, $title, $content, $category);
    }

    public function deleteOneArticle($id){
        return (new ArticleDaoImpl($this->daoFact))->deleteOneArticle($id);
    }
}
?>