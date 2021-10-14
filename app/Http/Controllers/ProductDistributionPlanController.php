<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDistributionPlan;
use Validator;

class ProductDistributionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productdis = ProductDistributionPlan::all();
        return $productdis;
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
            'brand' => 'required|max:255',
            'comments' => 'max:500',
            'quantity' => 'required|numeric',
            'stop_time' => 'required|numeric',
            'recived_by_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $productdis = ProductDistributionPlan::create($input);
        return $productdis;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productdis = ProductDistributionPlan::find($id);
        if (is_null($productdis)) {
            return response()->json(['message' => 'product distribution plan Not found'], 404);
        }
        return $productdis;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productdis = ProductDistributionPlan::find($id);
        if (is_null($productdis)) {
            return response()->json(['message' => 'product distribution plan Not found'], 404);
        }
        return $productdis;
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
            'brand' => 'max:255',
            'comments' => 'max:300',
            'quantity' => 'numeric',
            'recived_by_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'product distribution plan invalid'], 404);
        }
        $productdis = ProductDistributionPlan::find($id);
        $productdis->fill($request->all());
        $productdis->save();
        return $productdis;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productdis = ProductDistributionPlan::find($id);
        if (is_null($productdis)) {
            return response()->json(['message' => 'product distribution plan Not found'], 404);
        };
        return $productdis;
        $productdis->delete();
        
    }
}
