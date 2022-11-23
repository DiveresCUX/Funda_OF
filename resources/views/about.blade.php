@extends('layouts.template')
@section('content')
<section class="midsection"  style="background: url({{ @Vite::asset('resources/images/banner4.png') }});background-size: cover;
    background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="banner-about">
                    <h2>About Us</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing <br>and typesetting industry</p>
                    <div class="up-arrow">
                        <a href="index-2.html"> <img src="{{ @Vite::asset('resources/images/up-a.png') }}" alt=""></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="dogmilo">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-dogmilo">
                        <h6><img src="{{ @Vite::asset('resources/images/dog-icon.png') }}" alt="">About DogMilo</h6>
                        <h2>Welcome DogMilo Pets</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="dogmilo-about">
                        <img src="{{ @Vite::asset('resources/images/about-dog.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
