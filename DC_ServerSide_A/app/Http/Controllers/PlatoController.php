<?php

namespace App\Http\Controllers;

use App\Plato;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    function __construct(Request $request){
        $this->middleware(['validateToken:' . $request->token]);
        $this->middleware(['ValidateRole:' . $request->token .',administrador'])->only(['delete', 'update']);
    }

    public function index()
    {
        $platos = Plato::all();
        return response()->json($platos, 200);
    }

    public function store(Request $request)
    {
        try{
            Plato::create($request->all());
            return response()->json(["message" => "created success"], 201);
        }catch (\Exception $e){
            return response()->json(["message" => "data cannot be processed"], 422);
        }
    }

    public function show($id)
    {
        try{
            return response()->json(Plato::find($id), 201);
        }catch (\Exception $e){
            return response()->json(["message" => "data cannot be processed"], 422);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            if(count($request->all())> 1){
                $plato = Plato::find($id);
                $plato->update($request->all());
                return response()->json(["message" => "updated success"], 201);
            }else{
                return response()->json(["message" => "data cannot be processed"], 422);
            }
        }catch (\Exception $e){
            return response()->json(["message" => "data cannot be processed"], 422);
        }
    }
    
    public function destroy($id)
    {
        try{
            $plato = Plato::find($id);
            if($plato){
                $plato->delete();
                return response()->json(['message' => 'delete success'] , 201);
            }else{
                return response()->json(["message" => "data cannot be processed"], 422);
            }
        }catch (\Exception $e){
            return response()->json(["message" => "data cannot be processed"], 422);
        }
    }
}
