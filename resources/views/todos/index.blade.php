<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Todo List</h1>

    @forelse ($todos as $todo)
        <p>{{ $todo->title }}</p>
        <p>{{ $todo->description }}</p>
        <p>{{ $todo->status }}</p>
        <p>{{ $todo->priority }}</p>
        <p>{{ $todo->due_date }}</p>
    @empty
        <p>Tidak ada todo</p>
    @endforelse
    
</body>
</html>