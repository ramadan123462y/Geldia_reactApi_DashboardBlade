<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderApiController extends Controller
{
    public function get()
    {

        $slider = Slider::get();

        if ($slider->isEmpty()) {


            return apiResponse([], "No data found ", 404);
        }

        return apiResponse(SliderResource::collection($slider));
    }
}
