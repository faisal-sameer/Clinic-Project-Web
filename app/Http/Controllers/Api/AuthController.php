<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        if ($validator->failed()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 200);
        }

        $credentials = request(['email', 'password']);

        $token =       auth('api')->attempt($credentials);
        if (!$token) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 200);
        }

        //   $info =  User::where('id', auth('api')->user()->id)->update([
        //       'token' => $request->token,
        //   ]);

        //sendGCM("Hello", "AF here", $request->token, "1", "w");
        //        \Auth::logoutOtherDevices(request('password'));

        return response()->json([
            'success' => true,
            'access_token' => $token,
            'type' => auth('api')->user()->permission_id,
            'userInfo' => ['email' => auth('api')->user()->email, 'name' => auth('api')->user()->name],
            'expire_in' => auth('api')->factory()->getTTL() * 60,


        ], 200);
    }
}
