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
                <h1>Tambah Todo</h1>
                <p>Buat tugas baru yang ingin kamu kerjakan.</p>
            </div>
            <form action="{{ route('todos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Masukkan Judul Todo</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required>
                    @error('title')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Masukkan Deskripsi Todo</label>
                    <textarea name="description" id="description">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="pending">Belum Selesai</option>
                        <option value="in_progress">Dalam Proses</option>
                        <option value="completed">Selesai</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="priority">Prioritas</label>
                    <select name="priority" id="priority">
                        <option value="medium">Sedang</option>
                        <option value="low">Rendah</option>
                        <option value="high">Tinggi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="due_date">Tanggal Jatuh Tempo</label>
                    <input type="datetime-local" name="due_date" id="due_date" value="{{ old('due_date') }}" required>
                    @error('due_date')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">Tambah Todo</button>
            </form>
        </section>
    </main>
</body>
</html>