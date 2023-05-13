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
</html>