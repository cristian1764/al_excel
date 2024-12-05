<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DatosArchivo; // Asegúrate de que el nombre de la clase sea correcto
use App\Models\product;
class TestController extends Controller
{
    public function getUsers() {
        $users = User::all();
        return response()->json($users); // Devuelve los datos como JSON
    }

    public function getUser($id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    public function insertUser(Request $request) {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // Confirmación de contraseña
        ]);

        $user = new User();
        $user->name = $validated['nombre'];
        $user->email = $validated['correo'];
        $user->password = bcrypt($validated['password']); // Hashear la contraseña
        $user->save();

        return response()->json($user, 201);
    }

    public function updateUser(Request $request, $id) {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:users,email,' . $id, // Permite la actualización con el mismo correo si es el mismo usuario
            'password' => 'nullable|string|min:6|confirmed', // La contraseña es opcional en una actualización
        ]);
    
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        $user->name = $validated['nombre'];
        $user->email = $validated['correo'];
    
        // Solo actualiza la contraseña si se ha proporcionado
        if ($request->filled('password')) {
            $user->password = bcrypt($validated['password']);
        }
    
        $user->save();
    
        return response()->json($user);
    }
    

    /////////////////// Tabla DatosArchivo //////////////////////////

    public function getDatosArchivo() {
        $res = DatosArchivo::all();
        return response()->json($res);
    }

    public function getDatosArchivoID($id) {
        $res = DatosArchivo::find($id);
        if (!$res) {
            return response()->json(['error' => 'Informacion not found'], 404);
        }
        return response()->json($res);
    }

    public function insertDatosArchivo(Request $request) {
        try {
            $validated = $request->validate([
                'dato1' => 'required|string|max:255',
                'dato2' => 'required|string|max:300',
                'dato3' => 'required|string|max:1225',
                'dato4' => 'required|string|max:1022',
                'dato5' => 'required|string|max:255',
                'dato6' => 'required|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'details' => $e->errors(),
            ], 422);
        }
    
        $DatosArchivo = new DatosArchivo();
        $DatosArchivo->dato1 = $validated['dato1'];
        $DatosArchivo->dato2 = $validated['dato2'];
        $DatosArchivo->dato3 = $validated['dato3'];
        $DatosArchivo->dato4 = $validated['dato4'];
        $DatosArchivo->dato5 = $validated['dato5'];
        $DatosArchivo->dato6 = $validated['dato6'];
        
        $DatosArchivo->save();
    
        return response()->json($DatosArchivo, 201);
    }

    
    public function updateDatosArchivo(Request $request, $id) {
        // Buscar el registro por ID
        $DatosArchivo = DatosArchivo::find($id);
    
        if (!$DatosArchivo) {
            return response()->json(['error' => 'DatosArchivo not found'], 404);
        }
    
        // Validar los datos de la solicitud
        $validated = $request->validate([
            'dato1' => 'required|string|max:255',
            'dato2' => 'required|string|max:100',
            'dato3' => 'required|string|max:150',
            'dato4' => 'required|string|max:100',
            'dato5' => 'required|string|max:255',
            'dato6' => 'required|string|max:255',
        ]);
    
        // Actualizar los campos
        $DatosArchivo->dato1 = $validated['dato1'];
        $DatosArchivo->dato2 = $validated['dato2'];
        $DatosArchivo->dato3 = $validated['dato3'];
        $DatosArchivo->dato4 = $validated['dato4'];
        $DatosArchivo->dato5 = $validated['dato5'];
        $DatosArchivo->dato6 = $validated['dato6'];
    
        // Guardar los cambios
        $DatosArchivo->save();
    
        return response()->json($DatosArchivo);
    }
    



 
}
