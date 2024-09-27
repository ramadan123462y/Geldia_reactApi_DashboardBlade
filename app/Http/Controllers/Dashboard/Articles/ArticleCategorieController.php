<?php

namespace App\Http\Controllers\Dashboard\Articles;


use App\Core\Dashboard\Repository\ArticleCategorie\ArticleCategorieRepository;
use App\Core\Dashboard\Service\ArticleCategorieService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCategorieRequest;



class ArticleCategorieController extends Controller
{

    public $articleCategorieService;

    public function __construct(ArticleCategorieService $articleCategorieService)
    {

        $this->articleCategorieService = $articleCategorieService;
    }
    public function index(ArticleCategorieRepository $articleCategorieRepository)
    {
        $articleCategories = $articleCategorieRepository->allPaginate(5);

        return view('Dashboard.pages.Articles.ArticleCategorie.index', compact('articleCategories'));
    }

    public function store(ArticleCategorieRequest $request)
    {


        $this->articleCategorieService->store($request);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: Articlecategorie Created Sucessfully.');
        return redirect()->back();
    }


    public function delete($id)
    {

        $this->articleCategorieService->deleteById($id);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: Articlecategorie Deleted Sucessfully.');
        return redirect()->back();
    }

    public function update(ArticleCategorieRequest $request)
    {

        $this->articleCategorieService->update($request);
        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: Articlecategorie Updated Sucessfully.');
        return redirect()->back();
    }
}
