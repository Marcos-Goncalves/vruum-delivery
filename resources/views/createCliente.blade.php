<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
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
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="gestorindex.html">Dashboard</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Clientes
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Cadastrar Cliente</a></li>
                      <li><a class="dropdown-item" href="#">Clientes cadastrados</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Avaliações Clientes</a></li>
                      <li><a class="dropdown-item" href="#">Pagamento Entregas</a></li>
                    </ul>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Motociclistas
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Cadastrar Motociclistas</a></li>
                      <li><a class="dropdown-item" href="#">Motociclistas Cadastrados</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Avaliações Motociclistas</a></li>
                      <li><a class="dropdown-item" href="#">Pagamento Motociclistas</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Entregas
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Cadastrar pedido</a></li>
                      <li><a class="dropdown-item" href="#">Entregas realizadas</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>
    <body class="body">
      <form action="/cliente" method="POST">
        @csrf
        <div class="boxClientes">
            <div class="textTitulo">
                <p class="text-start" id="logintxt"><h4>Clientes</h4></p>
            <br>
                <img id="icLogo" src="logo_25.png">
            </div>
            <div class="textDados">
                <h5>Nome:</h5>
            </div>
            <div>
                <input class="inputDados" type="text" name="nome" />
            </div>
            <div class="textDados">
                <h5>Telefone:</h5>
            </div>
            <div>
                <input class="inputDados" type="text" name="telefone"/>
            </div>
            <div>
                <input class="inputDados" type="text" name="avaliacao">
            </div>
            <div class="btnEnviar" align="right">
                <button type="submit" value="submit" class="btn btn-outline-primary">Cadastrar</button>
            </div> 
        </div>    
      </form>
    </body>
</html>