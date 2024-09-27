<?php

namespace App\Core\Dashboard\Repository\ArticleCategorie;

use App\Core\Dashboard\DTO\ArticleCategorieDto;

interface ArticleCategorieInterface
{


    public function all();
    public function allPaginate($paginate);
    public function store(ArticleCategorieDto $articleCategorieDto);
    public function findById($id);
    public function deleteById($id);
    public function updateById(ArticleCategorieDto $articleCategorieDto, $id);
    public function findByIdOrNull($id);
    public function getSubCategoriesById($id);
}
