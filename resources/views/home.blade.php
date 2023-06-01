<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="logo_V.png" />
  <title>Vruum Delivery - Gestor</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" media="screen" />
  <link rel="stylesheet" href="./kanban.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg custom-navbar" id="teste">
      <div class="container-fluid">
        <a class="navbar-brand">
          <img class="icLogoVruum" src="logo_25.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="gestorindex.html">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Clientes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="cadastroClientes.html">Cadastrar Cliente</a></li>
                <li><a class="dropdown-item" href="#">Clientes cadastrados</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Avaliações Clientes</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Motociclistas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="cadastroMotociclistas.html">Cadastrar Motociclistas</a></li>
                <li><a class="dropdown-item" href="#">Motociclistas Cadastrados</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Avaliações Motociclistas</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Gestores
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="cadastroUsuarios.html">Cadastrar Gestores</a></li>
                <li><a class="dropdown-item" href="#">Gestores Cadastrados</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Entregas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Entregas realizadas</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </header>
  <div class="kanban-heading">
    <strong class="kanban-heading-text">Dashboard pedidos</strong>
  </div>
  <div class="container" style="display: flex; flex-direction: row; justify-content: center;">
    <div class="card bg-transparent border-primary mb-3" style="margin-right: 30px; border-width: 4px;">
      <div class="card-header bg-transparent border-primary" style="font-weight: bold; color: white;">Fila de pedidos</div>
      <div class="card-body" id="todo" style="display: flex; flex-direction: column; justify-content: start; width: 250px; height: 400px;">
        <div class="task-button-block">
          <button id="taskButton" onclick="confirmarCadastroPedido()" class="btn btn-outline-primary btn-block">Criar pedido</button>
        </div>
          @foreach($data as $entrega)
            @if($entrega->status == "DISPONÍVEL")
                <tr>
                  <div class="task btn-outline-info" id="task1" onclick="selecionarMotociclista('{{route('entrega.edit', ['id'=>$entrega->id])}}')">
                  <span>Pedido {{$entrega->id}}</span>
                </div>
                </tr>
            @endif
          @endforeach
      </div>
    </div>       
    <div class="card bg-transparent border-danger mb-3" style="margin-right: 30px; border-width: 4px;">
      <div class="card-header bg-transparent border-danger" style="font-weight: bold; color: white;">Pedidos em entrega</div>
      <div class="card-body text-danger" id="inprogress" style="display: flex; flex-direction: column; justify-content: start; width: 250px;">
        @foreach($data as $entrega)
          @if($entrega->status == "EM PROGRESSO")
                <tr>
                  <div class="task btn-outline-info" id="task1" onclick="selecionarMotociclista('{{route('entrega.edit', ['id'=>$entrega->id])}}')">
                  <span>Pedido {{$entrega->id}}</span>
                </div>
                </tr>
          @endif
        @endforeach
        
      </div>
    </div>
    <div class="card bg-transparent border-success mb-3" style="border-width: 4px;">
      <div class="card-header bg-transparent border-success" style="font-weight: bold; color: white;">Pedidos entregues</div>
      <div class="card-body text-success" id="done" style="display: flex; flex-direction: column; justify-content: start; width: 250px;">
      </div>
    </div>
  </div>
  


  <script>
    function confirmarCadastroPedido() {
      $.get('{{ route('entrega') }}', function (data) {
        var $content = $('<div></div>').append(data);
        var $modal = $('<div class="modal"></div>');
        var $modalDialog = $('<div class="modal-dialog"></div>');
        var $modalContent = $('<div class="modal-content"></div>');
        var $modalBody = $('<div class="modal-body"></div>').append($content);
        var $modalFooter = $('<div class="modal-footer"></div>');

        var $cancelButton = $('<button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>');
        var $confirmButton = $('<button class="btn btn-primary">Confirmar</button>');

        $confirmButton.on('click', function () {
          $('#myForm1').submit();
        });
        $modalFooter.append($cancelButton);
        $modalFooter.append($confirmButton);

        $modalContent.append($modalBody);
        $modalContent.append($modalFooter);

        $modalDialog.append($modalContent);
        $modal.append($modalDialog);
        $('body').append($modal);

        $modal.modal('show');
      });
    }

    function selecionarMotociclista(pedidoURL) {
      var $modal = $('<div class="modal"></div>');
      var $modalDialog = $('<div class="modal-dialog"></div>');
      var $modalContent = $('<div class="modal-content"></div>');
      var $modalBody = $('<div class="modal-body"></div>').load(pedidoURL);
      var $modalFooter = $('<div class="modal-footer"></div>');

      var $cancelButton = $('<button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>');
      var $confirmButton = $('<button class="btn btn-primary">Confirmar</button>');

      $confirmButton.on('click', function () {
        $('#myForm2').submit();
      });

      $modalFooter.append($cancelButton);
      $modalFooter.append($confirmButton);

      $modalContent.append($modalBody);
      $modalContent.append($modalFooter);

      $modalDialog.append($modalContent);
      $modal.append($modalDialog);
      $('body').append($modal);

      $modal.modal('show');
    }
  </script>
</body>
</html>