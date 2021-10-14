<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NonConformityStatus;
use Validator;

class NonConformityStatusController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = NonConformityStatus::all();
        return $status;
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
            'nonconformity_status' => 'required|max:255',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $status = NonConformityStatus::create($input);
        return $status;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = NonConformityStatus::find($id);
        if (is_null($status)) {
            return response()->json(['message' => 'nonconformity status Not found'], 404);
        }
        return $status;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = NonConformityStatus::find($id);
        if (is_null($status)) {
            return response()->json(['message' => 'nonconformity status Not found'], 404);
        }
        return $status;
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
            'nonconformity status' => 'required|max:255',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $status = NonConformityStatus::find($id);
        $status->fill($request->all());
        $status->save();
        return $status;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = NonConformityStatus::find($id);
        if (is_null($status)) {
            return response()->json(['message' => 'nonconformity status Not found'], 404);
        };
        $status->delete();
        return $status;
    }
}
