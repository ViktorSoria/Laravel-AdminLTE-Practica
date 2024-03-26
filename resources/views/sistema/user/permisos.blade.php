@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administracion de Permisos</h1>
@stop

@section('content')
    <div class="card">
        @php
            if (session()) {
                if (session('message') == 'Permiso Actualizado 👌') {
                    # code...
                    echo '<x-adminlte-alert class="bg-teal text-uppercase text-center"
                    icon="fa fa-lg fa-thumbs-up" title="Exito" dismissable id="exito">
                    Permiso Actualizado 👌
                    </x-adminlte-alert>';
                }
                # code...
            }
        @endphp
        <div class="card-header">
            <x-adminlte-button label="Nuevo" theme="primary" icon="fa fa-plus-circle" class="float-right" data-toggle="modal"
                data-target="#modalPurple" />
        </div>
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['ID', 'Nombre', ['label' => 'Acciones', 'no-export' => true, 'width' => 10]];

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
                @foreach ($permisos as $permiso)
                    <tr>
                        <td>{{ $permiso->id }}</td>
                        <td>{{ $permiso->name }}</td>
                        <td>
                            <a href="{{ route('permisos.edit', $permiso) }}" type="submit"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <form action="{{ route('permisos.destroy', $permiso) }}" method="POST" class="formEliminar"
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
    <x-adminlte-modal id="modalPurple" title="Nuevo Permiso" theme="primary" icon="fas fa-bolt" size='lg'
        disable-animations>
        <form action="{{ route('permisos.store') }}" method="POST">
            @csrf
            {{-- With label, invalid feedback disabled and form group class --}}
            <div class="row">
                <x-adminlte-input name="nombre" label="Nombre del nuevo Permiso" placeholder="Aqui su Permiso.." fgroup-class="col-md-6" disable-feedback required />
                {{-- @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror --}}
            </div>
            <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fa fa-cogs" />
        </form>
    </x-adminlte-modal>
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
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-outline-success m-1",
                        cancelButton: "btn btn-outline-danger m-1"
                    },
                    buttonsStyling: false
                });

                swalWithBootstrapButtons.fire({
                    title: "Estas seguro?",
                    text: "No podra revertir esta accion",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, Borralo!",
                    cancelButtonText: "No, cancelalo!",
                    reverseButtons: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire({
                            title: "Borrado!",
                            text: "Tu permiso ha sido borrado.",
                            icon: "success"
                        }).then(() => {
                            // Una vez que el usuario confirme, enviamos el formulario
                            this.submit();
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelado",
                            text: "Tu permiso esta a salvo :)",
                            icon: "error"
                        });
                    }
                });
            });
        });
    </script>

    @if (session('message'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('message') }}";
                Swal.fire({
                    title: 'Resultado',
                    text: mensaje,
                    icon: 'success',
                });

                // Ocultar el mensaje después de 4 segundos
                setTimeout(function() {
                    document.getElementById("exito").style.display = "none";
                }, 4000);
            });
        </script>
    @endif

@stop
