@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administracion de Usuarios y Permisos </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <x-adminlte-button label="Nuevo" theme="primary" icon="fa fa-plus-circle" class="float-right" data-toggle="modal"
                data-target="#modalPurple" />
        </div>
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['ID', 'Nombre', 'email', ['label' => 'Acciones', 'no-export' => true, 'width' => 10]];

                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

                $config = [
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                    ],
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('asignar.edit', $user) }}" type="submit"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <form action="{{ route('asignar.destroy', $user) }}" method="POST" class="formEliminar"
                                style="display: inline">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>

            {{-- Compressed with style options / fill data using the plugin config --}}
            {{-- <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed /> --}}
        </div>
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
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Estas Seguro???",
                    text: "Se Eliminara el registro!!!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, Borrar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            })
        })
    </script>
@stop
