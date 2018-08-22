<?php

namespace App\Http\Middleware;

use Closure;
use App\Usuario;
class ValidateRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $token, $role)
    {
        if($request->token){
            $usuario = Usuario::where(['token' => $request->token])->first();
            if(isset($usuario->role) && $usuario->role == $role){
                return $next($request);
            }
        }
        return response()->json(["message" => "unauthorized user", 'role' => $usuario->role], 401);
    }
}
