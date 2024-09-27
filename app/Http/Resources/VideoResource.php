<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class VideoResource extends JsonResource
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
            'videoUrl' => URL::asset('Backend/Uploades/Articles/Videos/' . $this->video_name),
            'articleId' => $this->article_id,
            'createdAt' => Carbon::parse($this->created_at)->toDateString(),
            'title' => $this->article->title,
        ];
    }
}
