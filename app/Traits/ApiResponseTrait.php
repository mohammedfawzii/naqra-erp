<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ApiResponseTrait
{

    public function successResponse($message, $status = 200)
    {
        return response()->json(
            [
                'success' => true,
                'data' => $message,
                'status' => $status,
            ]
        );
    }

    public function errorResponse($message, $status = 400)
    {
        return response()->json(
            [
                'success' => false,
                'message' => $message,
                'status' => $status,

            ]
        );
    }

    public function token()
    {
        return $this->error('expire token');
    }

    public function successData($data, $message = "Reviver data retrieved successfully", $status = 200)
    {
        return response()->json(
            [
                'success' => true,
                'data' => $data,
                'message' => $message,
                'status' => $status,



            ]
        );
    }

    public function errorDtat($message, $status = 400)
    {
        return response()->json(
            [
                'success' => false,
                'data' => $message,
                'status' => $status,
            ]
        );
    }
}
