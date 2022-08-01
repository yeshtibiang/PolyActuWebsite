<?php

interface ArticleInterface
{
    function getAllArticles();
    function getAllArticlesByCategory($category);
    function getOneArticle($id);
    function updateOneArticle($id, $title, $content, $category);
    function deleteOneArticle($id);
}