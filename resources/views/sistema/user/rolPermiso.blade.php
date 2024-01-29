@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles y sus Permisos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4><strong><u>{{$role->name}}</u></strong></h4>
        </div>
        <div class="card-body">
            <h5>LISTA DE PERMISOS</h5>
            {!! Form::model($role, ['route' => ['roles.update', $role],'method'=>'put']) !!}
            @foreach ($permisos as $permiso)
            <div>
                <label>
                    {!! Form::checkbox('permisos[]', $permiso->id, $role->hasPermissionTo($permiso->id) ? : false, ['class'=>'mr-1']) !!}
                    {{$permiso->name}}
                </label>
            </div>
            @endforeach
            {!! Form::submit("Asignar Permisos", ['class'=>'btn btn-primary float-left mt-3']) !!}
            {!! Form::close() !!}
            <a href="{{route('roles.index')}}" class="btn btn-primary float-right mt-3" icon="fas fa-save">Cancelar</a>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
