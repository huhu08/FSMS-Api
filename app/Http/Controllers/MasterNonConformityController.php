<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterNonConformity;
use Validator;

class MasterNonConformityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master = MasterNonConformity::all();
        return $master;
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
            'non_conformity_status_id' => 'numeric',
            'auditor_name' => 'required|max:255',
            'job' => 'required|max:255',
            'responsible_by' => 'required|max:255',
            'entered_date' => 'date',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'

        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $master = MasterNonConformity::create($input);
        return $master;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $master = MasterNonConformity::find($id);
        if (is_null($master)) {
            return response()->json(['message' => 'Master nonconformity Not found'], 404);
        }
        return $master;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master = MasterNonConformity::find($id);
        if (is_null($master)) {
            return response()->json(['message' => 'Master nonconformity Not found'], 404);
        }
        return $master;
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
            'non_conformity_status_id' => 'numeric',
            'auditor_name' => 'max:255',
            'job' => 'max:255',
            'responsible_by' => 'max:255',
            'entered_date' => 'date',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $master = MasterNonConformity::find($id);
        $master->fill($request->all());
        $master->save();
        return $master;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $master = MasterNonConformity::find($id);
        if (is_null($master)) {
            return response()->json(['message' => 'Master nonconformity Not found'], 404);
        };

        return $master;
        $master->delete();
    }
}
