<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::get();
        return view('Dashboard.pages.Settings', compact('settings'));
    }
    public function updateOrCreate(SettingRequest $request)
    {
        foreach ($request->settings as $key => $value) {

            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: Updated  Setting.');
        return redirect()->back();
    }
}
