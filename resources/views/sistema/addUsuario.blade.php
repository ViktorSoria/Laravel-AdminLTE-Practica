@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo Usuario para Asignacion de Rol y Permiso</h1>
@stop

@section('content')
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            {{-- With prepend slot --}}
            <x-adminlte-input type="text" name="name" label="NOMBRE COMPLETO" placeholder="
            Nombre Completo"
                required label-class="text-lightblue" value="{{ old('name') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-user text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            {{-- With prepend slot --}}
            <x-adminlte-input type="email" name="email" label="EMAIL" placeholder="test@test.com" required
                label-class="text-lightblue" value="{{ old('email') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fa fa-envelope text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            {{-- Campo de contraseña para 'password' --}}
            <x-adminlte-input type="password" name="password" label="PASSWORD" placeholder="" required
                label-class="text-lightblue">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fa fa-lock text-lightblue"></i>
                    </div>
                </x-slot>
                {{-- Agregar el botón de icono para mostrar/ocultar contraseña --}}
                <x-slot name="appendSlot">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-default" onclick="mostrarPassword('password')">
                            <i class="fa fa-eye-slash icon"></i>
                        </button>
                    </div>
                </x-slot>
            </x-adminlte-input>

            {{-- Campo de contraseña para 'password_confirmation' --}}
            <x-adminlte-input type="password" name="password_confirmation" label="CONFIRMAR PASSWORD" placeholder=""
                required label-class="text-lightblue"">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fa fa-lock text-lightblue"></i>
                    </div>
                </x-slot>
                {{-- Agregar el botón de icono para mostrar/ocultar contraseña --}}
                <x-slot name="appendSlot">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-default" onclick="mostrarPassword('password_confirmation')">
                            <i class="fa fa-eye-slash icon"></i>
                        </button>
                    </div>
                </x-slot>
            </x-adminlte-input>

            {{-- Themes + icons --}}
            <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save" />

            {{-- <a href="/client" class="btn btn-primary float-right" icon="fas fa-save">Cancelar</a> --}}
            <a href="{{ route('asignar.index') }}" class="btn btn-primary float-right" icon="fas fa-save">Cancelar</a>

        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>

    <script>
        function mostrarPassword(fieldId) {
            var campo = document.getElementById(fieldId);
            if (campo.type === "password") {
                campo.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                campo.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }
    </script>

@stop
