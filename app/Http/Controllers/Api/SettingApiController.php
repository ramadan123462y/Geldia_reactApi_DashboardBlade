<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingApiController extends Controller
{
    public function get(Request $request)
    {

        if ($request->query('key')) {

            $settings = Setting::where('key', $request->query('key'))->first();

            if (!$settings) {
                return apiResponse([], "No data found ", 404);
            }

            return apiResponse(new SettingResource($settings));
        }

        $settings = Setting::all();

        if ($settings->isEmpty()) {

            return apiResponse([], "No data found ", 404);
        }

        return apiResponse(SettingResource::collection($settings));
    }
}
