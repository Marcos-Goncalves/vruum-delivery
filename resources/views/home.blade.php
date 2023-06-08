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
              <a class="nav-link" aria-current="page" href="/home">Dashboard</a>
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
            </li>
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
                Gestores
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/registro">Cadastrar Gestores</a></li>
                <li><a class="dropdown-item" href="/registro/list">Gestores Cadastrados</a></li>
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
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{Session::get('user_name')}}
              </a>
              <ul class="dropdown-menu">
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit">Logout</button>
                </form>
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
          <button id="taskButton" data-bs-toggle="modal" data-bs-target="#modalCriarPedido" class="btn btn-outline-primary btn-block">Criar pedido</button>
        </div>          
        <div class="modal fade" id="modalCriarPedido" tabindex="-1" aria-labelledby="modalCriarPedidoLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <form action="/entrega" method="POST" id="myForm1" class="row g-3 needs-validation" novalidate>
                  @csrf
                  <div class="col-md-12">
                    <label for="validationCustom04" class="form-label">Cliente:</label>
                    <select name="idCliente" class="form-select" id="selectCliente" required>
                      <option selected disabled value="">Selecione...</option>
                      <option>...</option>
                    </select>
                    <div class="invalid-feedback">
                      Por favor selecione um cliente.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">CEP retirada:</label>
                    <input type="text" class="form-control" id="cep1" name="cep" maxlength="9" placeholder="*Opcional" oninput="formatarCEP1()" />
                    <div class="invalid-feedback">
                      Por favor informe o CEP.
                    </div>
                  </div>
                  <div class="col-md-9">
                    <label for="validationCustom05" class="form-label">Rua retirada:</label>
                    <input type="text" class="form-control" name="rua"  id="ruaRetirada" required>
                    <div class="invalid-feedback">
                      Por favor informe a rua.
                    </div>
                  </div>
                  <div class="col-md-9">
                    <label for="validationCustom05" class="form-label">Bairro retirada:</label>
                    <input type="text" class="form-control" name="bairro" id="bairroRetirada" required>
                    <div class="invalid-feedback">
                      Por favor informe o Bairro.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Nº retirada:</label>
                    <input type="text" class="form-control" name="numero" id="validationCustom05" required>
                    <div class="invalid-feedback">
                      Por favor informe o número.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">CEP entrega:</label>
                    <input type="text" class="form-control" name="cepEntrega" id="cep2" maxlength="9" placeholder="*Opcional" oninput="formatarCEP2()"  />
                    <div class="invalid-feedback">
                      Por favor informe o CEP.
                    </div>
                  </div>
                  <div class="col-md-9">
                    <label for="validationCustom05" class="form-label">Rua entrega:</label>
                    <input type="text" class="form-control" name="ruaEntrega" id="ruaEntrega" required>
                    <div class="invalid-feedback">
                      Por favor informe a rua.
                    </div>
                  </div>
                  <div class="col-md-9">
                    <label for="validationCustom05" class="form-label">Bairro entrega:</label>
                    <input type="text" class="form-control" name="bairroEntrega" id="bairroEntrega" required>
                    <div class="invalid-feedback">
                      Por favor informe o bairro.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Nº entrega:</label>
                    <input type="text" class="form-control" name="numeroEntrega" id="validationCustom05" required />
                    <div class="invalid-feedback">
                      Por favor informe o número.
                    </div>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" onchange="toggleObservations()">
                    <label class="form-check-label" for="flexSwitchCheckDefault" id="switchLabel">Possui alguma observação? Não</label>
                  </div>

                  <div id="hidden-input" style="display: none;">
                    <div class="col-md-15">
                      <label for="validationCustom05" class="form-label">Observações:</label>
                      <textarea class="form-control" name="obs" id="validationTextarea" placeholder="Opcional"></textarea>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button id="submitFormButton" type="button" class="btn btn-primary" submit>Criar pedido</button>
              </div>
            </div>
          </div>
        </div>
          @foreach($data as $entrega)
            @if($entrega->status == "DISPONÍVEL")
              <div class="task btn-outline-info" data-id="{{$entrega->id}}" data-bs-toggle="modal" data-bs-target="#modalPedido">
                <tr>
                  {{-- <div class="task btn-outline-info" id="task1" onclick="selecionarMotociclista('{{route('entrega.edit', ['id'=>$entrega->id])}}')"> --}}
                  <span>Pedido {{$entrega->id}}</span>
                {{-- </div> --}}
                </tr>
              </div>
            @endif
          @endforeach
        <div class="modal fade" id="modalPedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <form action="{{ route('entrega.edit', ['id' => $entrega->id]) }}" method="POST" id="myForm2" class="row g-3 needs-validation" novalidate>
                  @csrf
                  @method('PUT')
                  <div class="col-md-15">
                    <label for="validationCustom04" class="form-label">Motociclistas disponíveis</label>
                    <select name="idMotoqueiro" class="form-select" id="selectMotoqueiro" required>
                      <option selected disabled value="">Selecione...</option>
                      <option>...</option>
                    </select>
                    <div class="invalid-feedback">
                      Por favor selecione um motociclista.
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="validationCustom04" class="form-label">Cliente:</label>
                    <label id="idCliente"></label>
                    <div class="invalid-feedback">
                      Por favor selecione um cliente.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">CEP retirada:</label>
                    <input type="text" class="form-control" name="cep" id="cep" maxlength="9" placeholder="*Opcional" oninput="formatarCEP1()" />
                    <div class="invalid-feedback">
                      Por favor informe o CEP.
                    </div>
                  </div>
                  <div class="col-md-9">
                    <label for="validationCustom05" class="form-label">Rua retirada:</label>
                    <input type="text" class="form-control" name="rua" id="rua" required>
                    <div class="invalid-feedback">
                      Por favor informe a rua.
                    </div>
                  </div>
                  <div class="col-md-9">
                    <label for="validationCustom05" class="form-label">Bairro retirada:</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" required>
                    <div class="invalid-feedback">
                      Por favor informe o Bairro.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Nº retirada:</label>
                    <input type="text" class="form-control" name="numero" id="numero" required>
                    <div class="invalid-feedback">
                      Por favor informe o número.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">CEP entrega:</label>
                    <input type="text" class="form-control" name="cepEntrega" id="cepEntrega" maxlength="9" placeholder="*Opcional" oninput="formatarCEP2()"  />
                    <div class="invalid-feedback">
                      Por favor informe o CEP.
                    </div>
                  </div>
                  <div class="col-md-9">
                    <label for="validationCustom05" class="form-label">Rua entrega:</label>
                    <input type="text" class="form-control" name="ruaEntrega" id="ruaEntrega" required>
                    <div class="invalid-feedback">
                      Por favor informe a rua.
                    </div>
                  </div>
                  <div class="col-md-9">
                    <label for="validationCustom05" class="form-label">Bairro entrega:</label>
                    <input type="text" class="form-control" name="bairroEntrega" id="bairroEntrega" required>
                    <div class="invalid-feedback">
                      Por favor informe o bairro.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Nº entrega:</label>
                    <input type="text" class="form-control" name="numeroEntrega" id="numeroEntrega" required />
                    <div class="invalid-feedback">
                      Por favor informe o número.
                    </div>
                  </div>           
                  <div id="observations">
                    <div class="col-md-15">
                      <label for="validationCustom05" class="form-label">Observações:</label>
                      <textarea class="form-control" name="obs" id="obs"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="submitFormButton" type="submit" class="btn btn-primary" submit>Atualizar Pedido</button>
                  </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>       
    <div class="card bg-transparent border-danger mb-3" style="margin-right: 30px; border-width: 4px;">
      <div class="card-header bg-transparent border-danger" style="font-weight: bold; color: white;">Pedidos em entrega</div>
      <div class="card-body text-danger" id="inprogress" style="display: flex; flex-direction: column; justify-content: start; width: 250px;">
        @foreach($data as $entrega)
            @if($entrega->status == "EM ANDAMENTO")
              <div class="task btn-outline-info" data-id="{{$entrega->id}}" data-bs-toggle="modal" data-bs-target="#modalPedido">
                <tr>
                  {{-- <div class="task btn-outline-info" id="task1" onclick="selecionarMotociclista('{{route('entrega.edit', ['id'=>$entrega->id])}}')"> --}}
                  <span>Pedido {{$entrega->id}}</span>
                {{-- </div> --}}
                </tr>
              </div>
            @endif
          @endforeach
      </div>
    </div>
    <div class="card bg-transparent border-success mb-3" style="border-width: 4px;">
      <div class="card-header bg-transparent border-success" style="font-weight: bold; color: white;">Pedidos entregues</div>
      <div class="card-body text-success" id="done" style="display: flex; flex-direction: column; justify-content: start; width: 250px;">
        @foreach($data as $entrega)
            @if($entrega->status == "CONCLUÍDO")
              <div class="task btn-outline-info" data-id="{{$entrega->id}}" data-bs-toggle="modal" data-bs-target="#modalPedido">
                <tr>
                  {{-- <div class="task btn-outline-info" id="task1" onclick="selecionarMotociclista('{{route('entrega.edit', ['id'=>$entrega->id])}}')"> --}}
                  <span>Pedido {{$entrega->id}}</span>
                {{-- </div> --}}
                </tr>
              </div>
            @endif
          @endforeach
      </div>
    </div>
  </div>
  <script>
    const switchInput = document.getElementById("flexSwitchCheckDefault");
    const switchLabel = document.getElementById("switchLabel");

    switchInput.addEventListener("change", function () {
      if (switchInput.checked) {
        switchLabel.textContent = "Possui alguma observação? Sim";
      } else {
        switchLabel.textContent = "Possui alguma observação? Não";
      }
    });
  </script>
  <script>
    function toggleObservations() {
      var x = document.getElementById("hidden-input");
      if (x.style.display === "none") {
        x.style.display = "block";
       } else {
         x.style.display = "none";
       }
    }
  </script>
  <script>
    function formatarCEP1() {
      var cep1 = document.getElementById("cep1").value;
      cep1 = cep1.replace(/\D/g, "");
      cep1 = cep1.replace(/^(\d{5})(\d)/, "$1-$2");
      document.getElementById("cep1").value = cep1;

      if (cep1.length === 9) {
        buscarEndereco1(cep1, "retirada");
      }
    }
  </script>
  <script>
    function formatarCEP2() {
      var cep2 = document.getElementById("cep2").value;
      cep2 = cep2.replace(/\D/g, "");
      cep2 = cep2.replace(/^(\d{5})(\d)/, "$1-$2");
      document.getElementById("cep2").value = cep2;

      if (cep2.length === 9) {
        buscarEndereco2(cep2, "retirada");
      }
    }
  </script>
