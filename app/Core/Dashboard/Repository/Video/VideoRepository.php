<?php

namespace App\Core\Dashboard\Repository\Video;

use App\Core\Dashboard\DTO\VideoDto;
use App\Models\Video;

class VideoRepository implements VideoInterface
{



    public function create(VideoDto $videoDto)
    {


        Video::create([

            'video_name' => $videoDto->getVideoName(),
            'article_id' => $videoDto->getArticleId(),
            'home_page' => $videoDto->getVideoHomePage()

        ]);
    }
}
