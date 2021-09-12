<?php

namespace App\Http\Controllers;
use App\Models\User;
use Validator;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|max:255',
            'user_name' => 'required|unique:users|max:255',
            'phone_number' => 'required|digits:10',
            'status' => 'numeric',
            'role_id' => 'required|numeric',
            'department_id' => 'required|numeric',
            'password' => 'required'
        ]);
  
        $user = User::create([
            'full_name' => $request->full_name,
            'user_name' => $request->user_name,
            'phone_number' => $request->phone_number,
            'status' => $request->status,
            'role_id' => $request->role_id,
            'department_id' => $request->department_id,
            'password' => bcrypt($request->password)
        ]);
  
        $token = $user->createToken('Laravel8PassportAuth')->accessToken;
  
        return response()->json(['token' => $token], 200);
    }

    public function login(Request $request)
    {
        $data = [
            'user_name' => $request->user_name,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('Laravel8PassportAuth')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

  
}
