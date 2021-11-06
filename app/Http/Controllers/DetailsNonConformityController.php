<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailsNonConformity;
use Validator;

class DetailsNonConformityController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $details = DetailsNonConformity::all();
        return $details;
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
        $details = new DetailsNonConformity;
        $details->description = $request->description;
        $details->action = $request->action;
        $details->problem_casuses = $request->problem_casuses;
        $details->descions = $request->descions;
        $details->apply_date = $request->apply_date;
        $details->user_id = $request->user_id;
        $details->update_user = $request->update_user;
        $details->status = $request->status;
        $details->save();
        return $details;
    }

    /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function show($id)
    {
        $details = DetailsNonConformity::find($id);
        if (is_null($details)) {
            return response()->json(['message' =>  'Details Not found'], 404);
        }
        return $details;
    }

    /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function edit($id)
    {
            $details = DetailsNonConformity::find($id);
        if (is_null($details)) {
            return response()->json(['message' =>  'Details Not found'], 404);
        }
        return $details;
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
            'description' => 'max:100',
            'action' => 'max:500',
            'problem_casuses' => 'max:500',
            'apply_date' => 'date',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'

        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  'details invalid'], 404);
        }
            $details = DetailsNonConformity::find($id);
            $details->fill($request->all());
            $details->save();
            return $details;
    }

    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function destroy($id)
    {
            $details = DetailsNonConformity::find($id);
        if (is_null($details)) {
            return response()->json(['message' =>  'details Not found'], 404);
        };
        return $details;
        $details->delete();
    }
}
