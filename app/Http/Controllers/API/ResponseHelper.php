<?php
namespace App\Http\Controllers\API;

class ResponseFormatter {

  protected static $response = [
    'meta' => [
      'code' => 200,
      'status' => 'success',
      'message' => null
    ],
    'data' => null
  ];

  public static function success($data=null, $msg=null)
  {
    // self hampir sama seperti this. Cuman klo static, makenya self. Klo umum pakenya this 
    self::$response['meta']['message'] = $msg;
    self::$response['data'] = $data;

    return response()->json(self::$response, self::$response['meta']['code']);
  }

  public static function error($data=null, $msg=null, $code=404)
  {
    self::$response['meta']['status'] = 'error';
    self::$response['meta']['code'] = $code;
    self::$response['meta']['message'] = $msg;
    self::$response['data'] = $data;

    return response()->json(self::$response, self::$response['meta']['code']);
  }
}