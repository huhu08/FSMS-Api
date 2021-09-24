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
        "request" => $user
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
      //
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
        "request" => $user
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
      //
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
         //
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
        "request" => $user
        ]);
    }


    public function role(Request $request)
    {
        
        $user_id = $request->input('user_id'); // get user id 
        $role_id = $request->input('role_id'); // get  Role id 

         /* Todo request validation*/

        $user = User::find($user_id);
        $user->role_id = $request->input('role_id'); 
        $user->save();
        
        return response()->json(['success' =>'Role assigned successfully']);
    }

    public function activate(Request $request)
    {
        $user = User::find($request->id);
        $user->status = 1;
        $user->save();
        return response()->json(['success' =>'user is Activated']);
    }

    public function deactivate(Request $request)
    {
        $user = User::find($request->id);
        $user->status = 0;
        $user->save();
        return response()->json(['success' =>'user is Deactivated']);
    }
}
