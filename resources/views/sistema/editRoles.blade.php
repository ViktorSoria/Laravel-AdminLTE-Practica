@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edicion de Roles CHEKAR</h1>
@stop

@section('content')
    {{-- <p>Ingrese la informacion del Permiso "Recuerda cambiarlas"</p> --}}

    <div class="card">
        <div class="card-body">

            <form action="{{ route('roles.update', $role) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- With prepend slot --}}

                <x-adminlte-input type="text" name="nombre" label="Nombre del Rol" label-class="text-lightblue"
                    value="{{ $roles->name }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-address-card text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- Themes + icons --}}
                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save" />

            </form>
        </div>
    </div>

@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script> --}}
@stop
