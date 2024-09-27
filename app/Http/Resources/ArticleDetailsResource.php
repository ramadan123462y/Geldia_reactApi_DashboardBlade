<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

use function PHPSTORM_META\map;

class ArticleDetailsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        $data = [];
        $data['option'] = null;
        if (isset($this->banner) && $this->banner) {

            $data['option'] = 'banner';
            $data['banner'] = [
                'id' => $this->banner->id,
                'ImageUrl' => URL::asset('Backend/Uploades/Articles/Banners/' . $this->banner->image_name),
            ];
        }
        if (isset($this->beforeafter) && $this->beforeafter) {

            $data['option'] = 'beforeafter';
            $data['beforeafter'] = [
                'id' => $this->beforeafter->id,
                'imageBeforeUrl' => URL::asset('Backend/Uploades/Articles/BeforeAndAfter/' . $this->beforeafter->image_before),
                'imageAfterUrl' => URL::asset('Backend/Uploades/Articles/BeforeAndAfter/' . $this->beforeafter->image_after),
            ];
        }
        if (isset($this->video) && $this->video) {

            $data['option'] = 'video';
            $data['video'] = [
                'id' => $this->id,
                'videoUrl' => URL::asset('Backend/Uploades/Articles/Galleryes/' . $this->video->video_name),
            ];
        }
        if (!$this->galleries()->get()->isEmpty()) {

            $data['option'] = 'galleries';
            $data['galleries'] = $this->galleries->map(function ($gallerie) {

                return [
                    'id' => $gallerie->id,
                    'ImageUrl' => URL::asset('Backend/Uploades/Articles/Galleryes/' . $gallerie->image_file),

                ];
            });
        }


        $data['userName'] = $this->user->name;
        $data['userImageUrl'] = URL::asset('Backend/Uploades/Users/' . $this->user->image_name);
        $data['createdAt'] = Carbon::parse($this->created_at)->toDateString();
        $data['title'] = $this->title;
        $data['subTitle'] = mb_substr($this->title, 0, 13, 'UTF-8');;

        $data['viewsCount'] = $this->count_views;


        $data['readTime'] = $this->handleReadTime($this->descreptionArticles);

        $data['descriptions'] = $this->descreptionArticles()->orderBy('order')->get()->map(function ($descriptionArticle) {


            return [
                "title" => $descriptionArticle->title,
                "content" => $descriptionArticle->content,
                "article_id" => $descriptionArticle->article_id,
                'order'=>$descriptionArticle->order
            ];
        })->toArray();

        return $data;
    }





    public function handleReadTime($descreptionArticles)
    {
        $readTime = 0;
        $content = '';

        foreach ($descreptionArticles as $descriptionArticle) {

            $cleanContent = strip_tags($descriptionArticle->content);


            $cleanContent = preg_replace('/&nbsp;|[\r\n\t]+/', ' ', $cleanContent);


            $cleanContent = preg_replace('/\s+/', ' ', $cleanContent);


            $content .= $cleanContent . ' ';
        }


        $charCount = strlen($content);


        $readingSpeed = 1000;


        $readTime = ceil($charCount / $readingSpeed);

        return $readTime;
    }
}
