@extends('layout.plantilla')

@section('content')
    <div class="row pt-2">
        <h1 class="text-center p-0">{{ $edificio }}</h1>
        <div class="col-md-12 p-0">
            <div class="col-sm-12 text-center w-100">
                <figure class="figure ">
                    <img src="{{ asset('img/' . $imagen . '.jpg') }}" class="figure-img img-fluid rounded w-100" alt="...">
                </figure>
            </div>

        </div>
        <div class="col-md-12 p-1">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @php
                    $cont = 0;
                @endphp
                @foreach ($pisos as $item => $llave)
                    @if (count($llave) > 0)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="{{ $item }}">
                                <button class="accordion-button collapsed text-white" style="background-color: #9d435c"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#p{{ $cont }}"
                                    aria-expanded="false" aria-controls="p{{ $cont }}">
                                    {{ $item }}
                                </button>
                            </h2>
                            <div id="p{{ $cont }}" class="accordion-collapse collapse"
                                aria-labelledby="{{ $item }}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    @foreach ($llave as $piso)
                                        @if ($piso->nombre != 'SANITARIOS')
                                            <a data-bs-toggle="modal" data-bs-target="#modal"
                                                onclick="cambio({{ $piso }})">
                                                <p>- {{ $piso->nombre }}</p>
                                            </a>
                                            <hr style='background-color: #993300'>
                                        @else
                                            <p>- {{ $piso->nombre }}</p>
                                            <hr style='background-color: #993300'>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    @php
                        $cont = $cont + 1;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4><b>Titular:</b><br /><span id="titular"></span>
                        <h4>
                            <h5><b>Teléfono</b><br /><span id="telefono"></span></h5>
                            <h5><b>Correo</b><br />
                                <p id="correo"></span>
                            </h5>
                            
                            @if ($cont > 5)
                                @if ($piso->horario != null)
                                    <h5><b>Horario</b><br /><span id="horario"></span></h5>
                                @endif
                            @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
<script>
    function cambio(params) {
        $("#exampleModalLabel").html(params['nombre']);
        $("#titular").html(params['titular']);
        $("#telefono").html(params['telefono']);
        $("#correo").text(params['correo']);
        $("#horario").html(params['horario']);

    }
</script>
