<?php

namespace App\Http\Controllers\Dashboard\Articles;


use App\Core\Dashboard\Repository\Article\ArticleRepository;
use App\Core\Dashboard\Repository\ArticleSubCategorie\ArticleSubCategorieRepository;
use App\Core\Dashboard\Repository\User\UserRepository;
use App\Core\Dashboard\Service\ArticleService;
use App\Core\Trait\FileTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;


class ArticleController extends Controller
{

    use FileTrait;
    public $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }


    public function index(
        ArticleRepository $articleRepository,
        UserRepository $userRepository,
        ArticleSubCategorieRepository $articleSubCategorieRepository,

    ) {



        $articles = $articleRepository->allPaginateWithRelation(
            5,
            'articlesubcategorie',
            'user',
            'descreptionArticles',
            'subUsers',
            'banner',
            'galleries',
            'video',
            'beforeafter'
        );
        $subCategories = $articleSubCategorieRepository->getIdAndName();
        $users =  $userRepository->getIdAndName();
        return view('Dashboard.pages.Articles.Article.index', compact('subCategories', 'users', 'articles'));
    }

    public function store(ArticleRequest $request)
    {

        $this->articleService->store($request);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: Article  Created Sucessfully.');

        return redirect()->back();
    }



    public function edit(
        ArticleRepository $articleRepository,
        UserRepository $userRepository,
        ArticleSubCategorieRepository $articleSubCategorieRepository,
        $id
    ) {

        $article = $articleRepository->findOrFailWithRelation(
            $id,
            'articlesubcategorie',
            'user',
            'descreptionArticles',
            'subUsers',
            'banner',
            'galleries',
            'video',
            'beforeafter'
        );

        // return $article->video->home_page;

        $subCategories = $articleSubCategorieRepository->getIdAndName();
        $users =  $userRepository->getIdAndName();


        return view('Dashboard.pages.Articles.Article.edit', compact(
            'subCategories',
            'users',
            'article',
        ));
    }

    public function update(ArticleRequest $request)
    {

        // return $request;
        $this->articleService->update($request);



        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: Article  Updated Sucessfully.');

        return redirect()->back();
    }



    public function delete($id)
    {


        $this->articleService->delete($id);


        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: Articlesubcategorie Deletd Sucessfully.');
        return redirect()->back();
    }



    public function uploadeImageDescreption(Request $request)
    {

        if ($request->hasFile('file')) {

            $path = $this->articleService->uploadeImageDescreption($request->file('file'));
            return response()->json([
                'location' => $path
            ]);
        }
    }
}
