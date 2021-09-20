<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packing;
use Validator;

class PackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packing = Packing::all();
        return response()->json([
        "success" => true,
        "message" => "packing List",
        "data" => $packing
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
            'item_id' => 'numeric',
            'quantity' => 'required|numeric',
            'unit_id' => 'numeric',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid input'], 404);
        }
        $packing = Packing::create($input);
        return response()->json([
        "success" => true,
        "message" => "Packing created successfully.",
        "data" => $packing
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
        $packing = Packing::find($id);
        if (is_null($packing)) {
            return response()->json(['message' => 'Packing Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "Packing retrieved successfully.",
        "data" => $packing
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
        $packing = Packing::find($id);
        if (is_null($packing)) {
            return response()->json(['message' => 'Packing Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "Packing retrieved successfully.",
        "data" => $packing
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
            'item_id' => 'numeric',
            'quantity' => 'numeric',
            'unit_id' => 'numeric',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $packing = Packing::find($id);
        $packing->fill($request->all());
        $packing->save();
        return response()->json([
            "success" => true,
            "message" => "Packing updated successfully.",
            "data" => $packing

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
        $packing = Packing::find($id);
        if (is_null($packing)) {
            return response()->json(['message' => 'Packing Not found'], 404);
        };
        $packing->delete();
        return response()->json([
        "success" => true,
        "message" => "Packing deleted successfully.",
        "data" => $packing
        ]);
    }
}
