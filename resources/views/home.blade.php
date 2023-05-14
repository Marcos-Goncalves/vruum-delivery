@if(Session('tipoUsuario') == 'usuario')
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Admin</h1>

    <p>Nome: {{ Auth::user()->nome }}</p>
    <p>Telefone: {{ Auth::user()->telefone }}</p>
    <p>Usuario: {{ Session('tipoUsuario') }}</p>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>

@elseif(Session('tipoUsuario') == 'motoqueiro')
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Motoqueiro</h1>

    <p>Nome: {{ Auth::user()->nome }}</p>
    <p>Telefone: {{ Auth::user()->telefone }}</p>
    <p>Usuario: {{ Session('tipoUsuario') }}</p>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
@endif
