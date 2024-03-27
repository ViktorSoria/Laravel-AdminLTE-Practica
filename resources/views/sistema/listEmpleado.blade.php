@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Empleados</h1>
@stop

@section('content')
    <div class="card">
        {{-- @can('Crear_Usuario') --}}
            <div class="card-head">
                <a href="{{ route('empleado.create') }}" class="btn btn-primary float-right mt-2 mr-2">Nuevo</a>
            </div>
        {{-- @endcan --}}
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                if ($rolUsuario === 'Administrador') {
                    $heads = ['ID', 'Nombre', 'Apellido', ['label' => 'Telefono', 'width' => 10], 'Curp', 'Email', ['label' => 'Direccion', 'width' => 20], 'Alta', 'Contrato',  ['label' => 'Acciones', 'no-export' => true, 'width' => 10]];
                } else {
                    $heads = ['ID', 'Nombre', 'Apellido', ['label' => 'Telefono', 'width' => 10], 'Curp', 'Email', ['label' => 'Direccion', 'width' => 20], 'Alta', 'Contrato'];
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
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellido }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->curp }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->direccion }}</td>
                        <td>{{ $empleado->alta }}</td>
                        <td>{{ $empleado->contrato }}</td>

@can('Actualizar');
<td>

    <a href="{{ route('empleado.edit', $empleado) }}" type="submit"
    class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
    <i class="fa fa-lg fa-fw fa-pen"></i>
    </a>
    <form action="{{ route('empleado.destroy', $empleado) }}" method="POST" class="formEliminar"
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

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
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