<script>
  $(document).ready(function () {
    $('#myForm1').on('submit', function (event) {
      if (this.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      $(this).addClass('was-validated');
    });

    $('#submitFormButton').on('click', function () {
      $('#myForm1').submit();
    });
  });
</script>
  <script>
    function buscarEndereco1(cep, tipo) {
      $.ajax({
        url: `https://viacep.com.br/ws/${cep}/json/`,
        type: "GET",
        dataType: "jsonp",
        success: function (data) {
          if (!data.erro) {
            if (tipo === "retirada") {
              document.getElementById("ruaRetirada").value = data.logradouro;
              document.getElementById("bairroRetirada").value = data.bairro;
            }
          }
        }
      });
    }
    function buscarEndereco2(cep, tipo) {
      $.ajax({
        url: `https://viacep.com.br/ws/${cep}/json/`,
        type: "GET",
        dataType: "jsonp",
        success: function (data) {
          if (!data.erro) {
            if (tipo === "retirada") {
              document.getElementById("ruaEntrega").value = data.logradouro;
              document.getElementById("bairroEntrega").value = data.bairro;
            }
          }
        }
      });
    }
  </script>

  {{-- Trazendo os dados dos clientes para o combobox --}}
  <script>
    var selectCliente = document.getElementById('selectCliente');
    var isDataLoaded = false;

    function loadData() {
        if (!isDataLoaded) {
            $.ajax({
                url: '/cliente/read',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    var clientes = data;

                    // Limpa o combobox
                    selectCliente.innerHTML = '';

                    // Preenche o combobox com os dados dos clientes
                    clientes.forEach(function (cliente) {
                        var option = document.createElement('option');
                        option.value = cliente.id;
                        option.text = cliente.nome;
                        selectCliente.appendChild(option);
                    });

                    isDataLoaded = true;
                },
                error: function (error) {
                    console.error(error);
                }
            });
        }
    }

    selectCliente.addEventListener('focus', loadData);
    selectCliente.addEventListener('click', loadData);
