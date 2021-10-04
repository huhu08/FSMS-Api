<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterRecord;
use Validator;

class MasterRecordController extends Controller
{  /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $master_record = MasterRecord::all();
        return response()->json([
        "success" => true,
        "message" => "Master Records List",
        "data" => $master_record
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
            'name' => 'required|max:255|unique:master_record',
            'note' => 'max:500',
            'content' => 'max:500',
            'template_id' => 'numeric',
            'department_id' => 'numeric',
            'date' => 'date',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $fiels = MasterRecord::create($input);
        return response()->json([
        "success" => true,
        "message" => "Master Record created successfully.",
        "data" => $master_record
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
        $master_record = MasterRecord::find($id);
        if (is_null($master_record)) {
            return response()->json(['message' =>  'Master Record Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" =>  "Master Record retrieved successfully.",
        "data" =>  $master_record
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
            $master_record = MasterRecord::find($id);
        if (is_null($master_record)) {
            return response()->json(['message' =>  'Master Record Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" =>  "Master Record retrieved successfully.",
        "data" =>  $master_record
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
            'name' => 'max:255|unique:master_record',
            'note' => 'max:500',
            'content' => 'max:500',
            'template_id' => 'numeric',
            'department_id' => 'numeric',
            'date' => 'date',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  'Master Record invalid'], 404);
        }
            $master_record = MasterRecord::find($id);
            $master_record->fill($request->all());
            $master_record->save();
        return response()->json([
            "success" => true,
            "message" =>  "Master Record updated successfully.",
            "data" =>  $master_record

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
            $master_record = MasterRecord::find($id);
        if (is_null($master_record)) {
            return response()->json(['message' =>  'Master Record Not found'], 404);
        };
            $master_record->delete();
        return response()->json([
        "success" => true,
        "message" =>  "Master Record deleted successfully.",
        "data" =>  $master_record
        ]);
    }
}
