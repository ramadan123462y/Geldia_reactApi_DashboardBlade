<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleDetailsResource;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\WriterResource;
use App\Models\Article;
use App\Models\Articlecategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleApiController extends Controller
{


    public function getArticleHomePage()
    {

        $articles = Article::where('home_page', 1)->withCount(['subUsers'])->with([
            'user',
            'subUsers' => function ($query) {
                $query->select('users.id', 'name');
            },
            'descreptionArticles'

        ])->get();

        if ($articles->isEmpty()) {

            return apiResponse([], "No Date Found ", 404);
        }

        return apiResponse(ArticleResource::collection($articles));
    }

    public function find($articleId)
    {

        $validator =  Validator::make(['articleId' => $articleId], [
            'articleId' => 'required|exists:articles,id'
        ]);

        if ($validator->fails()) {

            return apiResponse([], $validator->messages(), 404);
        }

        $article = Article::with([
            'user',
            'descreptionArticles' => function ($query) {
                $query->select('title', 'content', 'article_id');
            },
            'subUsers',
            'banner',
            'galleries' => function ($query) {

                $query->select('image_file', 'article_id');
            },
            'video',
            'beforeafter'
        ])->find($articleId);

        $article->count_views++;
        $article->save();
        return apiResponse(new ArticleDetailsResource($article));
    }

    public function related($articleId)
    {
        $validator =  Validator::make(['articleId' => $articleId], [
            'articleId' => 'required|exists:articles,id'
        ]);

        if ($validator->fails()) {

            return apiResponse([], $validator->messages(), 404);
        }
        $articleSubCategorieId = Article::find($articleId)->articlesubcategorie->id;

        $articles = Article::where('articlesubcategorie_id', $articleSubCategorieId)->where('id', '!=', $articleId)->withCount(['subUsers'])->with([
            'user',
            'subUsers' => function ($query) {
                $query->select('users.id', 'name');
            },
            'descreptionArticles' => function ($query) {

                $query->first();
            }

        ])->get();

        if ($articles->isEmpty()) {

            return apiResponse([], "No Date Found ", 200);
        }

        return apiResponse(ArticleResource::collection($articles));
    }

    public function writers($articleId)
    {

        $validator =  Validator::make(['articleId' => $articleId], [
            'articleId' => 'required|exists:articles,id'
        ]);

        if ($validator->fails()) {

            return apiResponse([], $validator->messages(), 404);
        }

        $users = Article::with([
            'user',
            'subUsers' => function ($query) {

                $query->select('users.id', 'users.name');
            }
        ])->find($articleId);

        return apiResponse(new WriterResource($users));
    }

    public  function getByTitle(Request $request)
    {

        $articles = Article::query();

        if ($request->query('CategorieId') || $request->query('subCategorieId')) {
            $validator = Validator::make($request->all(), [
                'CategorieId' => 'required|exists:articlecategories,id',
                'subCategorieId' => 'required|exists:articlesubcategories,id'
            ]);

            if ($validator->fails()) {
                return apiResponse([], $validator->messages(), 404);
            }
            $subCategorieIds = $request->query('subCategorieId');
            $articles = Articlecategorie::where('id', $request->query('CategorieId'))->first()->articles();

            if ($subCategorieIds) {
                $articles->whereIn('articlesubcategorie_id', $subCategorieIds);
            }
        }

        if ($request->query('articleTitle')) {
            $articleTitle = $request->query('articleTitle');
            $articles->where('title', 'like', "%$articleTitle%");
        }

        $perPage = $request->query('perPage', 9);


        $articles = $articles->withCount(['subUsers'])->with([
            'user',
            'subUsers' => function ($query) {
                $query->select('users.id', 'name');
            },
            'descreptionArticles'

        ])->paginate($perPage);

        if ($articles->isEmpty()) {

            return apiResponse([], "No Date Found ", 404);
        }
        return apiResponse(
            [

                'articles' =>  ArticleResource::collection($articles),

                'lastPage' => $articles->lastPage()
            ]
        );
    }
}
