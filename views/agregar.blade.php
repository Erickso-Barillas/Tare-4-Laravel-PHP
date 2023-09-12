<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>

<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container">
            <h1><span style="color: aliceblue;">Erickso Barillas</span></h1>
            <a class="navbar-brand" href="#">
                <img src="Logo.png" alt="Bootstrap" width="60" height="45">
            </a>
        </div>
    </nav>
    <ul class="nav justify-content-center custom-navbar">
        <li class="nav-item">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"><span style="font-style: italic;"><strong>Soy tu Menú ¡Ábreme!</strong></span></button>
        </li>
    </ul>
    <style>
        .custom-navbar {background-color: #007bff;} 
        .custom-navbar .nav-link {color: #ffffff;}
        .custom-navbar .nav-link:hover,
        .custom-navbar .nav-link.active {color: black;}
    </style>
    <br>

  <form method="POST" action="{{ url('/procesarFormulario') }}">
    @csrf
    <section>
      
      <input type="hidden" name="id_estudiante" id="id_estudiante">
      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="carnet">Carnet:</label>
        <div class="col-sm-8">
          <input class="form-control" type="text" name="carnet" pattern="E\d{3}" required><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="nombres">Nombres:</label>
        <div class="col-sm-8">
          <input class="form-control" type="text" name="nombres" required><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="apellidos">Apellidos:</label>
        <div class="col-sm-8">
          <input class="form-control" type="text" name="apellidos" required><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="direccion">Dirección:</label>
        <div class="col-sm-8">
          <input class="form-control" type="text" name="direccion"><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="telefono">Teléfono:</label>
        <div class="col-sm-8">
          <input class="form-control" type="text" name="telefono"><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="correo_electronico">Correo Electrónico:</label>
        <div class="col-sm-8">
          <input class="form-control" type="email" name="correo_electronico"><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="id_tipo_sangre">Tipo de Sangre:</label>
        <div class="col-sm-8">
          <select name="tipo_sangre" id="id_tipo_sangre">
            @foreach($tipos as $tipo)
            <option value="{{ $tipo->id_tipo_sangre }}">{{ $tipo->sangre }}</option>
            @endforeach
          </select><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <div class="col-sm-8">
          <input class="form-control" type="date" name="fecha_nacimiento" required><br>
        </div>
      </div>

      <div id="space-for-button">
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="submit" name="create" value="true">Agregar</button>
        </div>
      </div>
    </section>
  </form>
</body>

</html>