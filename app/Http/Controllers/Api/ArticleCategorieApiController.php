<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCategorieResource;
use App\Http\Resources\ArticleSubCategorieResource;
use App\Models\Articlecategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleCategorieApiController extends Controller
{
    public function all(Request $request)
    {

        $articleCategories = Articlecategorie::query();

        if ($request->query('categorieName')) {
            $categorieName = $request->query('categorieName');
            $articleCategories->where('name', 'like', "%$categorieName%");
            if ($articleCategories->get()->isEmpty()) {


                return apiResponse([], "No data found", 404);
            }
        }
        $articleCategories->withCount(['articlesubcategories', 'articles'])->withSum('articles', 'count_views');

        if ($articleCategories->get()->isEmpty()) {


            return apiResponse([], "No data found", 404);
        }

        return apiResponse(ArticleCategorieResource::collection($articleCategories->get()));
    }

    public function getArticleSubCategories(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'articleCategorieId' => 'required|exists:articlecategories,id'

        ]);
        if ($validator->fails()) {

            return apiResponse([], $validator->errors()->all(), 403);
        }


        $articleCategorie = Articlecategorie::withCount(['articlesubcategories', 'articles'])->withSum('articles', 'count_views')->find($request->articleCategorieId);

        if (!$articleCategorie->articlesubcategories()->exists()) {
            return apiResponse([], "No data found ", 404);
        }
        $articleSubCategories = $articleCategorie->articlesubcategories();
        if ($request->query('articleSubCategorieName')) {
            $articleSubCategorieName = $request->query('articleSubCategorieName');

            $articleSubCategories = $articleSubCategories->where('name', 'like', "%$articleSubCategorieName%");
            if ($articleSubCategories->get()->isEmpty()) {
                return apiResponse([], "No data found ", 404);
            }
        }

        $perPage = $request->query('perPage', 6);

        $articleSubCategories = $articleSubCategories->withCount(['articles'])->withSum('articles', 'count_views')

            ->paginate($perPage);
        $response = [
            'categorie' => new ArticleCategorieResource($articleCategorie),
            'subCategories' => ArticleSubCategorieResource::collection($articleSubCategories),
            'lastPage' => $articleSubCategories->lastPage(),
        ];

        return apiResponse($response);
    }

    public function getCategoriesAndSubCategorie()
    {

        $categories =  Articlecategorie::with(['articlesubcategories' => function ($query) {

            $query->select(
                'id',
                'name',
                'articlecategorie_id'
            );
        }])->select('id', 'name')->get();

        if ($categories->isEmpty()) {

            return apiResponse([], "No data found ", 404);
        }

        return apiResponse($categories);
    }
}
