<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{

    function __construct(Request $request){
        $this->middleware(['validateToken:' . $request->token]);
        $this->middleware(['ValidateRole:' . $request->token .',administrador'])->only(['create', 'update']);
    }

    public function index()
    {
        $regiones = Region::all();
        return response()->json($regiones, 200);
    }

    public function store(Request $request)
    {
        try{
            Region::create($request->all());
            return response()->json(["message" => "created success"], 201);
        }catch (\Exception $e){
            return response()->json(["message" => "data cannot be processed"], 422);
        }
    }

    public function show($id)
    {
        try{
            return response()->json(Region::find($id), 201);
        }catch (\Exception $e){
            return response()->json(["message" => "data cannot be processed"], 422);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            if(count($request->all())> 1){
                $region = Region::find($id);
                $region->update($request->all());
                return response()->json(["message" => "updated success"], 201);
            }else{
                return response()->json(["message" => "data cannot be processed"], 422);
            }
        }catch (\Exception $e){
            return response()->json(["message" => "data cannot be processed"], 422);
        }
    }
}
