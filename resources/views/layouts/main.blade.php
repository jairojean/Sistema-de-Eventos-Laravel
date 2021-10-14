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
   <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>

<body>
    <header> 

    <nav class="navbar navbar-expand-md navbar-light navbar-transparente">
            <div class="container">
                <a href="/">
                    <img src="img/logoEventos.png" class="navbar-brand" alt="logo" width="130">
                </a>
                <!-- Botão hamburguer-->
                <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                  <i class="fas fa-bars text-white" ></i>
                </button>
                <!-- Lista de links-->
                <div class="collapse navbar-collapse" id="nav-principal">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link"> inicio</a>
                        </li>
                      
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('event.create') }}">Criar Evento</a>
                        </li>
                        <li class="nav-item divisor"></li>
                       
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('event.index') }}">Eventos</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Cadastrar</a>
                    </li>
                @endguest
                        @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Meu Painel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('event.create') }}">Criar Evento</a>
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

                    

                    </ul>
                </div>
            </div>
        </nav>



<!--


        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="nav bar-brand">
                    <img src="/img/cervejaLogo.jpeg" alt="logo">
                </a>

                <!--Oque faz o menu ficar alinhado é o atributo 'nav-bar'
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('event.index') }}">Eventos</a>
                    </li>
                 @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Meu Painel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('event.create') }}">Criar Evento</a>
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
        </nav>  -->
    </header>
    <main >
        <div class="container">
            <div class="row">
                @if(session('msg'))
                <p class="msg">{{session('msg')}} </p>
                @endif

                      <div class="#home">
                        @yield('content')
                        </div>
            </div>
        </div>
    </main>

    <footer>
        <p> Sisnapse Sistemas &copy 2021 </p>
    </footer>
    <!-- Importação de icones -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <!-- Importação de js botstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>