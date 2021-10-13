<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Validator;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
              return Department::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Department_name' => 'required',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);

        return Department::create($request->all());
    }

    /**
     * Display the specified department.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return Department::find($id);
    }

    /**
     * Update the specified department  in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $department ->update($request->all());
        return $department;
    }

    /**
     * Remove the specified department from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      return  Department::destroy($id);
    }

    /**
     * search the specified department from storage.
     *
     * @param  str   $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
      return  Department::where('Department_name','like', '%'.$name.'%')->get();
    }
}
