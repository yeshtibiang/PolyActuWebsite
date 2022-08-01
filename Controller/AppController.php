<?php

class AppController
{
    private $contentModel;
    public function __construct(ContentModel $model)
    {
        $this->contentModel = $model;
    }

}

