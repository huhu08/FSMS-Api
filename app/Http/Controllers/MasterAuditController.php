<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterAudit;
use App\Models\Department;
use Validator;

class MasterAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master_audit = MasterAudit::all();
        return $master_audit;
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
            'form_id' => 'numeric',
            'Conformity' => 'required|boolean',
            'note' => 'max:500',
            'user_id' => 'numeric',
            'date_in' => 'date',
            'update_date' => 'date',
            'update_user' => 'numeric',
            'status' => 'numeric',
            'audit_id'=> 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid input'], 404);
        }
        $master_audit = MasterAudit::create($input);
        return $master_audit;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($audit_id)
    {
        $master_audit = MasterAudit::find($audit_id);
        if (is_null($master_audit)) {
            return response()->json(['message' => 'Master Audit Not found'], 404);
        }
        return $master_audit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master_audit = MasterAudit::find($id);
        if (is_null($master_audit)) {
            return response()->json(['message' => 'Master Audit Not found'], 404);
        }
        return $master_audit;
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
            'form_id' => 'numeric',
            'Conformity' => 'boolean',
            'note' => 'max:500',
            'user_id' => 'numeric',
            'date_in' => 'date',
            'update_date' => 'date',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Master Audit Not updated'], 404);
        }
        $master_audit = MasterAudit::find($id);
        $master_audit->fill($request->all());
        $master_audit->save();
        return $master_audit;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $master_audit = MasterAudit::find($id);
        if (is_null($master_audit)) {
            return response()->json(['message' => 'Master Audit Not found'], 404);
        };
        return $master_audit;
        $master_audit->delete();
    }
}
