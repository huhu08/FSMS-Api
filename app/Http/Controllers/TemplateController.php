<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use Validator;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Template::all();
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
            'Template_name' => 'required|max:255|unique:templates',
            'Procedure_Id' => 'numeric',
            'name' => 'required|max:255',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $template =  Template::create($input);
        return $template;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $template = Template::find($id);
        if (is_null($template)) {
            return response()->json(['message' => 'template Not found'], 404);
        }
        return $template;
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
            'Template_name' => 'required|max:255|unique:templates',
            'Procedure_Id' => 'numeric',
            'name' => 'required|max:255',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $template = template::find($id);
        $template->fill($request->all());
        $template->save();
        return $template;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $template = Template::destroy($id);
        if (is_null($template)) {
            return response()->json(['message' => 'template Not found'], 404);
        };
        return  $template;
        $template->delete();
    }
    public function search($name)
    {
        return  Template::where('Template_name', 'like', '%'.$name.'%')->get();
    }
}
