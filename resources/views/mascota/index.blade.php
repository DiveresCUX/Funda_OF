@extends('layouts.app')

@section('template_title')
Mascota
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" style="font-size:40px">
                            {{ __(' Mascotas en adopción ') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('mascotas.create') }}" class="btn btn-success btn-sm float-right"
                                data-placement="left">
                                {{ __('Registrar Mascota') }}
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
                        <table id="table-mascota" class="table table-striped table-light table-bordered" style="width:100%">
                            <thead class="thead table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Sexo</th>
                                    <th>Especie</th>
                                    <th>Raza</th>
                                    <th>Descripcion</th>
                                    <th>Tamaño</th>
                                    <th>Foto</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mascotas as $mascota)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $mascota->nombre }}</td>
                                    <td>{{ $mascota->sexo }}</td>
                                    <td>{{ $mascota->especie }}</td>
                                    <td>{{ $mascota->raza }}</td>
                                    <td>{{ substr($mascota->descripcion, 0 , 20) }}</td>
                                    <td>{{ $mascota->tamanio }}</td>
                                    <td><img width="100" height="100"
                                            src="{{ @Vite::asset('storage/app/public/'.$mascota->foto) }}" alt=""></td>
                                    <td>{{ $mascota->estado }}</td>

                                    <td>
            
                                        <form style="display:flex; justify-content:space-between;"action="{{ route('mascotas.destroy',$mascota->id) }}" method="POST">
                                            <a style="margin:5px;" class="btn btn-sm btn-primary "
                                                href="{{ route('mascotas.show',$mascota->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> Show</a>
                                            <a style="margin:5px;" class="btn btn-sm btn-success"
                                                href="{{ route('mascotas.edit',$mascota->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> Edit</a>
                                            <a style="margin:5px;" target="_blank" class="btn btn-sm btn-primary "
                                                    href="{{ route('imprimir.mascota',$mascota->id) }}"><i class="fa-regular fa-file-pdf"></i> PDF</a>
                                            @csrf
                                            @method('DELETE')
                                            <button  style="margin:5px;" type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('div.alert').delay(4000).slideUp(300);
    $(document).ready(function () {
        $('#table-mascota').DataTable({
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
            lengthMenu: [
            [ 5, 10, 25, -1 ],
            [ '5 Filas', '25 Filas ', '50 Filas', 'Mostrar todo' ]
            ],
            buttons: [
                'excel', 'pdf', 'print',
            ]
        });
    });
    
</script>
@endsection
