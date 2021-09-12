<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json([
        "success" => true,
        "message" => "Users List",
        "data" => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'full_name' => 'required|max:255',
            'user_name' => 'required|unique:users|max:255',
            'phone_number' => 'required|digits:10',
            'status' => 'numeric',
            'department_id' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user = User::create($input);
        return response()->json([
        "success" => true,
        "message" => "User created successfully.",
        "data" => $user
         ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return $this->sendError('user not found.');
        }
        return response()->json([
        "success" => true,
        "message" => "User retrieved successfully.",
        "data" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return $this->sendError('user not found.');
        }
        return response()->json([
        "success" => true,
        "message" => "User retrieved successfully.",
        "data" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $input = $request->all();
            $validator = Validator::make($input, [
                'full_name' => 'max:255',
                'user_name' => 'unique:users|max:255',
                'phone_number' => 'digits:10',
                'status' => 'numeric',
                'department_id' => 'numeric'
            ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user->save();
        return response()->json([
        "success" => true,
        "message" => "User updated successfully.",
        "data" => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return $this->sendError('user not found.');
        }
        $user->delete();
        return response()->json([
        "success" => true,
        "message" => "User deleted successfully.",
        "data" => $user
        ]);
    }


    public function role(Request $request)
    {
        $user_id = $request->input('user_id'); // get user id from post request
        $role_id = $request->input('role_id'); // get  Role id from post request
   
         /* Todo request validation*/
   
        $user = User::find($user_id);
        $role = UserRole::find($role_id);
        $user->roles()->attach($role);

    }
}
