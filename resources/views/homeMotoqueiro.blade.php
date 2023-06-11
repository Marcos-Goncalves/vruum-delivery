<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="logo_V.png" />
  <title>Vruum Delivery - Motociclista</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" media="screen" />
</head>
<header></header>

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
  <div class="card bg-transparent w-50" style="margin: auto; margin-top: 50px">
    <div id="boxMotociclista" class="card-body">
      <div class="headerBox" style="display: flex">
        <div class="imgLogo" style="margin-right: auto">
          <img id="icLogoVruum" src="logo_50.png" alt="Logo Vruum" />
        </div>
        <form id="status-form" action="/motoqueiro/{{Session::get('user_id')}}/status" method="POST">
            @csrf
            @method('PUT')
            <div class="btn-group-vertical" role="group" aria-label="Vertical radio toggle button group">
              <input type="radio" class="btn-check" name="status" id="vbtn-radio1" value="OFFLINE" autocomplete="off" {{ Session::get('user_status') === 'OFFLINE' ? 'checked' : '' }}/>
              <label class="btn btn-outline-info btn-xs" for="vbtn-radio1">Off-line</label>
              <input type="radio" class="btn-check" name="status" id="vbtn-radio2" value="ONLINE" autocomplete="off" {{ Session::get('user_status') === 'ONLINE' ? 'checked' : '' }}/>
              <label class="btn btn-outline-info btn-xs" for="vbtn-radio2">Online</label>
              <input type="hidden" name="status" id="status-input" value="{{ Session::get('user_status') }}">
            </div>
        </form>
      </div>
      <div class="container text-center">
        <div class="row row-cols-2" id="pedidos" style="color: white">
          <div class="col" style="font-weight: bold">Nº Pedido:</div>
          <div class="col">{{$entregas->id}}</div>
        </div>
        <div class="row row-cols-2" id="cliente" style="color: white">
          <div class="col">Cliente:</div>
          <div class="col">{{$entregas->idCliente}}</div>
        </div>
        <div class="row row-cols-1" id="retiradaTitle">
          <div class="col"><i class="fa fa-map-marker" aria-hidden="true" style="margin-right: 5px;"></i><a
              style="color: white; font-weight: bold">Endereço de retirada:</a></div>
        </div>
        <div class="row row-cols-4" id="retirada1" style="color: white">
          <div class="col">CEP:</div>
          <div class="col">Rua:</div>
          <div class="col">Bairro:</div>
          <div class="col">Número:</div>
        </div>
        <div class="row row-cols-4" id="retirada2" style="color: white">
          <div class="col">{{$entregas->cep}}</div>
          <div class="col">{{$entregas->rua}}</div>
          <div class="col">{{$entregas->bairro}}</div>
          <div class="col">{{$entregas->numero}}</div>
        </div>
        <div class="row row-cols-1" id="entregaTitle">
          <div class="col"><i class="fa fa-map-marker" aria-hidden="true" style="margin-right: 5px;"></i><a
              style="color: white; font-weight: bold">Endereço de entrega:</a></div>
        </div>
        <div class="row row-cols-4" id="entrega1" style="color: white">
          <div class="col">CEP:</div>
          <div class="col">Rua:</div>
          <div class="col">Bairro:</div>
          <div class="col">Número:</div>
        </div>
        <div class="row row-cols-4" id="entrega2" style="color: white">
          <div class="col">{{$entregas->cepEntrega}}</div>
          <div class="col">{{$entregas->ruaEntrega}}</div>
          <div class="col">{{$entregas->bairroEntrega}}</div>
          <div class="col">{{$entregas->numeroEntrega}}</div>
        </div>
      </div>
      <div class="btFinalizaEntrega" style="display: flex; justify-content: center; margin-top: 20px">
        <button id="finalizaEntrega" data-bs-toggle="modal" data-bs-target="#modalFinalizaEntrega"
          class="btn btn-outline-primary btn-block">
          Finalizar entrega
        </button>
      </div>
      <div class="modal fade" id="modalFinalizaEntrega" tabindex="-1" aria-labelledby="modalFinalizaEntregaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <form action="/home/motociclista/finalizar/{{$entregas->id}}" method="POST" id="myForm2" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="col-md-12">
                  <a>Avaliação do cliente</a>
                  <div class="ratingCliente">
                    <a>1</a>
                    <input class="fas fa-star" type="radio" id="star1-cliente" name="ratingCliente" value="1"
                      style="display: none" required />
                    <label for="star1-cliente" class="star-label"><i class="fas fa-star"></i></label>
                    <a>2</a>
                    <input class="fas fa-star" type="radio" id="star2-cliente" name="ratingCliente" value="2"
                      style="display: none" required />
                    <label for="star2-cliente" class="star-label"><i class="fas fa-star"></i></label>
                    <a>3</a>
                    <input class="fas fa-star" type="radio" id="star3-cliente" name="ratingCliente" value="3"
                      style="display: none" required />
                    <label for="star3-cliente" class="star-label"><i class="fas fa-star"></i></label>
                    <a>4</a>
                    <input class="fas fa-star" type="radio" id="star4-cliente" name="ratingCliente" value="4"
                      style="display: none" required />
                    <label for="star4-cliente" class="star-label"><i class="fas fa-star"></i></label>
                    <a>5</a>
                    <input class="fas fa-star" type="radio" id="star5-cliente" name="ratingCliente" value="5"
                      style="display: none" required />
                    <label for="star5-cliente" class="star-label"><i class="fas fa-star"></i></label>
                  </div>
                </div>
              </form>
              <div>
                <a>Deseja realmente finalizar a entrega?</a>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" />
                  <label class="form-check-label" for="flexSwitchCheckDefault" id="switchLabel">Não</label>
                  <div class="invalid-feedback">Para finalizar selecione sim!</div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button id="submitFormButton" type="button" class="btn btn-primary" submit>Confirmar</button>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function () {
          $('#myForm1, #myForm2').on('submit', function (event) {
            if (this.checkValidity() === false || !isSwitchSelected()) {
              event.preventDefault();
              event.stopPropagation();
              showValidationMessage();
            }
            $(this).addClass('was-validated');
          });

          $('#submitFormButton').on('click', function () {
            if ($('#myForm1')[0].checkValidity() && $('#myForm2')[0].checkValidity() && isSwitchSelected()) {
              $('#myForm1, #myForm2').submit();
            } else {
              showValidationMessage();
            }
          });

          const switchInput = document.getElementById("flexSwitchCheckDefault");
          const switchLabel = document.getElementById("switchLabel");

          switchInput.addEventListener("change", function () {
            if (switchInput.checked) {
              switchLabel.textContent = "Sim";
            } else {
              switchLabel.textContent = "Não";
            }
          });

          function isSwitchSelected() {
            return switchInput.checked;
          }

          function showValidationMessage() {
            alert("Por favor, preencha as avaliações e selecione 'Sim' para confirmar a finalização da entrega!");
          }
        });
      </script>



      <script>
        $(document).ready(function () {
          $(".btn-group-vertical .btn").click(function () {
            var radioId = $(this).prev().attr("id");
            $(".btn-group-vertical .btn").removeClass(
              "btn-danger btn-warning btn-success"
            );
            $(".btn-group-vertical .btn").addClass("btn-outline-info");

            if (radioId === "vbtn-radio1") {
              $(this).removeClass("btn-outline-info");
              $(this).addClass("btn-danger");
            } else if (radioId === "vbtn-radio2") {
              $(this).removeClass("btn-outline-info");
              $(this).addClass("btn-success");
            }
          });
        });
      </script>
      <script>
        $(document).ready(function () {
          $(".ratingEntrega input[type='radio']").change(function () {
            var radioId = $(this).attr("id");
            $(this).parent().addClass("selected");
            $(this).parent().siblings().removeClass("selected");

            var numStars = parseInt($(this).val());
            $(this).siblings("label").css("color", "black"); // Reseta a cor de todas as estrelas
            $(this).siblings("label").slice(0, numStars).css("color", "gold"); // Define a cor dourada para as estrelas selecionadas
          });
        });
      </script>
      <script>
        $(document).ready(function () {
          $(".ratingCliente input[type='radio']").change(function () {
            var radioId = $(this).attr("id");
            $(this).parent().addClass("selected");
            $(this).parent().siblings().removeClass("selected");

            var numStars = parseInt($(this).val());
            $(this).siblings("label").css("color", "black"); // Reseta a cor de todas as estrelas
            $(this).siblings("label").slice(0, numStars).css("color", "gold"); // Define a cor dourada para as estrelas selecionadas
          });
        });
      </script>

        <script>
            var form = document.getElementById('status-form');
            var radios = document.querySelectorAll('input[name="status"]');
            
            radios.forEach(function(radio) {
              radio.addEventListener('change', function() {
                var selectedValue = document.querySelector('input[name="status"]:checked').value;
                var inputHidden = document.createElement('input');
                inputHidden.setAttribute('type', 'hidden');
                inputHidden.setAttribute('name', 'status');
                inputHidden.setAttribute('value', selectedValue);
                form.appendChild(inputHidden);
                form.submit();
              });
            });
        </script>

        <script>

            document.addEventListener("DOMContentLoaded", function () {
              // Obtenha os elementos relevantes do formulário e do modal
              var form = document.getElementById("myForm2");
              var checkbox = document.getElementById("flexSwitchCheckDefault");
              var submitButton = document.getElementById("submitFormButton");
            
              // Defina o evento de clique do botão de envio
              submitButton.addEventListener("click", function () {
                // Verifique se o checkbox está marcado e se algum dos campos de avaliação do cliente está selecionado
                var isChecked = checkbox.checked;
                var ratingInputs = form.elements["ratingCliente"];
                var isRatingSelected = false;
                for (var i = 0; i < ratingInputs.length; i++) {
                  if (ratingInputs[i].checked) {
                    isRatingSelected = true;
                    break;
                  }
                }
            
                // Verifique se todas as condições são atendidas
                if (isChecked && isRatingSelected) {
                  // Envie o formulário
                  form.submit();
                } else {
                  // Exiba uma mensagem de erro ou tome outra ação apropriada
                  alert("Por favor, selecione a avaliação e marque o checkbox para finalizar a entrega.");
                }
              });
            });

        </script>
    </div>
  </div>
</body>

</html>