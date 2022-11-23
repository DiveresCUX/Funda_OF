@extends('layouts.app')

@section('template_title')
    Update Mascota
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Mascota</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mascotas.update', $mascota->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        {{ Form::label('nombre') }}
                                        {{ Form::text('nombre', $mascota->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? '
                                        is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group mt-3 mb-3">
                                        <label for="">Sexo</label>
                                        <select name="sexo" class="form-select" aria-label="Sexo select">
                                            <option selected>Sexo</option>
                                            <option {{ $mascota->sexo == 'macho'? 'selected' : '' }} value="macho">Macho</option>
                                            <option {{ $mascota->sexo == 'hembra'? 'selected' : '' }} value="hembra">Hembra</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 mb-3">
                                        <label for="">Especie</label>
                                        <select name="especie" class="form-select" aria-label="Especie select">
                                            <option selected>especie</option>
                                            <option {{ $mascota->especie == 'perro'? 'selected' : '' }} value="perro">Perro</option>
                                            <option {{ $mascota->especie == 'gato'? 'selected' : '' }} value="gato">Gato</option>
                                            <option {{ $mascota->especie == 'animal_de_granja'? 'selected' : '' }} value="animal_de_granja">Animal de granja</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('raza') }}
                                        {{ Form::text('raza', $mascota->raza, ['class' => 'form-control' . ($errors->has('raza') ? ' is-invalid' :
                                        ''), 'placeholder' => 'Raza']) }}
                                        {!! $errors->first('raza', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('descripcion') }}
                                        {{ Form::text('descripcion', $mascota->descripcion, ['class' => 'form-control' .
                                        ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                                        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group mt-3 mb-3">
                                        <label for="">Tamaño</label>
                                        <select name="tamanio" class="form-select" aria-label="Tamanio select">
                                            <option>Tamaño</option>
                                            <option {{ $mascota->tamanio == 'pequeño'? 'selected' : '' }} value="pequeño">Pequeño</option>
                                            <option {{ $mascota->tamanio == 'mediano'? 'selected' : '' }} value="mediano">Mediano</option>
                                            <option {{ $mascota->tamanio == 'grande'? 'selected' : '' }} value="grande">Grande</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Elija una foto</label>
                                        @if(!empty($mascota->foto))
                                        <img class="d-block my-3" width="200" height="200" src="{{ @Vite::asset('storage/app/public/'.$mascota->foto) }}" alt="">
                                        @endif
                                        <input class="form-control" type="file" id="foto" name="foto">
                                    </div>
                                    <div class="form-group my-3">
                                        <label for="">Estado</label>
                                        <select name="estado" class="form-select mb-3" aria-label="Estado select">
                                            <option value="1" selected>Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
