@extends('layouts.template')

@section('content')
    <div class="d-flex justify-content-center py-3 fondo">
        <div class="card w-50" style="background-color: #ffffff;">
            <h3 class="mb-5">Inicio de Sesión</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3" style="width: 100% !important; padding: 10px;">
                    <input class="form-control" value="{{ old('email') }}" required type="email" name="email" id="email"
                    placeholder="Correo Electrónico">
                    @error('email')
                    <div id="emailHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" style="width: 100% !important; padding: 10px;">
                    <input class="form-control" required type="password" name="password" id="password" placeholder="Contraseña">
                    @error('password')
                    <div id="emailHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>  
                <div class="mb-4" style="width: 100% !important; padding: 10px;">
                <button type="submit" value="Register" class="btn btn-primary" style="width: 100% !important;">Iniciar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
