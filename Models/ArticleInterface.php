<?php

interface ArticleInterface
{
    function getAllArticles();
    function getAllArticlesByCategory($category);
    function getOneArticle($id);
    function updateOneArticle($id, $title, $content, $category);
    function deleteOneArticle($id);
    function addOneArticle($title, $category, $content);
}