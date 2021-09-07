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
        return Procedure::create($request->all());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Procedure::find($id);
        
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
        $procedure = procedure::find($id);
        $procedure ->update($request->all());
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
        return  Procedure::destroy($id);

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
