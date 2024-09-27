<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class ArticleSubCategorieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {




        return [
            // 'statics' => [
            //     'name' => $this->categorie->name,
            //     'imageUrl' => URL::asset("Backend/Uploades/Articles/Categories/" . $this->categorie->image_name),
            //     'articleSubCategorieCount' => $this->categorie->articlesubcategories_count,
            //     'articlesCount' => $this->categorie->articles_count,
            //     'viewArticlesCount' => $this->categorie->articles_sum_count_views,
            // ],


            'id' => $this->id,
            'name' => $this->name,
            'imageUrl' => URL::asset("Backend/Uploades/Articles/SubCategories/" . $this->image_name),
            'descreption' => $this->descreption,
            'articleCount' => $this->articles_count,
            'viewArticlesCount' => $this->articles_sum_count_views,

        ];
    }
}
