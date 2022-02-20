<?php

/*** 
 * Funtion = untuk menghasilkan output sesuai standar
 * 
 * @parameter = String|$code|code response service
 * @parameter = String|$message|pesan response service
 * @parameter = Object|$data|data response service
 * @return = hasil response dalam bentuk JSON 
 * 
 ***/

function outputResponse($code, $message, $data = null)
{
    $name = 'Advantage Type';
    if ($code == 200 || $code == 201) {
        $result = [
            'code' => $code,
            'status' => 'success',
            'message' => $name . " " . $message,
            'data' => $data,
        ];
    } else if ($code == 401 || $code == 404) {
        $result = [
            'code' => $code,
            'status' => 'fail',
            'message' => $name . " " . $message,
        ];
    } else if ($code == 422) {
        $result = [
            'code' => $code,
            'status' => 'error',
            'message' => $message,
        ];
    }

    return response($result);
}

