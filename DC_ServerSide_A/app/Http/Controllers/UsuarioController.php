<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    function __construct(Request $request){
        $this->middleware(['validateToken:' . $request->token])->except(['Registro', 'Login']);
    }
    public function Registro(Request $request){
        try{
            Usuario::create($request->all());

            return response()->json(['name' => $request->name, 'email' => $request->email, 'role' => 'turista'], 201);
        }catch (\Exception $e){
            return response()->json(["message" => "data cannot be processed"], 422);
        }
    }

    public function Login(Request $request){
            if($request->email && $request->password){
                $usuario = Usuario::where(['email' => $request->email])->first();
                if($usuario){
                $usuario->token = str_random(100). date('ym');
                $usuario->save();
                    if(password_verify($request->password, $usuario->password)){
                        return response()->json(["message" => "login success", "token" => $usuario->token], 201);
                    }
                }
            }
        return response()->json(["message" => "invalid login"], 401);
    }

    public function Logout(Request $request){
        try{
            $usuario = Usuario::where(['token' => $request->token])->first();
            $usuario->token = null;
            $usuario->save();
            return response()->json(['message' => 'logout success'], 201);
        }catch (\Exception $e){
            return response()->json(["message" => "data cannot be processed"], 422);
        }
    }
}
