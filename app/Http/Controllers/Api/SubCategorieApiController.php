<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleSubCategorieResource;
use App\Models\Article;
use App\Models\Articlesubcategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategorieApiController extends Controller
{


    public function getArticles(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'subCategorieId' => 'required|exists:articlesubcategories,id'

        ]);
        if ($validator->fails()) {

            return apiResponse([], $validator->errors()->all(), 403);
        }

        $articleSubCategorie = Articlesubcategorie::withCount(['articles'])->withSum('articles', 'count_views')->find($request->subCategorieId);

        if (!$articleSubCategorie->articles()->exists()) {

            return apiResponse([], "No data found ", 404);
        }
        $articles = $articleSubCategorie->articles();
        if ($request->query('articleName')) {
            $articleName = $request->query('articleName');
            $articles =  $articles->where('title', 'like', "%$articleName%");

            if ($articles->get()->isEmpty()) {

                return apiResponse([], "No data found ", 404);
            }
        }

        $perPage = $request->query('perPage', 9);

        $articles =  $articles->withCount(['subUsers'])->with([
            'user',
            'descreptionArticles' ])->paginate($perPage);

        $response = [
            'statics' => new ArticleSubCategorieResource($articleSubCategorie),

            'articles' => $articles,
            'articles' => ArticleResource::collection($articles),


            'lastPage' => $articles->lastPage(),
        ];

        return apiResponse($response);
    }
}
