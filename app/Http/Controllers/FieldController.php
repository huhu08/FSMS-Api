<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
use Validator;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $field = Field::all();
        return response()->json([
        "success" => true,
        "message" => "Fields List",
        "data" => $field
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
            'field_name' => 'required|max:255|unique:fields',
            'note' => 'max:500',
            'template_id' => 'numeric',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $field = Field::create($input);
        return response()->json([
        "success" => true,
        "message" => "Field created successfully.",
        "data" => $field
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
        $field = Field::find($id);
        if (is_null($field)) {
            return response()->json(['message' =>  'field Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" =>  "field retrieved successfully.",
        "data" =>  $field
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
         $field = Field::find($id);
        if (is_null($field)) {
            return response()->json(['message' =>  'field Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" =>  "field retrieved successfully.",
        "data" =>  $field
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
            'field_name' => 'max:255|unique:fields',
            'note' => 'max:500',
            'template_id' => 'numeric',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  'field invalid'], 404);
        }
         $field = Field::find($id);
         $field->fill($request->all());
         $field->save();
        return response()->json([
            "success" => true,
            "message" =>  "field updated successfully.",
            "data" =>  $field

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
         $field = Field::find($id);
        if (is_null($field)) {
            return response()->json(['message' =>  'field Not found'], 404);
        };
         $field->delete();
        return response()->json([
        "success" => true,
        "message" =>  "field deleted successfully.",
        "data" =>  $field
        ]);
    }
}
