<?php

namespace App\Core\Dashboard\Repository\ArticleSubCategorie;

use App\Core\Dashboard\DTO\ArticlesubcategorieDto;




interface ArticleSubCategorieInterface
{


    public function allPaginate($paginate);
    public function store(ArticlesubcategorieDto $articlesubcategorieDto);
    public function findById($id);
    public function deleteById($id);
    public function updateById(ArticlesubcategorieDto $articlesubcategorieDto, $id);
}
