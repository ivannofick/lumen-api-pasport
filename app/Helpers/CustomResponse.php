<?php
namespace App\Helpers;


class CustomResponse
{

    /**
     * make response
     * @param $data Array
     * @param $statusCode = [
     * 0=success, 
     * 144=the validation is failing, 
     * 100=Data Not Found
     * ]
     * @param $message = ['success']
     */
    public static function response($statusCode, $message, $data=[])
    {
        return response()->json([
            'data' => $data,
            'code' => [
                'message' => $message,
                'status' => $statusCode
            ]
        ]);
    }
}