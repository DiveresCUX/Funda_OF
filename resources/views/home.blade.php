@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="row g-3 my-2">
            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"></h3>
                        <p class="fs-5">Solicitudes</p>
                    </div>
                    <i class="fa-solid fa-shield-cat fa-4x"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"></h3>
                        <p class="fs-5">Publicaciones</p>
                    </div>
                    <i class="fa-solid fa-shield-dog  fa-4x"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"></h3>
                        <p class="fs-5">Noticias</p>
                    </div>
                    <i class="fa-solid fa-newspaper fa-4x"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"></h3>
                        <p class="fs-5">Donaciones</p>
                    </div>
                    <i class="fa-solid fa-hand-holding-dollar fa-4x"></i>
                </div>
            </div>
        </div>    
    </div>
@endsection
