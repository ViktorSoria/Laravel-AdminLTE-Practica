<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class ClienteController extends Controller
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
        $clientes = Client::all();

        return view('sistema.listCliente', compact('clientes', 'rolUsuario'));
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
        return view('sistema.addCliente');
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

        $cliente = new Client();

        $cliente->curp = $request->input('curp');
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->email = $request->input('email');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->estado = $request->input('estado');
        $cliente->alta = $request->input('alta');
        $cliente->contrato = $request->input('contrato');

        $cliente->save();

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

        $cliente = Client::find($id);

        return view('sistema.editCliente', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $cliente = Client::find($id);

        $cliente->curp = $request->input('curp');
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->email = $request->input('email');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->estado = $request->input('estado');
        $cliente->fecha_Ingreso = $request->input('fecha_Ingreso');
        $cliente->tipo_Contratacion = $request->input('tipo_Contratacion');

        $cliente->save();

        return redirect()->route('cliente.index')->with('message', 'Datos Actualizados 👌');
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
        $cliente = Client::find($id);
        $cliente->delete();
        return back();
    }
}
