<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\House;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::all();

        return response()->json($houses, 200);
    }

    public function show($slug)
    {
        $house = House::where("slug", $slug)->first();

        if($house) {
            return response()->json($house, 200);
        }

        return response()->json([
            "message" => "data not found",
        ], 400);

    }

    public function store(Request $request)
    { }

    public function update($id, Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'nama' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         "status" => "ERROR",
        //         "message" => $validator->messages()
        //     ], 200);
        // }

        return response()->json([
            "status" => "SUCCESS",
            "data" => null
        ], 200);
    }

    public function destroy($id)
    {
        $house = House::findorfail($id);
        $house->delete();

        return response()->json([
            "status" => "SUCCESS",
        ], 200);
    }
}
