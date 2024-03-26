@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuarios y Roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4><b><u>{{$user->name}}</u></b></h4>
        </div>
        <div class="card-body">
            <h5>LISTA DE ROLES</h5>
            {!! Form::model($user, ['route' => ['asignar.update', $user],'method'=>'put']) !!}
            @foreach ($roles as $role)
            <div>
                <label>
                    {!! Form::checkbox('roles[]', $role->id, $user->hasAnyRole($role->id) ? : false, ['class'=>'mr-1']) !!}
                    {{$role->name}}
                </label>
            </div>
            @endforeach
            {!! Form::submit("Asignar Rol", ['class'=>'btn btn-primary mt-3 float-left']) !!}
            {!! Form::close() !!}
            <a href="{{route('asignar.index')}}" class="btn btn-primary mt-3 float-right" icon="fas fa-save">Cancelar</a>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
