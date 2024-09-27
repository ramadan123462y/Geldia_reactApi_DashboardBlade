<?php

namespace App\Core\Dashboard\Repository\ArticleSubCategorie;

use App\Core\Dashboard\DTO\ArticlesubcategorieDto;
use App\Models\Articlesubcategorie;


class ArticleSubCategorieRepository
{

    public function allPaginate($paginate)
    {


        return Articlesubcategorie::with('articlecategorie')->paginate($paginate);
    }

    public function store(ArticlesubcategorieDto $articlesubcategorieDto)
    {

        Articlesubcategorie::create([

            'name' => $articlesubcategorieDto->getName(),
            'articlecategorie_id' => $articlesubcategorieDto->getArticleCategorieId(),

            'image_name' => $articlesubcategorieDto->getImageName(),
            'descreption' => $articlesubcategorieDto->getDescreption()
        ]);
    }

    public function findById($id)
    {

        return  Articlesubcategorie::findorfail($id);
    }

    public function deleteById($id)
    {


        $this->findById($id)->delete();
    }

    public function updateById($data, $id)
    {



        $this->findById($id)->update($data);
    }

    public function getIdAndName()
    {

        return   Articlesubcategorie::get(['id', 'name']);
    }
}
