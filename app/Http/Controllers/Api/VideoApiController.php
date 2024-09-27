<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoApiController extends Controller
{
    public function getHomePage()
    {

        $videos = Video::with('article')->where('home_page', 1)->limit(4)->get();

        if ($videos->isEmpty()) {
            return apiResponse([], "No data found ", 404);
        }

        return apiResponse(VideoResource::collection($videos));
    }
}
