<?php

namespace App\Core\Dashboard\Service;

use App\Core\Dashboard\DTO\ArticleCategorieDto;
use App\Core\Dashboard\Repository\ArticleCategorie\ArticleCategorieRepository;
use App\Core\Trait\FileTrait;
use App\Http\Requests\ArticleCategorieRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticleCategorieService
{

    use FileTrait;

    public $articleCategorieRepository;
    public function __construct(ArticleCategorieRepository $articleCategorieRepository)
    {

        $this->articleCategorieRepository = $articleCategorieRepository;
    }

    private function validateImage($imageName)
    {

        validator(['image_name' => $imageName], [

            'image_name' => 'image'
        ])->validate();
    }
    public function store(ArticleCategorieRequest $request)
    {

        $articleCategorieDto = $this->handleDto($request);

        $this->validateImage($request->image_name);


        $this->articleCategorieRepository->store($articleCategorieDto);

        FileTrait::uploade($articleCategorieDto->getImageFile(), $articleCategorieDto->getImageName(), 'Articles/Categories', 'uploades');
    }

    public function deleteById($id)
    {
        $articleCategorie = $this->articleCategorieRepository->findById($id);
        FileTrait::delete(public_path('Backend\Uploades\Articles\Categories\\' .  $articleCategorie->image_name));
        $this->articleCategorieRepository->deleteById($id);
    }

    private function handleDto($request)
    {

        $imageName = null;

        if ($request->hasFile('image_name')) {

            $imageName = Str::uuid() . '.' .  $request->file('image_name')->getClientOriginalExtension();
        }

        return  new ArticleCategorieDto(
            $request->name,
            $imageName,
            $request->file('image_name')
        );
    }

    public function update(ArticleCategorieRequest $request)
    {
        $articleCategorie = $this->articleCategorieRepository->findById($request->id);

        $articleCategorieDto = $this->handleDto($request);
        $data = [

            'name' => $articleCategorieDto->getName(),
        ];

        if ($request->hasFile('image_name')) {
            $this->validateImage($request->image_name);
            $data['image_name'] = $articleCategorieDto->getImageName();
            FileTrait::delete(public_path('Backend\Uploades\Articles\Categories\\' .  $articleCategorie->image_name));
            FileTrait::uploade($articleCategorieDto->getImageFile(), $articleCategorieDto->getImageName(), 'Articles/Categories', 'uploades');
        }
        $this->articleCategorieRepository->updateById($data, $request->id);
    }
}
