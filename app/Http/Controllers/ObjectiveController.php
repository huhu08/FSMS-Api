<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objective;
use Validator;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objective = Objective::all();
        return response()->json([
        "success" => true,
        "message" => "Objectives List",
        "data" => $objective
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
            'department_id' => 'numeric',
            'objective_name' => 'required|max:255|unique:objectives',
            'KPI' => 'required|numeric',
            'user_id' => 'numeric',
            'date_in' => 'date',
            'update_date' => 'date',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid input'], 404);
        }
        $objective = Objective::create($input);
        return response()->json([
        "success" => true,
        "message" => "Objective created successfully.",
        "data" => $objective
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
        $objective = Objective::find($id);
        if (is_null($objective)) {
            return response()->json(['message' => 'Objective Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "User retrieved successfully.",
        "data" => $objective
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
        $objective = Objective::find($id);
        if (is_null($objective)) {
            return response()->json(['message' => 'Objective Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "Objective retrieved successfully.",
        "data" => $objective
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
            'department_id' => 'numeric',
            'objective_name' => 'max:255|unique:objectives',
            'KPI' => 'numeric',
            'user_id' => 'numeric',
            'date_in' => 'date',
            'update_date' => 'date',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Objective Not updated'], 404);
        }
        $objective = Objective::find($id);
        $objective->fill($request->all());
        $objective->save();
        return response()->json([
            "success" => true,
            "message" => "Objective updated successfully.",
            "data" => $objective
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
        $objective = Objective::find($id);
        if (is_null($objective)) {
            return response()->json(['message' => 'Objective Not found'], 404);
        };
        $objective->delete();
        return response()->json([
        "success" => true,
        "message" => "objective deleted successfully.",
        "data" => $objective
        ]);
    }
}
