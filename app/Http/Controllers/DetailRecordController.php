<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailRecord;
use Validator;

class DetailRecordController extends Controller
{  /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $detail_record = DetailRecord::all();
        return $detail_record;
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
            'operation_no' => 'required|numeric',
            'content' => 'max:500',
            'field_id' => 'numeric',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $detail_record = DetailRecord::create($input);
        return $detail_record;
    }

    /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function show($id)
    {
        $detail_record = DetailRecord::find($id);
        if (is_null($detail_record)) {
            return response()->json(['message' =>  'Detail Not found'], 404);
        }
        return $detail_record;
    }

    /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function edit($id)
    {
            $detail_record = DetailRecord::find($id);
        if (is_null($detail_record)) {
            return response()->json(['message' =>  'Detail Not found'], 404);
        }
        return $detail_record;
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
            'operation_no' => 'numeric',
            'content' => 'max:500',
            'field_id' => 'numeric',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  'Detail Record invalid'], 404);
        }
            $detail_record = DetailRecord::find($id);
            $detail_record->fill($request->all());
            $detail_record->save();
            return $detail_record;
    }

    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function destroy($id)
    {
            $detail_record = DetailRecord::find($id);
        if (is_null($detail_record)) {
            return response()->json(['message' =>  'Detail Record Not found'], 404);
        };
        return $detail_record;
            $detail_record->delete();
      
    }
}
