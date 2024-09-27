<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class ArticleCategorieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {


        return [
            'id' => $this->id,
            'name' => $this->name,
            'imagePath' => URL::asset("Backend/Uploades/Articles/Categories/" . $this->image_name),
            'articleSubCategorieCount' => $this->articlesubcategories_count,
            'articlesViews' => isset($this->articles_sum_count_views) ? $this->articles_sum_count_views : "0",
            'articlesCount' => $this->articles_count
        ];
    }
}
