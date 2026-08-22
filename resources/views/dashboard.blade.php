<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Selamat Datang di Web Todo</h1>
    <p>Kelola tugas, status, prioritas, dan deadline kamu dengan mudah.</p>

    <a href="{{ route('todos.index') }}">
        Buka Todo
    </a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>