</script>

{{-- Carregando os dados da entrega para edição --}}
<script>
  $(document).ready(function() {
      $('#modalPedido').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget);
          var id = button.data('id');
          var modal = $(this);

          $.ajax({
              url: 'entrega/edit/' + id,
              method: 'GET',
              success: function(response) {
                  // Atualiza a action do formulário com o ID da entrega
                  $('#myForm2').attr('action', '/entrega/update/' + id);
                  // Atualiza os inputs com os dados da entrega
                  modal.find('#idCliente').text(response.idCliente);
                  modal.find('#cep').val(response.cep);
                  modal.find('#rua').val(response.rua);
                  modal.find('#bairro').val(response.bairro);
                  modal.find('#numero').val(response.numero);
                  modal.find('#cepEntrega').val(response.cepEntrega);
                  modal.find('#ruaEntrega').val(response.ruaEntrega);
                  modal.find('#bairroEntrega').val(response.bairroEntrega);
                  modal.find('#numeroEntrega').val(response.numeroEntrega);
                  modal.find('#obs').val(response.obs);
              },
              error: function(xhr, status, error) {
                  console.log(error);
              }
          });
      });
  });
</script>

{{-- Trazendo os motoqueiros disponiveis para o combobox--}}
<script>
  var selectMotoqueiro = document.getElementById('selectMotoqueiro');
  var isDataLoadedMotoqueiro = false;

  function loadDataMotoqueiro() {
      if (!isDataLoadedMotoqueiro) {
          $.ajax({
              url: '/motoqueiro/read',
              method: 'GET',
              dataType: 'json',
              success: function (data) {
                  var motoqueiros = data;

                  // Ordena os motoqueiros de acordo com o campo "fila_ordem"
                  motoqueiros.sort(function(a, b) {
                      return a.fila_ordem - b.fila_ordem;
                  });

                  // Limpa o combobox
                  selectMotoqueiro.innerHTML = '';

                  // Preenche o combobox com os dados dos motoqueiros
                  motoqueiros.forEach(function (motoqueiro) {
                      var option = document.createElement('option');
                      option.value = motoqueiro.id;
                      option.text = motoqueiro.nome + ' - ' + motoqueiro.fila_ordem + 'º';
                      selectMotoqueiro.appendChild(option);
                  });

                  isDataLoadedMotoqueiro = true;
              },
              error: function (error) {
                  console.error(error);
              }
          });
      }
  }

  selectMotoqueiro.addEventListener('focus', loadDataMotoqueiro);
  selectMotoqueiro.addEventListener('click', loadDataMotoqueiro);
</script>

{{-- <script>
  $(document).ready(function() {
      $('#modalPedido').on('show.bs.modal', function() {

          // Obtém o id da div "inprogress"
          var inprogressId = $('#inprogress').attr('id');

          // Verifica se o valor é "EM ANDAMENTO"
          if (inprogressId === 'inprogress') {
              // Bloqueia os campos da modal
              $('.form-control').prop('disabled', true);
          } else {
              // Desbloqueia os campos da modal
              $('#modalForm input').prop('disabled', false);
          }
      });
  });
</script> --}}

</body>
</html>