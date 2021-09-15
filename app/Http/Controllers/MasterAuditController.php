<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterAudit;
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
        return response()->json([
        "success" => true,
        "message" => "Master Audits List",
        "data" => $master_audit
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
            'form_id' => 'numeric',
            'Conformity' => 'required|boolean',
            'note' => 'required|max:500',
            'user_id' => 'numeric',
            'date_in' => 'required|date',
            'update_date' => 'required|date',
            'update_user' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Mater Audit Not stored'], 404);
        }
        $master_audit = MasterAudit::create($input);
        return response()->json([
        "success" => true,
        "message" => "Mater Audit created successfully.",
        "data" => $master_audit
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
        $master_audit = MasterAudit::find($id);
        if (is_null($master_audit)) {
            return response()->json(['message' => 'Master Audit Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "Master Audit retrieved successfully.",
        "data" => $master_audit
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
        $master_audit = MasterAudit::find($id);
        if (is_null($master_audit)) {
            return response()->json(['message' => 'Master Audit Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "Master Audit retrieved successfully.",
        "data" => $master_audit
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
            'form_id' => 'numeric',
            'Conformity' => 'boolean',
            'note' => 'max:500',
            'user_id' => 'numeric',
            'date_in' => 'date',
            'update_date' => 'date',
            'update_user' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Master Audit Not updated'], 404);
        }
        $master_audit = MasterAudit::find($id);
        $master_audit->department_id =  $request->get('department_id');
        $master_audit->form_id =  $request->get('form_id');
        $master_audit->Conformity = $request->get('Conformity');
        $master_audit->note =  $request->get('note');
        $master_audit->user_id = $request->get('user_id');
        $master_audit->date_in = $request->get('date_in');
        $master_audit->update_user =  $request->get('update_user');
        $master_audit->update_date =  $request->get('update_date');
        $master_audit->save();
        return response()->json([
            "success" => true,
            "message" => "Master Audit updated successfully.",
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
        $master_audit = MasterAudit::find($id);
        if (is_null($master_audit)) {
            return response()->json(['message' => 'Master Audit Not found'], 404);
        };
        $master_audit->delete();
        return response()->json([
        "success" => true,
        "message" => "Master Audit deleted successfully.",
        "data" => $master_audit
        ]);
    }
}
