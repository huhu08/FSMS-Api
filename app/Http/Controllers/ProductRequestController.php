<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductRequest;
use Validator;

class ProductRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_request = ProductRequest::all();
        return response()->json([
        "success" => true,
        "message" => "product request List",
        "data" => $product_request
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

            'brand_name' => 'required|max:255',
            'quantity' => 'required|numeric',
            'unit_id' => 'numeric',
            'recived_by_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Packing invalid'], 404);
        }
        $product_request = ProductRequest::create($input);
        return response()->json([
        "success" => true,
        "message" => "product request created successfully.",
        "data" => $product_request
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
        $product_request = ProductRequest::find($id);
        if (is_null($product_request)) {
            return response()->json(['message' => 'product request Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "product request retrieved successfully.",
        "data" => $product_request
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
        $product_request = ProductRequest::find($id);
        if (is_null($product_request)) {
            return response()->json(['message' => 'product request Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "product request retrieved successfully.",
        "data" => $product_request
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
            'brand_name' => 'max:255',
            'quantity' => 'numeric',
            'unit_id' => 'numeric',
            'recived_by_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'product request invalid'], 404);
        }
        $product_request = ProductRequest::find($id);
        $product_request->fill($request->all());
        $product_request->save();
        return response()->json([
            "success" => true,
            "message" => "product request updated successfully.",
            "data" => $product_request

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
        $product_request = ProductRequest::find($id);
        if (is_null($product_request)) {
            return response()->json(['message' => 'product request Not found'], 404);
        };
        $product_request->delete();
        return response()->json([
        "success" => true,
        "message" => "product request deleted successfully.",
        "data" => $product_request
        ]);
    }
}
