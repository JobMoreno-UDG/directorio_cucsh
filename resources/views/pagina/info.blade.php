@extends('layout.plantilla')

@section('content')
    <div>
        <h5 class="text-center">{{ $consulta->nombre }}</h5>
        <hr>
        <p><b>Edificio</b>: {{ $consulta->edificio }}</p>
        <p><b>Piso</b>: {{ $consulta->piso }}</p>
        <p><b>Titular</b>: {{ $consulta->titular }}</p>
        <p><b>Teléfono</b>: {{ $consulta->telefono }}</p>
        <p><b>Correo</b>: {{ $consulta->correo }}</p>
        @if ($consulta->horario != null)
            <p><b>Horario de atención</b>: {{ $consulta->horario }}</p>
        @endif

    </div>
@endsection
