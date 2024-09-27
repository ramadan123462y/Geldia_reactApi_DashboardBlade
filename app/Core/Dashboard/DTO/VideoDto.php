<?php

namespace App\Core\Dashboard\DTO;




class VideoDto
{

    // video_home_page
    public $videoName, $articleId, $videoFile, $videoHomePage;

    public function __construct($videoName, $articleId, $videoFile, $videoHomePage)
    {

        $this->videoName = $videoName;
        $this->articleId = $articleId;
        $this->videoFile = $videoFile;
        $this->videoHomePage = $videoHomePage;
    }

    public function getVideoHomePage()
    {

        return $this->videoHomePage;
    }

    public function getVideoName()
    {


        return $this->videoName;
    }

    public function getVideoFile()
    {

        return $this->videoFile;
    }

    public function getArticleId()
    {


        return $this->articleId;
    }
}
