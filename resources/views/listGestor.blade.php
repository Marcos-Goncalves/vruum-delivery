<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="logo_V.png" />
    <title>
        Vruum Delivery - Gestores
    </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" media="screen" />
</head>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" id="teste">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img id="icLogo" src="logo_25.png">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
        <div class="container mt-5">
            <div class="card" class="card" style="width: 90%;
            height: auto;
            border-radius: 30px;
            background: linear-gradient(145deg, #3c3658, #3c3658);
            box-shadow: 1px 1px 20px #000, -1px -1px 10px #000;
            margin: auto;
            margin-top: 130px;">
                <div class="card-header text-white" style="text-align: center;">
                    <h6 class="m-0">Gestores Cadastrados</h6>
                </div>
                <div class="card-body">
                    <table id="table_gestores" class="table table-hover" style="color: white;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gestores as $gestor)
                            <tr>
                                <th scope="row">{{$gestor->id}}</th>
                                <td>{{$gestor->nome}}</td>
                                <td>{{$gestor->telefone}}</td>
                                <td><button class="btn btn-unstyled btn-icon" type="button" onclick="window.location.href='/registro/edit/{{$gestor->id}}'">
                                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#table_gestores').DataTable({
                    language: {
                        "search": 'Pesquisar', // Altera o texto do recurso de pesquisa para "Pesquisar"
                        "paginate": {
                            "first": "Primeiro",
                            "last": "Último",
                            "next": "Próximo",
                            "previous": "Anterior"
                        },
                        "zeroRecords": "Nenhum conteúdo encontrado!",
                        "emptyTable": "Tabela ainda está vazia",
                    }
                });
            });
        </script>
    </body>

</html>