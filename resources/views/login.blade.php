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
    <form action="/login" method="POST">

        @csrf

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Telefone</label>
            <input type="text" class="form-control" name="telefone" placeholder="Telefone...">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha...">
        </div>

        <button class="btn btn-primary" type="submit">Login</button>
        <br>
            @if($errors->has('message'))
                <div class="alert alert-danger">
                    {{ $errors->first('message') }}
                </div>
            @endif
        
    </form>
    
</body>
</html> --}}

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <link rel="icon" type="image/x-icon" href="{{ asset('images/logo_V.png') }}" />
        <title>
            Vruum Delivery - Login
        </title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" media="screen" />
    </head>
    <header>

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
                <div class="textLogin" style="margin: auto; margin-top: 10px;">
                    <p class="text-start" id="logintxt"><h6>Login</h6></p>
                </div>
                <div>
                    <img id="icLogo" src="{{ asset('images/logo_25.png') }}" style="margin-left: 15px;">
                </div>
            </div>
            <div class="card-body">
                <form action="/login" method="POST">
                    @csrf
                    <div class="col-md-6" style="margin: auto;">
                        <label for="inputUser" class="form-label" style="color: white;display: flex;justify-content: center;">Usuário:</label>
                        <input type="text" class="form-control" id="inputUser" name="telefone" maxlength="100">
                      </div>
                      <div class="col-md-6" style="margin: auto;">
                        <label for="inputSenha" class="form-label" style="color: white;display: flex;justify-content: center;">Senha:</label>
                        <input type="password" class="form-control" id="inputSenha" name="senha" maxlength="100">
                      </div>
                    <div class="btnEntrar" style="margin-top: 10px;">
                        <button type="submit" value="submit" class="btn btn-outline-primary">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>