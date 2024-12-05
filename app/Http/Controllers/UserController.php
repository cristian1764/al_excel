<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers() {
        $res = User::all();
        return response() -> json($res);
    }

    
    public function getUser($id) {
        $res = User::find($id);
        return response() -> json($res);
    }

    public function insertUser(request $request) {
        $user = new User();
        $user->name = $request->nombre;
        $user->email = $request->correo;
        $user->password = $request->password;
        $user->save();
        return response()->json($user);


    }
    
    /////////////////// Tabla informacion //////////////////////////

    public function getInformacion() {
        $res = Informacion::all();
        return response() -> json($res);
    }

    public function getInformacionID($id) {
        $res = Informacion::find($id);
        return response() -> json($res);
    }

    public function insertInformacion(request $request) {
        $informacion = new Informacion();
        $informacion->ciudad = $request->ciudad;
        $informacion->codigo_postal = $request->codigo_postal;
        $informacion->telefono = $request->telefono;
        $informacion->numero = $request->numero;
        $informacion->calle = $request->calle;
        $informacion->save();
        return response()->json($informacion);


    }
}
