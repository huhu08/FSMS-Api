<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use Validator;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area = Area::all();
        return response()->json([
        "success" => true,
        "message" => "Areas List",
        "data" => $area
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
            'area' => 'required|max:255',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $area = Area::create($input);
        return response()->json([
        "success" => true,
        "message" => "Area created successfully.",
        "data" => $area
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
        $area = Area::find($id);
        if (is_null($area)) {
            return response()->json(['message' => 'Area Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "Area retrieved successfully.",
        "data" => $area
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
        $area = Area::find($id);
        if (is_null($area)) {
            return response()->json(['message' => 'Area Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "Area retrieved successfully.",
        "data" => $area
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
            'area' => 'max:255',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $area = Area::find($id);
        $area->fill($request->all());
        $area->save();
        return response()->json([
            "success" => true,
            "message" => "Area updated successfully.",
            "data" => $area

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
        $area = Area::find($id);
        if (is_null($area)) {
            return response()->json(['message' => 'Area Not found'], 404);
        };
        $area->delete();
        return response()->json([
        "success" => true,
        "message" => "Area deleted successfully.",
        "data" => $area
        ]);
    }
}
