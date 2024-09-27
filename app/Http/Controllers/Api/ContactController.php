<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\ContactEmail;
use App\Models\Setting;
use App\Models\UserType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{


    public function sendMail(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'userTypeId' => 'required|exists:user_types,id',
            'content' => 'required',
            'email' => 'required|email'
        ]);
        ContactEmail::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'user_type_id' => $request->userTypeId,
            'content' => $request->content,
            'email' => $request->email

        ]);

        if ($validator->fails()) {


            return apiResponse([], $validator->errors()->all(), 403);
        }

        $name = $request->name;
        $phone = $request->phone;
        $userType = UserType::find($request->userTypeId)->type;
        $content = $request->content;
        $email = $request->email;
        $emailTo = '';
        if (Setting::where('key', 'ContactEmail')->first()) {

            $emailTo = Setting::where('key', 'ContactEmail')->first()->value;
        }

        try {
            Mail::to($emailTo)->send(new ContactMail(
                $name,
                $phone,
                $userType,
                $content,
                $email
            ));
            return apiResponse([], "Mail Send SucessFully", 200);
        } catch (Exception $e) {
            return apiResponse([], $e->getMessage(), 403);
        }
    }
}
