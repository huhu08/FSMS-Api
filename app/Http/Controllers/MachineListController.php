<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MachineList;
use Validator;

class MachineListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machine = MachineList::all();
        return response()->json([
        "success" => true,
        "message" => "Machine List",
        "data" => $machine
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
            'equipment_name' => 'required|max:255',
            'code' => 'required|max:255',
            'note' => 'max:500',
            'area_id' => 'numeric',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $machine = MachineList::create($input);
        return response()->json([
        "success" => true,
        "message" => "Machine List created successfully.",
        "data" => $machine
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
        $machine = MachineList::find($id);
        if (is_null($machine)) {
            return response()->json(['message' => 'Machine List Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "Machine List retrieved successfully.",
        "data" => $machine
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
        $machine = MachineList::find($id);
        if (is_null($machine)) {
            return response()->json(['message' => 'Machine List Not found'], 404);
        }
        return response()->json([
        "success" => true,
        "message" => "Machine List retrieved successfully.",
        "data" => $machine
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
            'equipment_name' => 'max:255',
            'code' => 'max:255',
            'note' => 'max:500',
            'area_id' => 'numeric',
            'user_id' => 'numeric',
            'update_user' => 'numeric',
            'status' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid input'], 404);
        }
        $machine = MachineList::find($id);
        $machine->fill($request->all());
        $machine->save();
        return response()->json([
            "success" => true,
            "message" => "Machine List updated successfully.",
            "data" => $machine

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
        $machine = MachineList::find($id);
        if (is_null($machine)) {
            return response()->json(['message' => 'Machine List Not found'], 404);
        };
        $machine->delete();
        return response()->json([
        "success" => true,
        "message" => "Machine List deleted successfully.",
        "data" => $machine
        ]);
    }
}
