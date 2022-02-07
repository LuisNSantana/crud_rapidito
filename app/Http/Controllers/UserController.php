<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()

    {// paso numero 1 consulto los datos
        $users = User::latest()->get();
         // Paso numero 2 cargo la vista  y paso los datos.    
        return view ('users.index', [
            'users'=> $users
        ]);

    }
    // Request significa solicitod, una misma clase que te crea laravel para hacer solicitud
    public function store(Request $request)

    {   //Crea un usuario con estos datos con el metodo create
        $request->validate([
            'name'=> 'required',
            'email'=> ['required', 'email', 'unique:users'],
            'password'=> ['required', 'min:6'],

        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            //helper de laravel para encriptar contraseñas 'bcrypt'
            'password'=> bcrypt($request-> password),

        ]);
        // y deuvelveme a la pagina anterior
        return back();
    }


    public function destroy(User $user)

    {
        $user->delete();

        return back();
    }
}
