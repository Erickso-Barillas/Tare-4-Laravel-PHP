<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Estudiantes</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <main class="flex-grow-1">
        
        <section>
            <nav class="navbar navbar-expand-lg bg-dark-subtle">
                <div class="container-fluid">
                    <a class="navbar-brand">Escuela</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Estudiantes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        
        <section class="my-2 mx-3">
            <button type="button" class="btn btn-outline-success" id="openModalBtn">
                Agregar 
            </button>
        </section>
        
        <section class="my-1 mx-3">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="table-primary">
                        <th>Carnet</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Tipo de Sangre</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estudiantes as $estudiante)
                    <tr data-estudiante='{{ json_encode($estudiante) }}' class="selectable-row">
                        <td>{{ $estudiante->carnet }}</td>
                        <td>{{ $estudiante->nombres }}</td>
                        <td>{{ $estudiante->apellidos }}</td>
                        <td>{{ $estudiante->dirección }}</td>
                        <td>{{ $estudiante->telefono }}</td>
                        <td>{{ $estudiante->correo_electronico }}</td>
                        <td>{{ $estudiante->fecha_nacimiento }}</td>
                        <td>{{ $estudiante->sangre }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <!-- Modal -->
        <section>
            <div id="myModal" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tituloAdd">Agregar</h5>
                            <button type="button" id="cerrarDialogButton" class="btn-close" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="modalContent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <section>
    <footer class="footer-text">
    <p><i>La Belleza de las Cosas Reside en el Espíritu de Quien las Contempla...</i></p>
    </footer>
    </section>

    <section>
        <script>
            const hostPort = "{{ $hostPort }}"
            const hostDirection = "{{ $hostDirection }}"
            document.addEventListener('DOMContentLoaded', () => {
                const openModalBtn = document.getElementById('openModalBtn');
                const modal = document.getElementById('myModal');
                const cerrarDialogButton = document.getElementById('cerrarDialogButton')
                const modalContent = document.getElementById('modalContent');
                const selectableRows = document.querySelectorAll('.selectable-row');

                
                openModalBtn.addEventListener('click', async () => {
                    try {
                        const response = await fetch(`http://${hostDirection}:${hostPort}/agregar`);
                        const addFormContent = await response.text();
                        modalContent.innerHTML = addFormContent;
                        const titulo = document.getElementById('tituloAdd');
                        titulo.textContent = 'Agregar';
                        modal.style.display = 'block';
                    } catch (error) {
                        console.error(error);
                    }
                });

                
                modal.addEventListener('click', (event) => {
                    if (event.target === modal) { modal.style.display = 'none'; }
                });

                
                cerrarDialogButton.addEventListener('click', (event) => {
                    if (event.target === cerrarDialogButton) { modal.style.display = 'none'; }
                });

                
                selectableRows.forEach(row => {
                    row.addEventListener('click', async () => {
                        //-------------------------------//
                            // obtener formulario //
                        //-------------------------------//
                        const response = await fetch(`http://${hostDirection}:${hostPort}/agregar`);
                        const addFormContent = await response.text();
                        modalContent.innerHTML = addFormContent;
                        const titulo = document.getElementById('tituloAdd');
                        titulo.textContent = 'Editar Estudiante';
                        modal.style.display = 'block';

                        //-------------------------------//
                             // obtener estudiante //
                        //-------------------------------//
                        const estudianteData = row.getAttribute('data-estudiante');
                        const estudiante = JSON.parse(estudianteData);

                        
                        const idEstudianteInput = document.querySelector('#myModal [name="id_estudiante"]');
                        const carnetInput = document.querySelector('#myModal [name="carnet"]');
                        const nombresInput = document.querySelector('#myModal [name="nombres"]');
                        const apellidosInput = document.querySelector('#myModal [name="apellidos"]');
                        const direccionInput = document.querySelector('#myModal [name="dirección"]');
                        const telefonoInput = document.querySelector('#myModal [name="telefono"]');
                        const correoInput = document.querySelector('#myModal [name="correo_electronico"]');
                        const tipoSangreInput = document.querySelector('#myModal [name="tipo_sangre"]');
                        const fechaNacimientoInput = document.querySelector('#myModal [name="fecha_nacimiento"]');

                        
                        idEstudianteInput.value = estudiante.id_estudiante;
                        carnetInput.value = estudiante.carnet;
                        nombresInput.value = estudiante.nombres;
                        apellidosInput.value = estudiante.apellidos;
                        direccionInput.value = estudiante.dirección;
                        telefonoInput.value = estudiante.telefono;
                        correoInput.value = estudiante.correo_electronico;

                        const fechaNacimiento = new Date(estudiante.fecha_nacimiento);
                        fechaNacimientoInput.value = fechaNacimiento.toISOString().split('T')[0];

                        const tipoSangreOptions = tipoSangreInput;
                        for (let i = 0; i < tipoSangreOptions.length; i++) {
                            if (tipoSangreOptions[i].value === estudiante.id_tipo_sangre.toString()) {
                                tipoSangreOptions[i].selected = true;
                                break;
                            }
                        }

                        
                        const spaceForButton = document.getElementById('space-for-button');
                        
                        const updateButton = document.createElement('button');
                        updateButton.type = 'submit';
                        updateButton.textContent = 'Actualizar';
                        updateButton.setAttribute('name', 'update');
                        updateButton.setAttribute('value', 'true');
                        updateButton.setAttribute('class', 'btn btn-info ')
                        
                        const deleteButton = document.createElement('button');
                        deleteButton.type = 'submit';
                        deleteButton.textContent = 'Eliminar';
                        deleteButton.setAttribute('name', 'delete');
                        deleteButton.setAttribute('value', 'true');
                        deleteButton.setAttribute('class', 'btn btn-danger');
                        deleteButton.addEventListener('click', () => {
                            const confirmDelete = window.confirm('¿Estás seguro de que deseas eliminar al estudiante?');
                            if (confirmDelete) {
                                const form = document.querySelector('#myModal form');
                                form.submit();
                                modal.style.display = 'none';
                            } else {
                                event.preventDefault();
                            }
                        });
                        spaceForButton.innerHTML = '';
                        spaceForButton.appendChild(updateButton);
                        spaceForButton.appendChild(deleteButton);
                        spaceForButton.setAttribute('class', 'd-grid gap-2 col-12 mx-auto')
                    });
                });