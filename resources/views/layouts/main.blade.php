<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <!-- CSS Da aplicação-->
    <link rel="stylesheet" href="/css/style.css">
    <!-- CSS botstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>

<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="nav bar-brand">
                    <img src="/img/cervejaLogo.jpeg" alt="logo">
                </a>
                <!--Oque faz o menu ficar alinhado é o atributo 'nav-bar'-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Populares</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('event.index') }}">Eventos</a>
                    </li>

                 @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('event.create') }}">Criar Evento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home">DashBoard</a>
                    </li>
                    <li>
                     <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                         Sair
                    </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                 @endauth
                    
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Cadastrar</a>
                    </li>
                @endguest
                </ul>
            </div>
        </nav>

    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                <p class="msg">{{session('msg')}} </p>
                @endif
                @yield('content')
            </div>
        </div>
    </main>

    <footer>
        <p> &copy Sisnapse Sistemas-2021 </p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

</body>

</html>