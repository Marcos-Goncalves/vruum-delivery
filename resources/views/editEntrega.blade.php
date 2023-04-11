<!DOCTYPE html>
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
</html>