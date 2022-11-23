@extends('layouts.app')

@section('template_title')
    {{ $adopcione->name ?? 'Show Adopcione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Adopcione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('adopciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $adopcione->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Rut:</strong>
                            {{ $adopcione->rut }}
                        </div>
                        <div class="form-group">
                            <strong>Domicilio:</strong>
                            {{ $adopcione->domicilio }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $adopcione->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $adopcione->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Mascota Id:</strong>
                            {{ $adopcione->mascota_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
