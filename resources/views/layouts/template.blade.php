<!DOCTYPE html>
<html lang="es">

<head>
    <!-- meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- icon and title -->
    <title>Fundación Patitas</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ @Vite::asset('resources/css/style.css') }}">
    <link rel="stylesheet" href="{{ @Vite::asset('resources/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ @Vite::asset('resources/css/adopcion.css') }}">
    <link rel="stylesheet" href="{{ @Vite::asset('resources/css/register.css') }}">
    <link rel="stylesheet" href="{{ @Vite::asset('resources/css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fonts -->
    <script src="https://kit.fontawesome.com/15fbf0e0d4.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.8/sweetalert2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light p-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img height="70" width="90" src="{{ @Vite::asset('resources/img/logo2.png') }}" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
              <li class="nav-item">
                <a class="nav-link mx-2 active" aria-current="page" href="/">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2" href="#nosotros">Nostros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2" href="#donaciones">Donaciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2" href="#noticias">Noticias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2" href="{{ route('adoptar') }}">Adopción</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
                <div class="login">
                  @guest
                    <a href="{{ route('register') }}" id="register">Registrar</a>
                  @endguest
                  @guest
                    <a href="{{ route('login') }}" id="login">Iniciar Sesión</a>
                  @else
                  <a href="{{ route('login') }}" class="get-btn" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                  @endguest
                </div>
            </ul>
          </div>
        </div>
      </nav>


    <!--The html below this line is for display purpose only-->


    @yield('content')

    <footer>
        <div class="container_footer_contact">
            <div class="contact_footer">
                <h2>Contactanos</h2>
                <div class="location_footer">
                    <i class="fa-solid fa-location-arrow"></i>
                    <p>Región de Aysén</p>
                </div>
                <div class="phone_footer">
                    <i class="fa-solid fa-phone"></i>
                    <p>123123213</p>
                </div>
                <div class="correo_footer">
                    <i class="fa-solid fa-envelope"></i>
                    <p>fundaciónpatitaspatagonicas@gmail.com</p>
                </div>
            </div>
            <div class="redes">
                <a href="">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
                <a href="">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="copy">
            <p>&copy;Fundación Patitas Patagónicas</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ @Vite::asset('resources/js/menu.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.8/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    @yield('scripts')
</body>

</html>
