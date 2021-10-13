<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CorrectiveAction;
use Validator;


class CorrectiveActionController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $action = CorrectiveAction::all();
        return response()->json([
        "success" => true,
        "message" => "corrective action List",
        "data" => $action
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
            'corrective_action'  => 'required|max:500',
            'request_review' => 'required|boolean',
            'preventive_action' 'required|boolean',
            'quality_office_id' 'numeric',
            'entered_date' => 'date',
            'note' => 'max:500',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
    
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $action = CorrectiveAction::create($input);
        return response()->json([
        "success" => true,
        "message" => "action created successfully.",
        "data" => $action
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
        $action = CorrectiveAction::find($id);
        if (is_null($action)) {
            return response()->json(['message' =>  'action Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" =>  "action retrieved successfully.",
        "data" =>  $action
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
            $action = CorrectiveAction::find($id);
        if (is_null($action)) {
            return response()->json(['message' =>  'action Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" =>  "actions Record retrieved successfully.",
        "data" =>  $action
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
            'corrective_action'  => 'max:500',
            'request_review' => 'boolean',
            'preventive_action' 'boolean',
            'quality_office_id' 'numeric',
            'entered_date' => 'date',
            'note' => 'max:500',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'

        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  'corrective action invalid'], 404);
        }
            $action = CorrectiveAction::find($id);
            $action->fill($request->all());
            $action->save();
        return response()->json([
            "success" => true,
            "message" =>  "corrective action updated successfully.",
            "data" =>  $action

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
            $action = CorrectiveAction::find($id);
        if (is_null($action)) {
            return response()->json(['message' =>  'corrective action Not found'], 404);
        };
            $action->delete();
        return response()->json([
        "success" => true,
        "message" =>  "corrective action deleted successfully.",
        "data" =>  $action
        ]);
    }
}
