<?php

namespace App\Core\Dashboard\DTO;

class DescreptionArticleDto
{


    public $title, $content, $articleId, $order;

    public function __construct($title, $content, $articleId, $order)
    {

        $this->title = $title;
        $this->content = $content;
        $this->articleId = $articleId;
        $this->order = $order;
    }

    public function getTitle()
    {

        return $this->title;
    }

    public function getContent()
    {

        return $this->content;
    }

    public function getArticleId()
    {

        return $this->articleId;
    }

    public function getOrder()
    {


        return $this->order;
    }
}
