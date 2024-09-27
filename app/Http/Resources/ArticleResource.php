<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class ArticleResource extends JsonResource
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
            'title' => $this->title,
            'isNew' => $this->is_new && isset($this->is_new) && $this->is_new > date('Y-m-d') ? true : false,
            'homePage' => $this->home_page ? true : false,
            'mostFamous' => $this->most_famous ? true : false,
            'imageUrl' => URL::asset("Backend/Uploades/Articles/" . $this->image_file),
            'userName' => $this->user->name,
            'date' => Carbon::parse($this->date)->toDateString(),
            'countSubUsers' => $this->sub_users_count,
            'subUsersNames' => $this->subUsers->pluck('name')->toArray(),
            'subUsersIds' => $this->subUsers->pluck('id')->toArray(),
            'countViews' => $this->count_views,
            'mainDescreption' => count($this->descreptionArticles) > 0 ? $this->removeFroalaCredit($this->descreptionArticles[0]->content) : '',
            
        ];
    }


    protected function removeFroalaCredit($content)
    {
        $pattern = '/<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">\s*Powered by <a href="https:\/\/www\.froala\.com\/wysiwyg-editor\?pb=1" title="Froala Editor">Froala Editor<\/a>\s*<\/p>/i';

        return preg_replace($pattern, '', $content);
    }
}
