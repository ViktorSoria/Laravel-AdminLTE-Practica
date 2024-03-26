<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // if (! Gate::allows('Crear_Usuario')) {
        //     abort(403);
        // }
        $permisos = Permission::all();

        return view('sistema.user.permisos', compact('permisos'));
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
        $request->validate([
            'nombre' => 'required|string', // El campo 'nombre' es requerido y debe ser una cadena
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
        ]);
        $permission = Permission::create(['name' => $request->input('nombre')]);
        ;

        return back();
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
        // if (! Gate::allows('Editar_Usuario')) {
        //     abort(403);
        // }
        $permisos = Permission::find($id);

        return view('sistema.editPermiso', compact('permisos'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $permisos = Permission::find($id);

        $permisos->name = $request->input('nombre');

        $permisos->save();

        return redirect()->route('permisos.index')->with('message', 'Permiso Actualizado 👌');
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
        $permisos = Permission::find($id);
        $permisos->delete();
        return back();
    }
}
