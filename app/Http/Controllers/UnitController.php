<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use Validator;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::all();
        return response()->json([
        "success" => true,
        "message" => "Unit List",
        "data" => $unit
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
            'unit_name' => 'required|max:255',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $unit = Unit::create($input);
        return response()->json([
        "success" => true,
        "message" => "Unit created successfully.",
        "data" => $unit
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
        $unit = Unit::find($id);
        if (is_null($unit)) {
            return response()->json(['message' => 'Unit Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "Unit retrieved successfully.",
        "data" => $unit
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
        $unit = Unit::find($id);
        if (is_null($unit)) {
            return response()->json(['message' => 'Unit Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "Unit retrieved successfully.",
        "data" => $unit
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
            'unit_name' => 'max:255',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $unit = Unit::find($id);
        $unit->fill($request->all());
        $unit->save();
        return response()->json([
            "success" => true,
            "message" => "Unit updated successfully.",
            "data" => $unit

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
        $unit = Unit::find($id);
        if (is_null($unit)) {
            return response()->json(['message' => 'Unit Not found'], 404);
        };
        $unit->delete();
        return response()->json([
        "success" => true,
        "message" => "Unit deleted successfully.",
        "data" => $unit
        ]);
    }
}
