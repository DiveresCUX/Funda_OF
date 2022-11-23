@extends('layouts.template')
@section('content')
    <div class="py-0" style="background: rgb(195, 244, 224);">
        <div class="container py-5">
            <section id="adoptar">
                <div class="container_adopcion">
                    <div class="title_adopcion">
                        <center>
                            <h1>Todos ellos, tienen derecho a una oportunidad</h1>
                            <h3>Abrete al amor más honesto</h3>
                        </center>
                    </div>

                    <div class="selects row">
                        <div class="col-sm-12 col-md-4">
                            <select onchange="busquedaSelect()" class="mascota" id="especie_select" name="especie_select">
                                <option>Especie</option>
                                <option value="gato">Gatos</option>
                                <option value="perro">Perros</option>
                                <option value="animal_de_granja">Animal de granja</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <select onchange="busquedaSelect()" class="edad" id="sexo_select" name="sexo_select">
                                <option>Sexo</option>
                                <option value="macho">Macho</option>
                                <option value="hembra">Hembra</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <select onchange="busquedaSelect()" class="tamaño" id="tamanio_select" name="tamanio_select">
                                <option>Tamaño</option>
                                <option value="pequeño">Pequeño</option>
                                <option value="mediano">Mediano</option>
                                <option value="grande">Grande</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row" id="cargar_animales">

    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enviar solicitud</h5>
                </div>
                <div class="modal-body">
                    @guest
                        <h5>Debe registrarse o iniciar sesion para poder enviar un solicitud de adopción</h5>
                        <div class="row mx-auto">
                            <a style="background-color: #CE7C2A !important;border-color: #CE7C2A;"
                                href="{{ route('register') }}" class="btn btn-primary my-2">Registrar</a>
                            <a style="background-color: #CE7C2A !important;border-color: #CE7C2A;" href="{{ route('login') }}"
                                class="btn btn-primary my-2">Iniciar sesion</a>
                        </div>
                    @else
                        <div class="row">
                            <div class="">
                                <div class="row min-form">
                                    <div id="resultmm">
                                        <span class="seccess">Rellene el siguiente formulario para enviar una solicitud de
                                            adopción.</span>
                                    </div>
                                    <form id="formulario_adopcion" class="row" action="{{ route('adopciones.store') }}"
                                        method="post">
                                        <div class="col-md-6 col-sm-12 my-2">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="nombre" required=""
                                                    placeholder="Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 my-2">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="rut" required=""
                                                    placeholder="RUT">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 my-2">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="domicilio" required=""
                                                    placeholder="Domicilio">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 my-2">
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="correo" required=""
                                                    placeholder="Correo">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 my-2">
                                            <div class="form-group">
                                                <input class="form-control" type="number" name="telefono" required=""
                                                    placeholder="Telefono">
                                            </div>
                                        </div>
                                        <input type="hidden" id="mascota_id_input" name="mascota_id">
                                        <div class="col-md-12 col-sm-12 my-2">
                                            <div class="form-group">
                                                <div class="d-grid gap-2">
                                                    <button onclick="enviarSolicitud()" class="btn btn-secondary"
                                                        type="button">Enviar Solicitud</button>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="cerrarModal()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'))
        let url = window.location.origin + '/'
        let mascota_input = document.getElementById('mascota_id_input');
        let div_cargar_animales = document.getElementById('cargar_animales')

        function abrirModal(mascota_id) {
            //mascota_id.value = $mascota_id
            console.log('modal' + mascota_input);
            myModal.show()
            mascota_input.value = mascota_id
        }

        function cerrarModal() {
            myModal.hide();
            mascota_input.value = ''
        }

        function enviarSolicitud() {
            const data = new FormData(document.getElementById('formulario_adopcion'));
            fetch(url + 'adopciones', {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    method: 'POST',
                    body: data
                })
                .then(function(response) {
                    if (response.ok) {
                        return response.text()
                    } else {
                        throw "Error en la llamada Ajax";
                    }

                })
                .then(function(texto) {
                    cerrarModal()
                    console.log(texto);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                })
                .catch(function(err) {
                    console.log(err);
                });
        }

        //Declaras selects
        let especie = document.getElementById('especie_select');
        let sexo = document.getElementById('sexo_select');
        let tamanio = document.getElementById('tamanio_select');


        function busquedaSelect() {
            let formData = new FormData();
            formData.append('especie', especie.value);
            formData.append('sexo', sexo.value);
            formData.append('tamanio', tamanio.value);

            if (especie.value != 'Especie' || sexo.value != 'Sexo' || tamanio.value != 'Tamaño') {
                console.log('hola');
                fetch(url + 'filtro-animales', {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        method: 'POST',
                        body: formData
                    })
                    .then(function(response) {
                        if (response.ok) {
                            return response.json()
                        } else {
                            throw "Error en la llamada Ajax";
                        }

                    })
                    .then(function(datos) {
                        let data = ''

                        function pasarLista(animal, indice) {
                            data += `<div class="card col-md-4 col-sm-12">
                    <div class="img_card">
                        <img src="{{ @Vite::asset('/storage/app/public/${animal.foto}') }}" alt="perrito">
                        <img class="patita" src="{{ @Vite::asset('resources/img/huella_icon.png') }}" alt="Patita">
                        <div class="nombre_animal">
                            <h1>${animal.nombre}</h1>
                        </div>
                    </div>
                    <div class="title_card">
                        <h2>${animal.sexo}</h2>
                    </div>
                    <div class="description_card">
                        <p>${animal.descripcion}</p>

                        <button onclick="abrirModal(${animal.id})">Adoptar</button>
                    </div>
                </div>`;
                        }

                        datos.forEach((nombre, indice) => pasarLista(nombre, indice));

                        div_cargar_animales.innerHTML = data
                    })
                    .catch(function(err) {
                        console.log(err);
                    });
            } else {
                getDataAnimales()
            }
        }

        //Llamar a la funcion al cargar la pagina
        getDataAnimales();

        function getDataAnimales() {
            fetch(url + 'get-animales', {
                    method: 'GET',
                })
                .then(function(response) {
                    if (response.ok) {
                        return response.json()
                    } else {
                        throw "Error en la llamada Ajax";
                    }

                })
                .then(function(datos) {
                    let data = ''

                    function pasarLista(animal, indice) {
                        data += `<div class="card col-md-4 col-sm-6 ">
                    <div class="img_card">
                        <img src="{{ @Vite::asset('/storage/app/public/${animal.foto}') }}" alt="perrito">
                        <img class="patita" src="{{ @Vite::asset('resources/img/huella_icon.png') }}" alt="Patita">
                        <div class="nombre_animal">
                            <h3>${animal.nombre}</h3>
                        </div>
                    </div>
                    <div class="title_card">
                        <h2>${animal.sexo}</h2>
                    </div>
                    <div class="description_card">
                        <p>${animal.descripcion}</p>
                        <button onclick="abrirModal(${animal.id})">Adoptar</button>
                    </div>
                </div>`;
                    }

                    datos.forEach((nombre, indice) => pasarLista(nombre, indice));

                    div_cargar_animales.innerHTML = data

                    //console.log(data);


                })
                .catch(function(err) {
                    console.log(err);
                });
        }
    </script>
@endsection
