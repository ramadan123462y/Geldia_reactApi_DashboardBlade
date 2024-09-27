<?php

namespace App\Core\Dashboard\Service;

use App\Core\Dashboard\DTO\VideoDto;
use App\Core\Dashboard\Repository\Video\VideoInterface;
use App\Core\Trait\FileTrait;

class VideoService
{


    public $videoInterface;
    use FileTrait;
    public function __construct(VideoInterface $videoInterface)
    {


        $this->videoInterface = $videoInterface;
    }

    public function  create(VideoDto $videoDto)
    {


        $this->videoInterface->create($videoDto);
        FileTrait::uploade($videoDto->getVideoFile(), $videoDto->getVideoName(), 'Articles/Videos', 'uploades');
    }
}
