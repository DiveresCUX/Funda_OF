@extends('layouts.app')

@section('template_title')
    Adopcione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title" style="font-size:40px">
                                {{ __('Solicitudes de Adopción') }}
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    <div class="d-flex justify-content-end">
                        <div>
                            <a target="_blank" class="btn btn-primary m-3" href="{{ route('imprimir-adopciones') }}">Imprimir datos</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-adopcione" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Nombre</th>
										<th>Rut</th>
										<th>Domicilio</th>
										<th>Correo</th>
										<th>Telefono</th>
										<th>Mascota</th>
                                        <th>Especie</th>
                                        <th>Raza</th>
                                        <th>Foto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adopciones as $adopcione)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $adopcione->nombre }}</td>
											<td>{{ $adopcione->rut }}</td>
											<td>{{ $adopcione->domicilio }}</td>
											<td>{{ $adopcione->correo }}</td>
											<td>{{ $adopcione->telefono }}</td>
											<td>{{ $adopcione->mascota->nombre }}</td>
                                            <td>{{ $adopcione->mascota->especie }}</td>
                                            <td>{{ $adopcione->mascota->raza }}</td>
                                            <td><img width="100" height="100"
                                                src="{{ @Vite::asset('storage/app/public/'.$adopcione->mascota->foto) }}" alt=""></td>

                                            <td>
                                                <form style="display:flex; justify-content:space-between;" action="{{ route('adopciones.destroy',$adopcione->id) }}" method="POST">
                                                    <a style="margin:5px;" target="_blank" class="btn btn-sm btn-primary "
                                                    href="{{ route('imprimir.adopcion',$adopcione->id) }}"><i class="fa-regular fa-file-pdf"></i> PDF</a>
                                                    <!--<a class="btn btn-sm btn-primary " href="{{ route('adopciones.show',$adopcione->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('adopciones.edit',$adopcione->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>-->
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="margin:5px;" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $adopciones->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('div.alert').delay(4000).slideUp(300);
    $(document).ready(function () {
        $('#table-adopcione').DataTable({
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
