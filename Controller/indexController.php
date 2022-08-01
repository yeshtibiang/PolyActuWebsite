<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/polytech/Models/ContentModel.php");

class IndexController{

    private $contentModel;
    public function __construct(ContentModel $model)
    {
        $this->contentModel = $model;
    }

    public function showAllArticlesBySql($sql): void
    {
        $articles = $this->contentModel->getArticlesBySql($sql);

        require_once './Views/indexView.php';
    }
}

$no_of_records_per_page = 5;
$offset = ($page - 1) * $no_of_records_per_page;

$model = new ContentModel();
$controller = new IndexController($model);

$total_rows = $model->getArticlesRowsNumber();

$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM articles order by createdDate desc LIMIT  $offset, $no_of_records_per_page ";

$articles = $model->getArticlesBySql($sql);
require_once './Views/indexView.php';
//$controller->showAllArticlesBySql($sql);

?>