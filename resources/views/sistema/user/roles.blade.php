@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administracion de Roles</h1>
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
                $heads = ['ID', 'Nombre', 'Permisos', ['label' => 'Acciones', 'no-export' => true, 'width' => 10]];

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
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @forelse ($role->permissions as $permission)
                                <span class="badge badge-info">{{ $permission->name }}</span>
                            @empty
                                <span class="badge badge-danger">Sin Permisos</span>
                            @endforelse
                        </td>

                        <td>
                            <a href="{{ route('roles.edit', $role) }}" type="submit"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <form action="{{ route('roles.destroy', $role) }}" method="POST" class="formEliminar"
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
    {{-- Themed --}}
    <x-adminlte-modal id="modalPurple" title="Nuevo Rol" theme="teal" icon="fas fa-bolt" size='lg'
        disable-animations>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            {{-- With label, invalid feedback disabled and form group class --}}
            <div class="row">
                <x-adminlte-input name="nombre" label="Nombre del Rol nuevo" placeholder="Aqui su nuevo Rol a crear.."
                    fgroup-class="col-md-6" disable-feedback required />
            </div>
            <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fa fa-cogs" />
        </form>
    </x-adminlte-modal>
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
