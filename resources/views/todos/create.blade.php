<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Create Todo</h1>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf

        <label for="title">Masukkan Judul Todo</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>

        <label for="description">Masukkan Deskripsi Todo</label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="pending">Belum Selesai</option>
            <option value="in_progress">Dalam Proses</option>
            <option value="completed">Selesai</option>
        </select>

        <label for="priority">Prioritas</label>
        <select name="priority" id="priority">
            <option value="medium">Sedang</option>
             <option value="low">Rendah</option>
            <option value="high">Tinggi</option>
        </select>

        <label for="due_date">Tanggal Jatuh Tempo</label>
        <input type="datetime-local" name="due_date" id="due_date" required>

        <button type="submit">Tambah Todo</button>
    </form>
</body>
</html>