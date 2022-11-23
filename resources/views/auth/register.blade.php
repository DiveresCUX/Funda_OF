@extends('layouts.template')

@section('content')
<div class="d-flex justify-content-center py-3 fondo">
    <div class="card w-50" style="background-color: #ffffff;">
        <div class="body">
            <h1 class="mb-5">Registro</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3" style="width: 100% !important; padding: 10px;">
                    <input class="form-control" type="text" name="name" id="name" placeholder="Nombre">
                    @error('name')
                    <div id="emailHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3" style="width: 100% !important; padding: 10px;">
                    <input class="form-control" type="email" name="email" id="email" placeholder="Correo Electrónico">
                    @error('email')
                    <div id="emailHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" style="width: 100% !important; padding: 10px;">
                    <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña">
                    @error('password')
                    <div id="emailHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3" style="width: 100% !important; padding: 10px;">
                <input class="form-control" type="password" name="password_confirmation" id="password-confirm"
                    placeholder="Confirme Contraseña">
                </div>

                <div class="mb-3" style="width: 100% !important; padding: 10px;">
                <button type="submit" value="Register" class="btn btn-primary" style="width: 100% !important;">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
