<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Todo</h1>
    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')
          
        <label for="title">Masukkan Judul Todo</label>
        <input type="text" name="title" id="title" value="{{ old('title', $todo->title) }}" required>

        <label for="description">Masukkan Deskripsi Todo</label>
        <textarea name="description" id="description">{{ old('description', $todo->description) }}</textarea>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="pending" {{ old('status', $todo->status) == 'pending' ? 'selected' : '' }}>Belum Selesai</option>
            <option value="in_progress" {{ old('status', $todo->status) == 'in_progress' ? 'selected' : '' }}>Dalam Proses</option>
            <option value="completed" {{ old('status', $todo->status) == 'completed' ? 'selected' : '' }}>Selesai</option>
        </select>

        <label for="priority">Prioritas</label>
        <select name="priority" id="priority">
            <option value="medium" {{ old('priority', $todo->priority) == 'medium' ? 'selected' : '' }}>Sedang</option>
            <option value="low" {{ old('priority', $todo->priority) == 'low' ? 'selected' : '' }}>Rendah</option>
            <option value="high" {{ old('priority', $todo->priority) == 'high' ? 'selected' : '' }}>Tinggi</option>
        </select>

        <label for="due_date">Tanggal Jatuh Tempo</label>
        <input type="datetime-local" name="due_date" id="due_date"     value="{{ old('due_date', date('Y-m-d\TH:i', strtotime($todo->due_date))) }}"
        required>

        <button type="submit">Update Todo</button>
    </form>
</body>
</html>