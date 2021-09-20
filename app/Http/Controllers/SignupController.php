<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;


use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function register(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'full_name' => 'required|max:255',
            'user_name' => 'required|unique:users|max:255',
            'phone_number' => 'required|digits:10',
            
            'role_id' => 'numeric',
            'department_id' => 'numeric',
            'password' => 'required|min:8'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid input'], 404);
        }
        $user = User::create([
            'full_name' => $input['full_name'],
            'user_name' => $input['user_name'],
            'phone_number' => $input['phone_number'],
            'status' => $input['status'],
            'role_id' => $input['role_id'],
            'department_id' => $input['department_id'],
            'password' => Hash::make($input['password']),
            
        ]);
        return response()->json([
        "success" => true,
        "message" => "user register successfully.",
        "data" => $user
         ]);

        auth()->attempt($user);
    }

    public function login(Request $request)
    {
        
        $user_data = array(
        'user_name'  => $request->get('user_name'),
        'password' => $request->get('password')
        );
        if (Auth::attempt($user_data)) {
            $user = auth()->user();
            $user->api_token = str_random(60);
            $user->save();
            return response()->json(['token' => $token], 200, ['message' => 'login']);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
