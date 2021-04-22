<?php

namespace App\Http\Controllers;

use App\Models\CampanaMarketing;
use App\Models\Promocion;
use App\Models\Rol;
use App\Models\User;
use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  User::all();
        return view('users.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $campanas = CampanaMarketing::all();
        $promociones = Promocion::all();
        $roles = Rol::all();
        return view('users.create', ['promociones' => $promociones, 'roles' => $roles, 'campanas' => $campanas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::all();
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $campanas = $request->campanas;
        $user = User::create($data);
        if (sizeof($campanas) > 0 && !in_array(0, $campanas)) {
            foreach ($campanas as $value) {
                $user->campanas()->attach([$user->id => ['campana_id' => $value]]);
            }
        }
        return view('users.list', ['users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       

        return view('users.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promociones = Promocion::all();
        $roles = Rol::all();
        $user = User::find($id);
        $campanas = CampanaMarketing::all();
        $campanas_users = $user->campanas->pluck('id')->all();
        return view('users.edit', ['promociones' => $promociones, 'roles' => $roles, 'campanas' => $campanas, 'user' => $user, 'promocion_users' => $campanas_users]);
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

        $usuario = User::find($id);
        $data = $request->all();
        $campanas = $request->campanas;
        if ($request->password == null  || $request->password == "") {
            $data['password'] = $usuario->password;
        } else {
            $data['password'] = bcrypt($request->password);
        }
        $usuario->update($data);
        $syncData = [];
        foreach ($campanas as $value) {
            array_push($syncData, ['campana_id' => $value, 'user_id' => $usuario->id]);
        }
        $usuario->campanas()->sync($syncData);
        return redirect()->action([UserController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
    }
}
