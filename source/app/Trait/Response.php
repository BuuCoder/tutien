<?php

namespace App\Traits;

trait Response
{
    /**
     * Return Json Success.
     *
     * @param  mixed  $data
     * @param  string  $message
     * @param  int  $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseSuccess($data = [], $message = 'Success', $status = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * Return Json Error.
     *
     * @param  string  $message
     * @param  int  $status
     * @param  array  $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseError($message = 'Error', $status = 400, $errors = [])
    {
        $response = [
            'status' => 'error',
            'message' => $message,
        ];

        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $status);
    }
}
