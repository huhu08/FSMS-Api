<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SparePart;
use Validator;

class SparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spare_part = SparePart::all();
        return $spare_part;
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
            'machine_id' => 'numeric',
            'part_no' => 'required|numeric',
            'note' => 'max:255',
            'quantity' => 'required|numeric',
            'unit_id' => 'numeric',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $spare_part = SparePart::create($input);
        return $spare_part;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spare_part = SparePart::find($id);
        if (is_null($spare_part)) {
            return response()->json(['message' => 'spare part Not found'], 404);
        }
        return $spare_part;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spare_part = SparePart::find($id);
        if (is_null($spare_part)) {
            return response()->json(['message' => 'spare part Not found'], 404);
        }
        return $spare_part;
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
            'machine_id' => 'numeric',
            'part_no' => 'numeric',
            'note' => 'max:255',
            'quantity' => 'numeric',
            'unit_id' => 'numeric',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  'invalid input' ], 404);
        }
        $spare_part = SparePart::find($id);
        $spare_part->fill($request->all());
        $spare_part->save();
        return $spare_part;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spare_part = SparePart::find($id);
        if (is_null($spare_part)) {
            return response()->json(['message' => 'spare part Not found'], 404);
        };
        return $spare_part;
        $spare_part->delete();
    }
}
