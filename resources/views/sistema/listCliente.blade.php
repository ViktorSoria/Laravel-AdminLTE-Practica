@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

@section('content')
    <div class="card">
        {{-- @can('Crear_Usuario') --}}
            <div class="card-head">
                <a href="{{ route('cliente.create') }}" class="btn btn-primary float-right mt-2 mr-2">Nuevo</a>
            </div>
        {{-- @endcan --}}
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                if ($rolUsuario === 'Administrador') {
                    $heads = ['ID', 'Nombre', 'Apellido', ['label' => 'Telefono', 'width' => 20], ['label' => 'Acciones', 'no-export' => true, 'width' => 10]];
                } else {
                    $heads = ['ID', 'Nombre', 'Apellido', ['label' => 'Telefono', 'width' => 20]];
                }

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
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->apellido }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        @can('Editar_Usuario')
                            <td>
                                <a href="{{ route('cliente.edit', $cliente) }}" type="submit"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                            @endcan
                            @can('Eliminar_Usuario')
                                <form action="{{ route('cliente.destroy', $cliente) }}" method="POST" class="formEliminar"
                                    style="display: inline">
                                    @csrf
                                    @method('delete')
                                    {!! $btnDelete !!}
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </x-adminlte-datatable>

            {{-- Compressed with style options / fill data using the plugin config --}}
            {{-- <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed /> --}}
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
