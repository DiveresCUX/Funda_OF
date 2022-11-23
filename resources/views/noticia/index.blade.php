@extends('layouts.app')

@section('template_title')
    Noticia
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title" style="font-size:40px">
                                {{ __('Noticias') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('noticias.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Noticia') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="d-flex justify-content-end">
                        <div>
                            <a target="_blank" class="btn btn-primary m-3" href="{{ route('imprimir-mascotas') }}">Imprimir datos</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-noticia" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Titulo</th>
										<th>Subtitulo</th>
										<th>Contenido</th>
										<th>Imagen</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($noticias as $noticia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $noticia->titulo }}</td>
											<td>{{ $noticia->subtitulo }}</td>
											<td>{{ substr($noticia->contenido, 0 , 20) }}...</td>
											<td><img width="100" height="100" src="{{ @Vite::asset('storage/app/public/'.$noticia->imagen) }}" alt=""></td>

                                            <td>
                                                <form style="display:flex; justify-content:space-between;" action="{{ route('noticias.destroy',$noticia->id) }}" method="POST">
                                                    <a style="margin:5px;" class="btn btn-sm btn-primary " href="{{ route('noticias.show',$noticia->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a style="margin:5px;" class="btn btn-sm btn-success" href="{{ route('noticias.edit',$noticia->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    <a style="margin:5px;" target="_blank" class="btn btn-sm btn-primary "
                                                    href="#"><i class="fa-regular fa-file-pdf"></i> PDF</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="margin:5px;" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $noticias->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
$('div.alert').delay(4000).slideUp(300);
$(document).ready(function () {
    $('#table-noticia').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    });
});
</script>
@endsection
