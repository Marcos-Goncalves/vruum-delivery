<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="logo_V.png" href="{{ asset('css/styles.css') }}"/>
  <title>
    Cadastro Pedidos
  </title>
</head>
<header>

</header>

<body>
  <form action="/entrega" method="POST" id="myForm1" class="row g-3 needs-validation" novalidate>
    @csrf
    <div class="col-md-12">
      <label for="validationCustom04" class="form-label">Cliente:</label>
      <select class="form-select" id="selectCliente" required>
        <option selected disabled value="">Selecione...</option>
        <option>...</option>
      </select>
      <div class="invalid-feedback">
        Por favor selecione um cliente.
      </div>
    </div>
    <div class="col-md-3">
      <label for="validationCustom05" class="form-label">CEP retirada:</label>
      <input type="text" class="form-control" id="cep1" maxlength="9" oninput="formatarCEP1()" / required>

      <script>
        function formatarCEP1() {
          var cep1 = document.getElementById("cep1").value;
          cep1 = cep1.replace(/\D/g, "");
          cep1 = cep1.replace(/^(\d{5})(\d)/, "$1-$2");<form action="/entrega" method="POST" id="myForm1" class="row g-3 needs-validation" novalidate>
    @csrf
          document.getElementById("cep1").value = cep1;

          if (cep1.length === 9) {
            buscarEndereco1(cep1, "retirada");
          }
        }
      </script>
      <div class="invalid-feedback">
        Por favor informe o CEP.
      </div>
    </div>
    <div class="col-md-9">
      <label for="validationCustom05" class="form-label">Rua retirada:</label>
      <input type="text" class="form-control" id="ruaRetirada" required>
      <div class="invalid-feedback">
        Por favor informe a rua.
      </div>
    </div>
    <div class="col-md-9">
      <label for="validationCustom05" class="form-label">Bairro retirada:</label>
      <input type="text" class="form-control" id="bairroRetirada" required>
      <div class="invalid-feedback">
        Por favor informe o Bairro.
      </div>
    </div>
    <div class="col-md-3">
      <label for="validationCustom05" class="form-label">Nº retirada:</label>
      <input type="text" class="form-control" id="validationCustom05" required>
      <div class="invalid-feedback">
        Por favor informe o número.
      </div>
    </div>
    <div class="col-md-3">
      <label for="validationCustom05" class="form-label">CEP entrega:</label>
      <input type="text" class="form-control" id="cep2" maxlength="9" oninput="formatarCEP2()" / required>

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
      <div class="invalid-feedback">
        Por favor informe o CEP.
      </div>
    </div>
    <div class="col-md-9">
      <label for="validationCustom05" class="form-label">Rua entrega:</label>
      <input type="text" class="form-control" id="ruaEntrega" required>
      <div class="invalid-feedback">
        Por favor informe a rua.
      </div>
    </div>
    <div class="col-md-9">
      <label for="validationCustom05" class="form-label">Bairro entrega:</label>
      <input type="text" class="form-control" id="bairroEntrega" required>
      <div class="invalid-feedback">
        Por favor informe o bairro.
      </div>
    </div>
    <div class="col-md-3">
      <label for="validationCustom05" class="form-label">Nº entrega:</label>
      <input type="text" class="form-control" id="validationCustom05" required>
      <div class="invalid-feedback">
        Por favor informe o número.
      </div>
    </div>
    <div>
      <label>
        <input type="radio" name="option" value="1" data-target="#hidden-input" onclick="toggleObservations()"> Possui alguma observação?
      </label>
    </div>
    <div id="hidden-input" style="display: none;">
      <div class="col-md-15">
        <label for="validationCustom05" class="form-label">Observações:</label>
        <textarea class="form-control" id="validationTextarea" placeholder="Opcional"></textarea>
      </div>
    </div>

    <script>
      function toggleObservations() {
        var option1 = document.querySelector('input[value="1"]');
        var target = option1.getAttribute('data-target');
        var hiddenInput = document.querySelector(target);

        if (option1.checked) {
          hiddenInput.style.display = 'block';
        } else {
          hiddenInput.style.display = 'none';
        }
      }

      // Chamar a função ao abrir a modal
      var modal = document.getElementById('modal-pedido'); // Substitua 'sua-modal-id' pelo ID real da sua modal

      modal.addEventListener('shown.bs.modal', function () {
        toggleObservations();
      });

      $(document).ready(function () {
        $('#myForm1').on('submit', function (event) {
          if (this.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          $(this).addClass('was-validated');
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
    
  </form>
</body>

</html>