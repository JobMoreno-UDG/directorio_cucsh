@extends('layout.plantilla')

@section('content')
    <div class="container">
        <h2 class="text-center">Conoce nuestros Edificios</h2>
        <div class="row">
            @foreach ($edificios as $item)
                <h3 class="text-center">
                    
                    <a class="btn p-2 fs-3" href="{{ route('pagina.edificio', ['edificio' => $item->edificio]) }}">{{ $item->edificio }}</a>
                </h3>
            @endforeach
        </div>

    </div>
@endsection
