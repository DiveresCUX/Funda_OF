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
                <option value="macho">Macho</option>
                <option value="hembra">Hembra</option>
            </select>
        </div>
        <div class="form-group mt-3 mb-3">
            <label for="">Especie</label>
            <select name="especie" class="form-select" aria-label="Especie select">
                <option selected>especie</option>
                <option value="perro">Perro</option>
                <option value="gato">Gato</option>
                <option value="animal_de_granja">Animal de granja</option>
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
            {{ Form::textarea('descripcion', $mascota->descripcion, ['class' => 'form-control' .
            ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mt-3 mb-3">
            <label for="">Tamaño</label>
            <select name="tamanio" class="form-select" aria-label="Tamanio select">
                <option selected>Tamaño</option>
                <option value="pequeño">Pequeño</option>
                <option value="mediano">Mediano</option>
                <option value="grande">Grande</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Elija una foto</label>
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
        <button type="submit" class="btn btn-primary">Publicar Mascota</button>
    </div>
</div>
