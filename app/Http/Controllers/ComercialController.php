<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\CampanaMarketing;
use App\Models\User;
use App\Models\Promocion;
use App\Models\Historial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ComercialController extends Controller
{
    public function index()
    {
        $users = User::whereHas('campanas')->get();
        $promociones = Promocion::all();
        $campanas = CampanaMarketing::all();
        $user = Auth::user();
        Historial::create(['accion' => "El usuario {$user->name} ha accedido a la reporteria", "usuario" => $user->name]);
        return view('comercial', ['users' => $users, 'promociones' => $promociones, 'campanas' => $campanas]);
    }

    public function reporte(Request $request)
    {

        $campanas = CampanaMarketing::all();
        $promociones = Promocion::all();
        $result = User::whereHas('campanas', function ($query) use ($request) {
            if (sizeof($request->campanas) > 0 && !in_array(0, $request->campanas)) {
                $query->whereIn('campana_marketing.id', $request->campanas);
            }
            if (sizeof($request->promocion) > 0 && !in_array(0, $request->promocion)) {
                $query->whereIn('promocion_tipo', $request->promocion);
            }
            if ($request->search) {
                $query->where('users.telefono', $request->search)->orWhere('users.name', 'like', '%' . $request->search . '%');
            }
            if ($request->fecha_ingreso) {
                $query->whereRaw('DATE(users.created_at) = ?', [$request->fecha_ingreso]);
            }
        });


        return view('comercial', ['users' => $result->get(), 'campanas' => $campanas, 'promociones' => $promociones]);
    }


    public function reporte_export(Request $request)
    {
        
        $result = User::whereHas('campanas', function ($query) use ($request) {
            if (sizeof($request->campanas) > 0 && !in_array(0, $request->campanas)) {
                $query->whereIn('campana_marketing.id', $request->campanas);
            }
            if (sizeof($request->promocion) > 0 && !in_array(0, $request->promocion)) {
                $query->whereIn('promocion_tipo', $request->promocion);
            }
            if ($request->search) {
                $query->where('users.telefono', $request->search)->orWhere('users.name', 'like', '%' . $request->search . '%');
            }
            if ($request->fecha_ingreso) {
                $query->whereRaw('DATE(users.created_at) = ?', [$request->fecha_ingreso]);
            }
        });

        return Excel::download(new UsersExport($result->get()), 'data.xlsx');
    }
}
