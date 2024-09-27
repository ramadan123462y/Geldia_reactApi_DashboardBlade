<?php

namespace App\Core\Dashboard\Service;

use App\Core\Dashboard\DTO\ArticlesubcategorieDto;
use App\Core\Dashboard\Repository\ArticleSubCategorie\ArticleSubCategorieRepository;
use App\Core\Trait\FileTrait;
use App\Http\Requests\ArticleSubCategorieRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\FuncCall;

class ArticleSubCategorieService
{

    use FileTrait;

    public $articleSubCategorieRepository;

    public function __construct(ArticleSubCategorieRepository $articleSubCategorieRepository)
    {


        $this->articleSubCategorieRepository = $articleSubCategorieRepository;
    }



    public function store(ArticleSubCategorieRequest $request)
    {
        $articleSubCategorieDto = $this->handleDto($request);

        $this->validateImage($request->image_name);

        $this->articleSubCategorieRepository->store($articleSubCategorieDto);

        FileTrait::uploade($articleSubCategorieDto->getImageFile(), $articleSubCategorieDto->getImageName(), 'Articles/SubCategories', 'uploades');
    }

    private  function  handleDto($request)
    {

        $imageName = null;

        if ($request->file('image_name')) {


            $imageName =   Str::uuid() . '.' .  $request->file('image_name')->getClientOriginalExtension();
        }

        return new ArticlesubcategorieDto(
            $request->name,
            $request->articlecategorie_id,
            $imageName,
            $request->descreption,
            $request->file('image_name'),

        );
    }




    public function deleteById($id)
    {

        $articleSubCategorie = $this->articleSubCategorieRepository->findById($id);
        FileTrait::delete(public_path('Backend\Uploades\Articles\SubCategories\\' . $articleSubCategorie->image_name));

        $this->articleSubCategorieRepository->deleteById($id);
    }

    public function update(ArticleSubCategorieRequest $request)
    {
        $articleSubCategorie = $this->articleSubCategorieRepository->findById($request->idarticlesubcategorie_id);
        $articleSubCategorieDto = $this->handleDto($request);

        $data = [
            'name' => $articleSubCategorieDto->getName(),
            'articlecategorie_id' => $articleSubCategorieDto->getArticleCategorieId(),
            'descreption' => $articleSubCategorieDto->getDescreption()

        ];

        if ($request->hasFile('image_name')) {

            $this->validateImage($request->image_name);

            FileTrait::delete(public_path('Backend\Uploades\Articles\SubCategories\\' . $articleSubCategorie->image_name));
            FileTrait::uploade($articleSubCategorieDto->getImageFile(), $articleSubCategorieDto->getImageName(), 'Articles/SubCategories', 'uploades');

            $data['image_name'] = $articleSubCategorieDto->getImageName();
        }


        $this->articleSubCategorieRepository->updateById($data, $request->idarticlesubcategorie_id);
    }

    private function validateImage($imageName)
    {

        validator(['image_name' => $imageName], [
            'image_name' => 'image'
        ])->validate();
    }
}
