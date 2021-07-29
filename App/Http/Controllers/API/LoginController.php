<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\User;
use Auth;


class LoginController extends Controller
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function apiLogin(Request $request)
    {   
      
        Log::info($request);
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = User::find(auth()->user()->id);
            // $success['token'] = $user->createToken('my-app')->accessToken;
            $success['token'] = "123454fgchgvghbhjjhjk";
            $success['user'] = $user;
   
            // return $this->sendResponse($success, 'User login successfully.');
            return response()->json($user);
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
    
        public function apiLogout(Request $request) {
           Auth::logout();
            return "success";
          }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
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


