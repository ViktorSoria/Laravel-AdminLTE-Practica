@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo Empleado</h1>
@stop

@section('content')
    <p>Ingrese la informacion del Empleado</p>

    <div class="card">
        @php
            if (session()) {
                if (session('message') == 'Informacion recibida 😉') {
                    # code...
                    echo '<x-adminlte-alert class="bg-teal text-uppercase text-center"
                    icon="fa fa-lg fa-thumbs-up" title="Exito" dismissable id="exito">
                    Exito!, Registro completado 😎!!!
                    </x-adminlte-alert>';
                }
                # code...
            }
        @endphp
        <div class="card-body">
            <form action="{{ route('empleado.store') }}" method="POST">
                @csrf

                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="curp" label="CURP" placeholder="Aqui su CURP"
                    label-class="text-lightblue" value="{{ old('curp') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="nombre" label="NOMBRE(S)" placeholder="Nombre(s)"
                    label-class="text-lightblue" value="{{ old('nombre') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="apellido" label="APELLIDOS" placeholder="Apellidos"
                    label-class="text-lightblue" value="{{ old('apellido') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot --}}
                <x-adminlte-input type="email" name="email" label="EMAIL" placeholder="test@test.com"
                    label-class="text-lightblue" value="{{ old('email') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="telefono" label="TELEFONO" placeholder="5512345678"
                    label-class="text-lightblue" value="{{ old('telefono') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-select name="tipo_Contratacion" label="TIPO CONTRATACIÓN" label-class="text-lightblue" igroup-size="1x">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-lightblue">
                            <i class="fa fa-list-alt text-lightblue "></i>
                        </div>
                    </x-slot>
                    <option value="" {{ old('tipo_Contratacion') == '' ? 'selected' : '' }}>Seleccione su Tipo de Contratación </option>
                    <option value="Eventual" {{ old('tipo_Contratacion') == 'Eventual' ? 'selected' : '' }}>Eventual</option>
                    <option value="Contrato" {{ old('tipo_Contratacion') == 'Contrato' ? 'selected' : '' }}>Contrato</option>
                    <option value="Permanente" {{ old('tipo_Contratacion') == 'Permanente' ? 'selected' : '' }}>Permanente</option>
                </x-adminlte-select>

                <x-adminlte-input name="fecha_Ingreso" label="FECHA INGRESO" placeholder="01/12/24"
                    label-class="text-lightblue" value="{{ old('fecha_Ingreso') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-calendar-times text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot, sm size and label --}}
                <x-adminlte-input name="direccion" label="DIRECCION" label-class="text-lightblue"
                    placeholder="Inserte su Direccion" value="{{ old('direccion') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text ">
                            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>



                {{-- With prepend slot, lg size, and label --}}
                {{-- <x-adminlte-select name="estado" label="ESTADO CIVIL" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-lightblue">
                            <i class="fa fa-spinner"></i>
                        </div>
                    </x-slot>
                    <option value="" {{ old('estado') == '' ? 'selected' : '' }}>Seleccione su estado civil</option>
                    <option value="Casado" {{ old('estado') == 'Casado' ? 'selected' : '' }}>Casado</option>
                    <option value="Soltero" {{ old('estado') == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                    <option value="Union Libre" {{ old('estado') == 'Union Libre' ? 'selected' : '' }}>Union Libre</option>
                </x-adminlte-select> --}}


                {{-- Themes + icons --}}
                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save" />
                {{-- <a href="/client" class="btn btn-primary float-right" icon="fas fa-save">Cancelar</a> --}}
                <a href="{{route('empleado.index')}}" class="btn btn-primary float-right" icon="fas fa-save">Cancelar</a>

            </form>
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
        setTimeout(function() {
            document.getElementById("exito").style.display = "none";
        }, 4000);
    </script>
    <script>
        console.log('Hi!');
    </script>
@stop