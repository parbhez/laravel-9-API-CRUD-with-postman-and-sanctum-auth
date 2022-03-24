<?php

function sendSuccessResponse($data,$msg = 'Data Retrieve Successfully',$code = 200)
{
    return response()->json([
    'success' => true,
    'message' => $msg,
    'code' => $code,
    'result' => $data
    ],$code);
}


function sendErrorResponse($data = [],$msg = 'Something Went Wrong',$code = 500)
{
    return response()->json([
    'success' => false,
    'message' => $msg,
    'code' => $code,
    'result' => $data
    ],$code);
}

