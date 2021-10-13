<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImplementationFollowUp;
use Validator; 

class ImplementationFollowUpController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $follow_up = ImplementationFollowUp::all();
        return response()->json([
        "success" => true,
        "message" => "Implementation Follow Up List",
        "data" => $follow_up
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
            'follow_up' => 'required|boolean',
            'causes'  => 'required|max:255',
            'job'  => 'required|max:255',
            'entered_date' => 'date',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'

        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $follow_up = ImplementationFollowUp::create($input);
        return response()->json([
        "success" => true,
        "message" => "Implementation Follow Up created successfully.",
        "data" => $follow_up
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
        $follow_up = ImplementationFollowUp::find($id);
        if (is_null($follow_up)) {
            return response()->json(['message' => 'Implementation Follow Up Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "Implementation Follow Up retrieved successfully.",
        "data" => $follow_up
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
        $follow_up = ImplementationFollowUp::find($id);
        if (is_null($follow_up)) {
            return response()->json(['message' => 'Implementation Follow Up Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "Implementation Follow Up retrieved successfully.",
        "data" => $follow_up
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
            'follow_up' => 'boolean',
            'causes'  => 'max:255',
            'job'  => 'max:255',
            'entered_date' => 'date',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Implementation Follow Up invalid'], 404);
        }
        $follow_up = ImplementationFollowUp::find($id);
        $follow_up->fill($request->all());
        $follow_up->save();
        return response()->json([
            "success" => true,
            "message" => "Implementation Follow Up updated successfully.",
            "data" => $follow_up

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
        $follow_up = ImplementationFollowUp::find($id);
        if (is_null($follow_up)) {
            return response()->json(['message' => 'Implementation Follow Up Not found'], 404);
        };
        $follow_up->delete();
        return response()->json([
        "success" => true,
        "message" => "Implementation Follow Up deleted successfully.",
        "data" => $follow_up
        ]);
    }
}
