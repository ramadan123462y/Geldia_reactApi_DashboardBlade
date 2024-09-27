<?php

namespace App\Core\Dashboard\Repository\Video;

use App\Core\Dashboard\DTO\VideoDto;



interface VideoInterface
{



    public function create(VideoDto $videoDto);
}
