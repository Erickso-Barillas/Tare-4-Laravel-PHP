<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Pagina PHP</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <section>
    <div class="d-flex align-items-center justify-content-center vh-100 bg-primary">
      <h1 class="display-1 fw-bold text-white">404</h1>
    </div>
    @if(isset($error))
    <div class="container mt-4">
      <div class="alert alert-danger">
        {{ $error }}
      </div>
    </div>
    @endif
  </section>
</body>
</html>