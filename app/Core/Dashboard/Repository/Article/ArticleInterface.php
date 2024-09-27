<?php

namespace App\Core\Dashboard\Repository\Article;

use App\Core\Dashboard\DTO\ArticleDto;


interface ArticleInterface
{



    public function findWithRelation($id, ...$withRelation);
    public function findOrFailWithRelation($id, ...$withRelation);
    public function allWithRelation(...$withRelation);
    public function create(ArticleDto $articleDto);
    public function update($article, $data);
    public function delete($article);
    public function createSubUsers($article, $subUserIds);
    public function updateSubUsers($article, $subUserIds);
    public function getBanner($article);
    public function deleteBanner($article);
    public function getVideo($article);
    public function deleteVideo($article);
    public function getBeforeAndAfter($article);
    public function deleteBeforeAndAfter($article);
    public  function getGalleries($article);
    public function deleteGalleries($article);
    public function allPaginateWithRelation($paginate, ...$withRelation);
}
