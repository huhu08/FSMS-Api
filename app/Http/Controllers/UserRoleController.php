<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
use Validator;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_role = UserRole::all();
        return response()->json([
        "success" => true,
        "message" => "Users Roles List",
        "data" => $user_role
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
            'user_role' => 'required|max:255',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $user_role = UserRole::create($input);
        return response()->json([
        "success" => true,
        "message" => "User Role created successfully.",
        "data" => $user_role
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
        $user_role = UserRole::find($id);
        if (is_null($user_role)) {
            return response()->json(['message' => 'User Role Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "User Role retrieved successfully.",
        "data" => $user_role
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
        $user_role = UserRole::find($id);
        if (is_null($user_role)) {
            return response()->json(['message' => 'User Role Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "User Role retrieved successfully.",
        "data" => $user_role
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
            'user_role' => 'max:255',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $user_role = UserRole::find($id);
        $user_role->fill($request->all());
        $user_role->save();
        return response()->json([
            "success" => true,
            "message" => "User Role updated successfully.",
            "data" => $user_role
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
        $user_role = UserRole::find($id);
        if (is_null($user_role)) {
            return response()->json(['message' => 'User Role Not found'], 404);
        };
        $user_role->delete();
        return response()->json([
        "success" => true,
        "message" => "User Role deleted successfully.",
        "data" => $user_role
        ]);
    }
}
