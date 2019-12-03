<?php 
namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result,$userid='', $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
            'userid' => $userid,
        ];
        return response()->json($response, 200);
    }
    public function sendEncResponse($result,$enctypeid='',$userid='',$message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
            'userid' => $userid,
            'enctypeid' => $enctypeid,
        ];
        return response()->json($response, 200);
    }
    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
}
