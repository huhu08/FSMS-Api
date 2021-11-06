<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procedure;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Procedure::all();
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
            'Procedure_name' => 'required|max:255|unique:procedures',
            'name' => 'required|max:255',
            'status' => 'numeric',
            'page_no' => 'numeric',
            'update_user' => 'numeric',
            'update_date' => 'date',
            'version_date' => 'date',
            'version_no' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid input'], 404);
        }
        $Procedure = Procedure::create($input);
        return $Procedure;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Procedure = Procedure::find($id);
        if (is_null($Procedure)) {
            return response()->json(['message' => 'Procedure Not found'], 404);
        }
        return $Procedure;
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
            'Procedure_name' => 'max:255|unique:procedures',
            'name' => 'max:255',
            'status' => 'numeric',
            'page_no' => 'numeric',
            'update_user' => 'numeric',
            'update_date' => 'date',
            'version_date' => 'date',
            'version_no' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $procedure = Procedure::find($id);
        $procedure->fill($request->all());
        $procedure->save();
        return $procedure;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $procedure = Procedure::find($id);
        if (is_null($procedure)) {
            return response()->json(['message' => 'procedure Not found'], 404);
        };
        return $procedure;
        $procedure->delete();
    }

    }

    /**
     * search the specified Procedure from storage.
     *
     * @param  str   $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
      return  Procedure::where('Procedure_name','like', '%'.$name.'%')->get();
    }
}
