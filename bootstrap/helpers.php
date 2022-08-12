<?php

function success($message, $data)
{
    if ($message) {
        return response()->json([
            'message' => $message,
            'code' => 200,
            'data' => $data
        ]);
    }
}
