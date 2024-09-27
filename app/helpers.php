<?php



if (!function_exists('apiResponse')) {
    function apiResponse($data = null, $message = null, $status = 200)
    {

        $array = [

            'data' => $data,
            'message' => $message,
            'status' => $status



        ];

        return response()->json($array, $status);
    }
}
