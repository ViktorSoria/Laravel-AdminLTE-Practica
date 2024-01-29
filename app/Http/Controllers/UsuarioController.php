<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function __construct()
    // {
    //     $this->middleware('can:Crear Cliente')->only('create');
    //     $this->middleware('can:Eliminar Cliente')->only('destroy');
    // }

    public function index()
    {
        //
        return view('sistema.addUsuario');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // $fecha = Carbon::now();
        $valoracion = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email|max:75',
            // 'password' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/|confirmed',
            // 'password_confirmation' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'password' => 'required|string|min:8|confirmed',
            // 'password_confirmation' => 'required|string|min:8',
        ]);

        // $usuario = new User();
        // $usuario->name = $request->input('nombre');
        // $usuario->email = $request->input('email');
        // $usuario->email_verified_at = $fecha;
        // $usuario->password = $request->input('password'); // Hashea la contraseña antes de guardarla
        $user = User::create($request->only('name', 'email')
            + ['password' => bcrypt($request->input('password'))]
            + ['email_verified_at' => Carbon::now()]
        );

        // return $user;
        return redirect()->route('asignar.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
