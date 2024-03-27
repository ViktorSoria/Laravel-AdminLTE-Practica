<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function __construct()
    // {
    //     $this->middleware('can:Crear_Usuario')->only('create');
    //     $this->middleware('can:Editar_Usuario')->only('edit');
    //     $this->middleware('can:Eliminar_Usuario')->only('destroy');
    // }

    public function index()
    {
        //
        // if (! Gate::allows('Leer_Usuario')) {
        //     abort(403);
        // }
        $usuario = Auth::user();
        $rolUsuario = $usuario->getRoleNames()->first();
        $empleados = Empleado::all();

        return view('sistema.listEmpleado', compact('empleados', 'rolUsuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // if (! Gate::allows('Crear_Usuario')) {
        //     abort(403);
        // }
        return view('sistema.addEmpleado');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $valoracion = $request->validate([
            'curp' => 'required|regex:/^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[0-9]{2}$/|unique:clients,curp|min:18|max:18',
            'nombre' => 'required|string|max:75',
            'apellido' => 'required|string|max:75',
            'email' => 'required|email|unique:clients,email|max:75',
            // 'telefono' => 'required|numeric|regex:/^\d{10}$/',
            'telefono' => 'required|integer|digits:10',
        ]);

        $empleado = new Empleado();

        $empleado->curp = $request->input('curp');
        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->email = $request->input('email');
        $empleado->telefono = $request->input('telefono');
        $empleado->direccion = $request->input('direccion');
        $empleado->estado = $request->input('estado');
        $empleado->alta = $request->input('alta');
        $empleado->contrato = $request->input('contrato');

        $empleado->save();

        return back()->with('message', "Informacion recibida 😉");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // if (! Gate::allows('Ver_Usuario')) {
        //     abort(403);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // if (! Gate::allows('Editar_Usuario')) {
        //     abort(403);
        // }

        $empleado = Empleado::find($id);

        return view('sistema.editEmpleado', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $empleado = Empleado::find($id);

        $empleado->curp = $request->input('curp');
        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->email = $request->input('email');
        $empleado->telefono = $request->input('telefono');
        $empleado->direccion = $request->input('direccion');
        $empleado->estado = $request->input('estado');
        $empleado->fecha_Ingreso = $request->input('fecha_Ingreso');
        $empleado->tipo_Contratacion = $request->input('tipo_Contratacion');

        $empleado->save();

        return redirect()->route('empleado.index')->with('message', 'Datos Actualizados 👌');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // if (! Gate::allows('Eliminar_Usuario')) {
        //     abort(403);
        // }
        $empleado = Empleado::find($id);
        $empleado->delete();
        return back();
    }
}
