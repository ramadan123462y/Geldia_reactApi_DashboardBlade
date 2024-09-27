<?php

namespace App\Core\Dashboard\Repository\Article;

use App\Core\Dashboard\DTO\ArticleDto;
use App\Models\Article;

class ArticleRepository implements ArticleInterface
{


    public function findWithRelation($id, ...$withRelation)
    {

        return Article::with($withRelation)->find($id);
    }

    public function findOrFailWithRelation($id, ...$withRelation)
    {

        return Article::with($withRelation)->findOrFail($id);
    }

    public function allWithRelation(...$withRelation)
    {

        return Article::with($withRelation)->get();
    }
    public function allPaginateWithRelation($paginate, ...$withRelation)
    {

        return Article::with($withRelation)->paginate($paginate);
    }

    public function create(ArticleDto $articleDto)
    {

        $article = Article::create([

            'title' => $articleDto->getTitle(),
            'is_new' => $articleDto->getIsNew(),
            'image_file' => $articleDto->getImageName(),
            'articlesubcategorie_id' => $articleDto->getArticleSubCategorieId(),
            'user_id' => $articleDto->getUserId(),
            'home_page' => $articleDto->getHomePage(),
            'most_famous' => $articleDto->getMostFamous(),
        ]);

        return $article;
    }

    public function update($article, $data)
    {


        $article->update($data);
    }

    public function delete($article)
    {

        $article->delete();
    }

    public function createSubUsers($article, $subUserIds)
    {


        $article->subUsers()->attach($subUserIds);
    }

    public function updateSubUsers($article, $subUserIds)
    {

        $article->subUsers()->sync($subUserIds);
    }

    public function getBanner($article)
    {


        return  $article->banner;
    }

    public function deleteBanner($article)
    {

        $article->banner()->delete();
    }

    public function getVideo($article)
    {

        return $article->video;
    }

    public function deleteVideo($article)
    {

        return  $article->video()->delete();
    }

    public function getBeforeAndAfter($article)
    {


        return  $article->beforeafter;
    }

    public function deleteBeforeAndAfter($article)
    {


        $article->beforeafter()->delete();
    }

    public  function getGalleries($article)
    {

        return $article->galleries;
    }

    public function deleteGalleries($article)
    {

        $article->galleries()->delete();
    }
}
