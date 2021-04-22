<?php

namespace App\Http\Controllers;

use App\Http\Resources\PromocionResource;
use App\Models\Historial;
use App\Models\Promocion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function promociones_usuarios()
    {
        $user = Auth::user();
        Historial::create(['accion' => "El usuario {$user->name} ha accedido al webServer", "usuario" => $user->name]);
        if (Auth::user()->rol_id == 2) {
            return PromocionResource::collection(Promocion::all());
        }
        
        return response()->json(['error' => 'Solo un usuario comercial puede ver este webService'],403);
        
    }
}
