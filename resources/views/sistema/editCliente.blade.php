@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edicion de Empleado</h1>
@stop

@section('content')
    <p>Ingrese la informacion del Empleado </p>

    <div class="card">
        {{-- @php
            if (session()) {
                if (session('message') == 'Datos Actualizados 👌') {
                    # code...
                    echo '<x-adminlte-alert class="bg-teal text-uppercase text-center"
                    icon="fa fa-lg fa-thumbs-up" title="Exito" dismissable id="exito">
                    Exito!, Registro completado 😎!!!
                    </x-adminlte-alert>';
                }
                # code...
            }
        @endphp --}}
        <div class="card-body">
            <form action="{{ route('cliente.update', $cliente) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="curp" label="CURP" label-class="text-lightblue"
                    value="{{ $cliente->curp }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="nombre" label="NOMBRE(S)" label-class="text-lightblue"
                    value="{{ $cliente->nombre }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="apellido" label="APELLIDOS" label-class="text-lightblue"
                    value="{{ $cliente->apellido }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot --}}
                <x-adminlte-input type="email" name="email" label="EMAIL" label-class="text-lightblue"
                    value="{{ $cliente->email }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="telefono" label="TELEFONO" label-class="text-lightblue"
                    value="{{ $cliente->telefono }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-select name="tipo_Contratacion" label="TIPO CONTRATACIÓN" label-class="text-lightblue" igroup-size="1x">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-lightblue">
                            <i class="fa fa-list-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                    <option value="" {{ old('tipo_Contratacion', $cliente->tipo_Contratacion) == '' ? 'selected' : '' }}>Seleccione su Tipo de Contratación</option>
                    <option value="Eventual" {{ old('tipo_Contratacion', $cliente->tipo_Contratacion) == 'Eventual' ? 'selected' : '' }}>Eventual
                    </option>
                    <option value="Contrato" {{ old('tipo_Contratacion', $cliente->tipo_Contratacion) == 'Contrato' ? 'selected' : '' }}>Contrato
                    </option>
                    <option value="Permanente" {{ old('tipo_Contratacion', $cliente->tipo_Contratacion) == 'Permanente' ? 'selected' : '' }}>
                        Permanente</option>
                </x-adminlte-select>
                
                {{-- With prepend slot, lg size, and label --}}
                <x-adminlte-input name="fecha_Ingreso" label="FECHA INGRESO" placeholder="01/12/24"
                    label-class="text-lightblue" value="{{ $cliente->fecha_Ingreso }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-calendar-times text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot, sm size and label --}}
                <x-adminlte-textarea name="direccion" label="DIRECCION" rows=5 label-class="text-lightblue" igroup-size="sm"
                    placeholder="Inserte su Direccion">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                    {{ $cliente->direccion }}
                </x-adminlte-textarea>
                
                

                {{-- Themes + icons --}}
                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save" />
                <a href="{{ route('cliente.index') }}" class="btn btn-primary float-right" icon="fas fa-save">Cancelar</a>

            </form>
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
        setTimeout(function() {
            document.getElementById("exito").style.display = "none";
        }, 4000);
    </script>

    @if (session('message'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('message') }}";
                Swal.fire({
                    'title': 'Resultado',
                    'text': mensaje,
                    'icon': 'success',
                })
            })
        </script>
    @endif
@stop
