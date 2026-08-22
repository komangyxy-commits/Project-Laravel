<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Todo List</h1>
    <a href="{{ route('dashboard') }}">Kembali ke Dashboard</a>
    <a href="{{ route('todos.create') }}">Tambah Todo</a>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @forelse ($todos as $todo)
        <p>{{ $todo->title }}</p>
        <p>{{ $todo->description }}</p>
        <p>{{ $todo->status }}</p>
        <p>{{ $todo->priority }}</p>
        <p>Deadline: {{ $todo->due_date->format('d-m-Y H:i') }}</p>
        <a href="{{ route('todos.edit', $todo->id) }}">Edit</a>
        
        @if ($todo->due_date->isToday())
            <p>Hari ini</p>

        @elseif ($todo->due_date->isPast())
            <p>Expired</p>

        @else
            <p>{{ (int) now()->diffInDays($todo->due_date) }} hari lagi</p>
        @endif

        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
            onsubmit="return confirm('Yakin ingin menghapus Todo ini?')">   
            @csrf
            @method('DELETE')

            <button type="submit">Hapus</button>
        </form>
    @empty
        <p>Tidak ada todo</p>
    @endforelse
    
</body>
</html>