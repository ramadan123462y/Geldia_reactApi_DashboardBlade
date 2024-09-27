<?php

namespace App\Core\Dashboard\Repository\DescreptionArticle;

use App\Core\Dashboard\DTO\DescreptionArticleDto;
use App\Models\DescreptionArticle;

class DescreptionArticleRepository implements DescreptionArticleInterface
{



    public function create(DescreptionArticleDto $descreptionArticleDto)
    {


        DescreptionArticle::create([


            'title' => $descreptionArticleDto->getTitle(),
            'content' => $descreptionArticleDto->getContent(),
            'article_id' => $descreptionArticleDto->getArticleId(),
            'order' => $descreptionArticleDto->getOrder(),

        ]);
    }
}
