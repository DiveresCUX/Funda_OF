<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $noticia->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-3">
            {{ Form::label('subtitulo') }}
            {{ Form::text('subtitulo', $noticia->subtitulo, ['class' => 'form-control' . ($errors->has('subtitulo') ? ' is-invalid' : ''), 'placeholder' => 'Subtitulo']) }}
            {!! $errors->first('subtitulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea placeholder="Escriba el contenido de la noticia" class="form-control" id="contenido" name="contenido" rows="3">{{ $noticia->contenido }}</textarea>
            </div>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Elija una imagen</label>
            <input class="form-control" type="file" id="imagen" name="imagen">
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Publicar Noticia</button>
    </div>
</div>
