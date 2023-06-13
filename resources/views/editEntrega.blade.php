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
    <form action="/entrega/update/{{$entrega->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Cliente</label>
            <input type="text" class="form-control" name="idCliente" placeholder="Cliente..." value="{{$entrega['idCliente']}}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Endereço de partida</label>
            <input type="text" class="form-control" name="enderecoPartida" id="inputEnderecoPartida" placeholder="Rua..." value="{{$entrega['enderecoPartida']}}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Endereço de entrega</label>
            <input type="text" class="form-control" name="enderecoEntrega" placeholder="Rua..." value="{{$entrega['enderecoEntrega']}}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">idMotoqueiro</label>
            <input type="text" class="form-control" name="idMotoqueiro" placeholder="idMotoqueiro..." value="{{$entrega['idMotoqueiro']}}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">OBSERVAÇÕES</label>
            <input type="text" class="form-control" name="obs" id="inputObs" placeholder="..." value="{{$entrega['obs']}}">
        </div>
        <input class="btn btn-primary" type="submit" value="Salvar">
    </form>
</body>
</html> --}}

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <link rel="icon" type="image/x-icon" href="{{ asset('images/logo_V.png') }}" />
        <title>
            Cadastro Pedidos
        </title>
    </head>
    <header>

    </header>
    <body>
        <form id="myForm1" class="row g-3 needs-validation" novalidate>
            <div class="col-md-12">
              <label for="validationCustom04" class="form-label">Cliente:</label>
              {{-- <select class="form-select" id="validationCustom04" required> --}}
                {{-- <option selected disabled value="">Selecione...</option> --}}
                <option>{{$entrega->idCliente}}</option>
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
                cep1 = cep1.replace(/^(\d{5})(\d)/, "$1-$2");
                document.getElementById("cep1").value = cep1;
                }
              </script>
              <div class="invalid-feedback">
                Por favor informe o CEP.
              </div>
            </div>
            <div class="col-md-9">
              <label for="validationCustom05" class="form-label">Rua retirada:</label>
              <input type="text" class="form-control" id="validationCustom05" value="{{$entrega->enderecoPartida}}" required>
              <div class="invalid-feedback">
                Por favor informe a rua.
              </div>
            </div>
            <div class="col-md-9">
              <label for="validationCustom05" class="form-label">Bairro retirada:</label>
              <input type="text" class="form-control" id="validationCustom05" required>
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
                }
              </script>
              <div class="invalid-feedback">
                Por favor informe o CEP.
              </div>
            </div>
            <div class="col-md-9">
              <label for="validationCustom05" class="form-label">Rua entrega:</label>
              <input type="text" class="form-control" id="validationCustom05" value="{{$entrega->enderecoEntrega}}" required>
              <div class="invalid-feedback">
                Por favor informe a rua.
              </div>
            </div>
            <div class="col-md-9">
              <label for="validationCustom05" class="form-label">Bairro entrega:</label>
              <input type="text" class="form-control" id="validationCustom05" required>
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
                <input type="radio" name="option" value="1" onchange="showInput()"> Possui alguma observação?
              </label>
            </div>
            <div id="hidden-input" style="display: none;">
              <div class="col-md-15">
                <label for="validationCustom05" class="form-label">Observações:</label>
                <textarea class="form-control" id="validationTextarea" placeholder="Opcional"> {{$entrega->obs}}</textarea>
              </div>
            </div>
            
            <script>
            function showInput() {
              var option1 = document.querySelector('input[value="1"]');
              var hiddenInput = document.querySelector('#hidden-input');
              
              if (option1.checked) {
                hiddenInput.style.display = 'block';
              } else {
                hiddenInput.style.display = 'none';
              }
            }
            $(document).ready(function() {
            $('#myForm1').on('submit', function(event) {
            if (this.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            $(this).addClass('was-validated');
          });
            });
            </script>
            
          </form>
    </body>
</html>