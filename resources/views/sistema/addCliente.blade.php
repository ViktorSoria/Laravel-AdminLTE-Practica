@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administracion de Clientes</h1>
@stop

@section('content')
    <p>Ingrese la informacion del Cliente</p>
    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf

        {{-- With prepend slot --}}
        <x-adminlte-input type="text" name="nombre" label="NOMBRE(S)" placeholder="Nombre(s)" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        {{-- With prepend slot --}}
        <x-adminlte-input type="text" name="apellido" label="APELLIDOS" placeholder="Apellidos"
            label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        {{-- With prepend slot --}}
        <x-adminlte-input type="email" name="email" label="EMAIL" placeholder="test@test.com"
            label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fa fa-envelope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        {{-- With prepend slot --}}
        <x-adminlte-input type="text" name="telefono" label="TELEFONO" placeholder="+525512345678"
            label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fa fa-phone text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        {{-- With prepend slot, sm size and label --}}
        <x-adminlte-textarea name="direccion" label="DIRECCION" rows=5 label-class="text-lightblue" igroup-size="sm"
            placeholder="Inserte su Direccion">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-textarea>

        {{-- With prepend slot, lg size, and label --}}
        <x-adminlte-select name="estado" label="ESTADO CIVIL" label-class="text-lightblue" igroup-size="lg">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-lightblue">
                    <i class="fa fa-spinner"></i>
                </div>
            </x-slot>
            <option value="">Seleccione su estado civil</option>
            <option value="Casado">Casado</option>
            <option value="Soltero">Soltero</option>
            <option value="Union Libre">Union Libre</option>
        </x-adminlte-select>

        {{-- Themes + icons --}}
        <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save" />
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
