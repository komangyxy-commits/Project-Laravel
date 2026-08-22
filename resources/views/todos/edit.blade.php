<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <main class="form-page">
        <section class="form-card">
            <div class="form-header">
                <h1>Edit Todo</h1>
                <p>Perbarui informasi tugas kamu.</p>
            </div>
            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="title">Masukkan Judul Todo</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $todo->title) }}" required>
                     @error('title')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Masukkan Deskripsi Todo</label>
                    <textarea name="description" id="description">{{ old('description', $todo->description) }}</textarea>
                    @error('description')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="pending" {{ old('status', $todo->status) == 'pending' ? 'selected' : '' }}>Belum Selesai</option>
                        <option value="in_progress" {{ old('status', $todo->status) == 'in_progress' ? 'selected' : '' }}>Dalam Proses</option>
                        <option value="completed" {{ old('status', $todo->status) == 'completed' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="priority">Prioritas</label>
                    <select name="priority" id="priority">
                        <option value="medium" {{ old('priority', $todo->priority) == 'medium' ? 'selected' : '' }}>Sedang</option>
                        <option value="low" {{ old('priority', $todo->priority) == 'low' ? 'selected' : '' }}>Rendah</option>
                        <option value="high" {{ old('priority', $todo->priority) == 'high' ? 'selected' : '' }}>Tinggi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="due_date">Tanggal Jatuh Tempo</label>
                    <input type="datetime-local" name="due_date" id="due_date" value="{{ old('due_date', $todo->due_date->format('Y-m-d\TH:i')) }}" required>
                    @error('due_date')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">Update Todo</button>
            </form>
        </section>
    </main>
</body>
</html>