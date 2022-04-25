<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inicio</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark " style="background: #0C4C74">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('inicio') }}">
                <div class="col-sm-2">
                    <img src="{{ asset('img/cucsh.png') }}" style="width: 100px" alt="">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('pagina.edificio', ['edificio' => 'Edificio A']) }}">Edificio A</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('pagina.edificio', ['edificio' => 'Edificio B']) }}">Edificio B</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('pagina.edificio', ['edificio' => 'Edificio C']) }}">Edificio C</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('pagina.edificio', ['edificio' => 'Edificio D']) }}">Edificio D</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('pagina.edificio', ['edificio' => 'Edificio E']) }}">Edificio E</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Edificio F
                        </a>
                        <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item text-white"
                                    href="{{ route('pagina.edificio', ['edificio' => 'Edificio F']) }}">F</a></li>
                            <li><a class="dropdown-item text-white"
                                    href="{{ route('pagina.edificio', ['edificio' => 'Edificio F1']) }}">F1</a></li>
                            <li><a class="dropdown-item text-white"
                                    href="{{ route('pagina.edificio', ['edificio' => 'Edificio F2']) }}">F2</a></li>
                            <li><a class="dropdown-item text-white"
                                    href="{{ route('pagina.edificio', ['edificio' => 'Edificio F3']) }}">F3</a></li>
                            <li><a class="dropdown-item text-white"
                                    href="{{ route('pagina.edificio', ['edificio' => 'Edificio F4']) }}">F4</a></li>
                            <li><a class="dropdown-item text-white"
                                    href="{{ route('pagina.edificio', ['edificio' => 'Edificio F5']) }}">F5</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('pagina.edificio', ['edificio' => 'Edificio G']) }}">Edificio G</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('pagina.edificio', ['edificio' => 'Edificio H']) }}">Edificio I</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('pagina.edificio', ['edificio' => 'Edificio Servicios Generales Belenes']) }}">Edificio
                            Servicios Generales Belenes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="col-sm-12 text-center p-2">
            <form id="form-busqueda" class="row justify-content-center">
                @csrf
                <div class="col-sm-12 col-md-8 p-1">
                    <input type="text" class="form-control" placeholder="Introduce para buscar" autocomplete="off" name="buscador"
                        id="buscador">
                </div>
                <!--<div class="col-sm-12 col-md-3 p-1">
                    <button type="submit" class="btn d-inline btn-primary w-100">Buscar</button>
                </div>-->
            </form>
        </div>
        
        <div id="contenedor"></div>
        <hr>
        @yield('content')
    </div>
    <div id="footer">

        <div class="col-sm-12 p-3 mt-4" style="background: #185474">
            <p class="text-center text-white">CENTRO UNIVERSITARIO DE CIENCIAS SOCIALES Y HUMANIDADES</p>
        </div>

    </div>

</body>

</html>
<script>
    $(document).ready(function() {
        const input = document.getElementById('buscador');
        input.addEventListener('keyup', logKey);
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);

        });

        function fetch_data(page) {
            $.ajax({
                method: 'POST',
                data: $('#form-busqueda').serialize(),
                url: "{{ route('buscador') }}" + "?page=" +
                    page,
                success: function(data) {
                    $('#contenedor').html(data);
                }
            });
        }
    });

    function logKey() {
        let search = $('#buscador').val();
        //console.log(search);

        $.ajax({
            url: "{{ route('buscador') }}",
            method: 'POST',
            data: $('#form-busqueda').serialize()

        }).done(function(data) {
            $('#contenedor').html(data);
        });


    }
</script>
