<!-- resources/views/profile.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>

    <p>Nome: {{ Auth::user()->nome }}</p>
    <p>Telefone: {{ Auth::user()->telefone }}</p>
    <p>Usuario: {{ Session('tipoUsuario') }}</p>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
