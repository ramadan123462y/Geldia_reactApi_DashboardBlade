<?php

namespace App\Http\Controllers;

use App\Core\Trait\FileTrait;
use App\Models\Article;
use Illuminate\Http\Request;


class TestController extends Controller
{

    public function test()
    {
        return $this->findWithRelation(
            1,
            'articlesubcategorie',
            'user',
            'descreptionArticles',
            'subUsers',
            'banner',
            'galleries',
            'video',
            'beforeafter'
        );
    }

    public function findWithRelation($id, ...$withRelations)
    {
        return Article::with($withRelations)
            ->find($id);
    }
}
