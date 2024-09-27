<?php

namespace App\Core\Dashboard\Repository\BeforeAfter;

use App\Core\Dashboard\DTO\BeforeAfterDto;
use App\Models\BeforeAfter;

class BeforeAfterRepository implements BeforeAfterInterface
{


    public function create(BeforeAfterDto $beforeAfterDto)
    {
        BeforeAfter::create([


            'image_before' => $beforeAfterDto->getImageBeforeName(),
            'image_after' => $beforeAfterDto->getImageAfterName(),
            'article_id' => $beforeAfterDto->getArticleId(),
        ]);
    }
}
