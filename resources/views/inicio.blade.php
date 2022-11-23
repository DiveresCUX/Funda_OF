@extends('layouts.template')
@section('content')
<banner>
    <div class="bg_banner">
        <div class="text_banner">
            <h1>Fundación <br>
                Patitas Patagónicas</h1>
            <p>Si te interesa adoptar, hás click en el boton "ADOPTAR" y conoce a nuestros amigos. También podes
                deslizar y conocernos.</p>
            <div class="btn">
                <a href="{{ route('adoptar') }}">Adoptar</a>
                <div class="redes">
                    <i class="fa-brands fa-whatsapp"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-facebook"></i>
                </div>
            </div>
        </div>
        <div class="relleno">
            <p>relleno</p>
        </div>
    </div>
</banner>

<section id="nosotros">
    <div class="container_nosotros">
        <div class="img">
            <img src="{{ @Vite::asset('resources/img/gatitos_nosotros.jpg') }}" alt="">
        </div>
        <div class="text_nosotros">
            <div class="title">
                <img src="{{ @Vite::asset('resources/img/huella_icon.png') }}" alt="Icon huella">
                <p>Nosotros</p>
            </div>
            <h2>¿Quienes Somos?</h2>
            <p>Somos una fundación radicada en Coyhaique, Región de Aysén, dedicada a proporcionar una vida digna a los animales domesticos y de granja. Dedicamos nuestro tiempo a rescatar, rehabilitar y dar en adopción a muchas victimas de abuso y maltrato.
                <br><br> 
                <p>Misión: Nuestra misión como fundación es proporcionar una vida digna a los animales domesticos y de granja. Dedicamos nuestro tiempo a rescatar, rehabilitar y dar en adopción a muchas vi­ctimas de abuso y maltrato por el ser humano.</p>
                <p>Visión: La visión de la fundación y santuario animal patitas patagónicas, es ir en ayuda todos los animales de la Región de Aysén, para que en futuro todos los animales del mundo sean respetados y protegidos.</p>
                
            </p>
        </div>
    </div>
</section>

<section id="fotos">
    <div class="container_fotos">
        <img src="{{ @Vite::asset('resources/img/perritos_donaciones.jpg') }}" alt="">
        <img src="{{ @Vite::asset('resources/img/gatitos_nosotros.jpg') }}" alt="">
        <img src="{{ @Vite::asset('resources/img/portada-banner.jpg') }}" alt="">
        <img src="{{ @Vite::asset('resources/img/perro_card.jpg') }}" alt="">
    </div>
</section>

<section id="donaciones" class="">
    <div class="container_donaciones">
        <div class="text_donaciones">
            <div class="title">
                <img src="{{ @Vite::asset('resources/img/huella_icon.png') }}" alt="Icon huella">
                <p>Donaciones</p>
            </div>
            <h2>Donaciones</h2>
            <center>
                <div class="p_donaciones">
                    <div class="p_1">
                        <p><span>Transferencia</span><br>
                            Si deseas realizar un aporte, para que podamos seguir salvando más vidas, te dejamos
                            nuestros datos. <br><br>
                            Banco: Banco Estado <br>
                            Tipo: Chequera Electronica <br>
                            Número: 843-7-04-8426-0 <br>
                            Rut: 65.095.437-8
                        </p>
                    </div>
                    <div class="p_2">
                        <p><span>PayPal</span><br>
                            En caso de no poder realizar transferencia con el método anterior, también contamos con
                            PayPal, ház click en el boton "Donar" y te redirigirá a PayPal.
                        </p>
                        <br><br>
                        <a href="https://www.paypal.com/cl/home">Donar</a>
                    </div>
                </div>
            </center>
        </div>
    </div>
</section>

<section id="noticias">
    <div class="title">
        <img src="{{ @Vite::asset('resources/img/huella_icon.png') }}" alt="Icon huella">
        <p>Noticias</p>
    </div>
    <div class="owl-carousel owl-theme">
        @foreach($noticias as $noticia)
        <div class="item d-flex flex-column flex-md-row flex-sm-column justify-content-center align-items-center">
            <div class="w-50" style="height: 400px;">
                <img class="h-100 w-100" src="{{ @Vite::asset('storage/app/public/'.$noticia->imagen) }}" alt="Imagen Prueba">
            </div>
            <div class="w-50 m-2 p-2">
                <h2>{{ $noticia->titulo }}</h2>
                <h4>{{ $noticia->subtitulo }}</h4>
                <p>{{ $noticia->contenido }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection
@section('scripts')
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
</script>
@endsection
