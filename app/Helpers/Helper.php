<?php
 
if (!function_exists('success')) {

    function success($data = [], $message = "")
    {
        
        return response()->json([
            'success' => true,
            'data'     =>$data,
            'message'     =>$message,
        ]);
    }
}

if (!function_exists('error')) {

    function success($status = 400, $message = "", $errors  = []])
    {
        
        return response()->json([
            'success' => false,
            'errors'     =>$errors,
            'message'     =>$message,
        ], $status);
    }
}