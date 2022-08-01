<?php

class Article extends ArticleDAO {
    private $title;
    private $content;
    private $category;

    public function getTitle(){
        return $this->title;
    }

    public function getContent(){
        return $this->content;
    }

    public function getCategory(){
        return $this->category;
    }

    public function setTitle($newTitle): void
    {
        $this->title = $newTitle;
    }

    public function setContent($newContent): void
    {
        $this->content = $newContent;
    }

    public function setCategory($newCategory): void
    {
        $this->category = $newCategory;
    }

}

?>