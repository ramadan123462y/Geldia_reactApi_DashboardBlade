<?php

namespace App\Core\Dashboard\Repository\ArticleCategorie;

use App\Core\Dashboard\DTO\ArticleCategorieDto;
use App\Models\Articlecategorie;
use App\Models\Articlesubcategorie;

class ArticleCategorieRepository implements ArticleCategorieInterface
{

    public function all()
    {


        return  Articlecategorie::all();
    }


    public function allPaginate($paginate)
    {

        return Articlecategorie::paginate($paginate);
    }

    public function store(ArticleCategorieDto $articleCategorieDto)
    {


        Articlecategorie::create([

            'name' => $articleCategorieDto->getName(),
            'image_name' => $articleCategorieDto->getImageName(),

        ]);
    }

    public function findById($id)
    {


        return Articlecategorie::findorfail($id);
    }

    public function deleteById($id)
    {


        $this->findById($id)->delete();
    }

    public function updateById($data, $id)
    {

        $this->findById($id)->update($data);
    }

    public function findByIdOrNull($id)
    {
        return Articlecategorie::find($id);
    }


    public function getSubCategoriesById($id)
    {



        return $this->findByIdOrNull($id)->articlesubcategories;
    }
}
