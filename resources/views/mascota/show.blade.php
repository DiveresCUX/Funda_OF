@extends('layouts.app')

@section('template_title')
    {{ $mascota->name ?? 'Show Mascota' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Mascota</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mascotas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $mascota->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo:</strong>
                            {{ $mascota->sexo }}
                        </div>
                        <div class="form-group">
                            <strong>Especie:</strong>
                            {{ $mascota->especie }}
                        </div>
                        <div class="form-group">
                            <strong>Raza:</strong>
                            {{ $mascota->raza }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $mascota->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Tamanio:</strong>
                            {{ $mascota->tamanio }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            {{ $mascota->foto }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $mascota->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
