<?php

namespace App\Traits;

trait ApiResponse
{

    public function success($msg, $data = [], $statusCode = 200)
    {
        $response = (isset($msg['status']) && trim($msg['status']) == 'success') ? $msg : $this->response(['message' => $msg, 'status' => 'success']);
        return $this->sendJsonResponse($response, $data, $statusCode);
    }

    public function error($msg, $data = [], $statusCode = 400)
    {
        $response = (isset($msg['status']) && trim($msg['status']) == 'error') ? $msg : $this->response(['message' => $msg]);
        return $this->sendJsonResponse($response, $data, $statusCode);
    }

    public function response($response = [])
    {
        $response['status'] = $response['status'] ?? 'error';
        $response['message'] = $response['message'] ?? 'something went wrong.';
        return $response;
    }

    public function successResponse($msg, $data = [])
    {
        $response = (isset($msg['status']) && trim($msg['status']) == 'success') ? $msg : $this->response(['message' => $msg, 'status' => 'success']);
        return array_merge($response, $data);
    }

    public function errorResponse($msg, $data = [])
    {
        $response = (isset($msg['status']) && trim($msg['status']) == 'error') ? $msg : $this->response(['message' => $msg, 'status' => 'error']);
        return array_merge($response, $data);
    }

    public function sendJsonResponse($response = [], $optionalData = [], $statusCode = 200)
    {
        $response = (isset($response['status']) && in_array(trim($response['status']), ['success', 'error'])) ? $response : $this->response(['message' => $response]);
        return response()->json(array_merge($response, $optionalData), $statusCode);
    }
}
