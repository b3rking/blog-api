<?php
namespace App\Traits;

trait HttpResponses {
    protected function success($data, $message = null, $status_code = 200) {
        return response([
            'status' => 'success',
            'message' => $message,
            $data
        ], $status_code);
    }

    protected function error($data, $message = null, $status_code) {
        return response([
            'status' => 'failure',
            'message' => $message,
            $data
        ], $status_code);
    }
}