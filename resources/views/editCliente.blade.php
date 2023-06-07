{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <form action="/cliente/update/{{$cliente->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome..." value="{{$cliente['nome']}}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Telefone</label>
            <input type="text" class="form-control" name="telefone" placeholder="Telefone..." value="{{$cliente['telefone']}}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Avaliação</label>
            <input type="text" class="form-control" name="avaliacao" placeholder="Avaliação..." value="{{$cliente['avaliacao']}}">
        </div>
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
</body>
</html> --}}

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="logo_V.png" />
  <title>
    Vruum Delivery - Clientes
  </title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" media="screen" />
</head>
<header>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark" id="teste">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img id="icLogo" src="logo_25.png">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/home">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Clientes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/cliente">Cadastrar Cliente</a></li>
                <li><a class="dropdown-item" href="/cliente/list">Clientes cadastrados</a></li>
              </ul>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Motociclistas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/motoqueiro">Cadastrar Motociclistas</a></li>
                <li><a class="dropdown-item" href="/motoqueiro/list">Motociclistas Cadastrados</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Entregas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/entrega/list">Entregas realizadas</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <body>
    <div class="card" style="width: 25%;
      height: auto;
      border-radius: 30px;
      background: linear-gradient(145deg, #3c3658, #3c3658);
      box-shadow: 1px 1px 20px #000, -1px -1px 10px #000;
      margin: auto;
      margin-top: 130px;">
      <div class="card-head" style="margin: auto;">
        <div class="textCadCliente" style="margin: auto;color: white;">
          <p class="text-start" id="logintxt">
          <h6>Atualizar Clientes</h6>
          </p>
        </div>
      </div>
      <div class="card-body">
        <form action="/cliente/update/{{$cliente->id}}" method="POST">
            @csrf
            @method("PUT")
          <div class="col-md-6" style="margin: auto;">
            <label for="inputNameCliente" class="form-label"
              style="color: white;display: flex;justify-content: center;">Nome:</label>
            <input type="text" class="form-control" id="inputUser" maxlength="100" name="nome" value="{{$cliente->nome}}">
          </div>
          <div class="col-md-6" style="margin: auto;">
            <label for="inputTelefoneCliente" class="form-label"
              style="color: white;display: flex;justify-content: center;">Telefone:</label>
            <input type="text" id="telefoneCliente" class="form-control" name="telefone" value="{{$cliente->telefone}}">
          </div>
          <div class="btnEntrar" style="margin-top: 10px;">
            <button type="submit" value="submit" class="btn btn-outline-primary">Atualizar</button>
          </div>
        </form>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#telefoneCliente').mask('(00) 00000-0000'); // Aplica a máscara ao campo de telefone
      });
    </script>
  </body>

</html>