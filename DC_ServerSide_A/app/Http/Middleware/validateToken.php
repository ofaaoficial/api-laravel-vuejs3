<?php

namespace App\Http\Middleware;

use Closure;
use App\Usuario;

class validateToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $token)
    {
        if($request->token){
            $usuario = Usuario::where(['token' => $request->token])->first();
            if(isset($usuario->name)){
                return $next($request);
            }
        }
        return response()->json(["message" => "unauthorized user"], 401);
    }
}
