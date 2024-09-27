<?php

namespace App\Http\Controllers\Dashboard\Articles;

use App\Core\Dashboard\DTO\ArticlesubcategorieDto;
use App\Core\Dashboard\Repository\ArticleCategorie\ArticleCategorieRepository;
use App\Core\Dashboard\Repository\ArticleSubCategorie\ArticleSubCategorieRepository;
use App\Core\Dashboard\Service\ArticleSubCategorieService;
use App\Core\Trait\FileTrait;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleSubCategorieRequest;
use App\Models\Articlesubcategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleSubCategorieController extends Controller
{

    public $articleSubCategorieService;
    use FileTrait;

    public function __construct(ArticleSubCategorieService $articleSubCategorieService)
    {

        $this->articleSubCategorieService = $articleSubCategorieService;
    }


    public function index(
        ArticleSubCategorieRepository $articleSubCategorieRepository,
        ArticleCategorieRepository $articleCategorieRepository
    ) {

        $articleCategories = $articleCategorieRepository->all();
        $articleSubCategories = $articleSubCategorieRepository->allPaginate(5);



        return view('Dashboard.pages.Articles.ArticleSubCategorie.index', compact('articleCategories', 'articleSubCategories'));
    }

    public function store(ArticleSubCategorieRequest $request)
    {


        $this->articleSubCategorieService->store($request);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Successfully: Article Subcategory Created Successfully.');
        return redirect()->back();
    }

    public function delete($id)
    {
   
        $this->articleSubCategorieService->deleteById($id);
        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: Articlesubcategorie Deleted Sucessfully.');
        return redirect()->back();
    }

    public function update(ArticleSubCategorieRequest $request)
    {


        $this->articleSubCategorieService->update($request);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: Articlesubcategorie Created Sucessfully.');
        return redirect()->back();
    }
}
