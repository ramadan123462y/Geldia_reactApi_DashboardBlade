<?php

namespace App\Core\Dashboard\Repository\DescreptionArticle;

use App\Core\Dashboard\DTO\DescreptionArticleDto;




interface DescreptionArticleInterface
{


    public function create(DescreptionArticleDto $descreptionArticleDto);
}
