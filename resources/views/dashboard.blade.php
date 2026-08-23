<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="layout">
        @include('template.sidebar')
        <main class="dashboard-page">
            <section class="dashboard-header">
                <p>Ringkasan Todo</p>
                <div class="user-info">
                    <p>Halo, {{ $user->name }}!</p>
                </div>
            </section>
                
            <section class="welcome-section">
                <h1>Selamat Datang</h1>
                <p>Kelola dan pantau ringkasan tugas kamu hari ini.</p>
            </section>
                
            <div class="dashboard-actions">
                <a href="{{ route('todos.create') }}"
                class="btn-primary-action">
                    + Tambah Todo Baru
                </a>
                <a href="{{ route('todos.index') }}"
                class="btn-secondary-action">
                    Lihat Semua Todo
                </a>
            </div>
                
            <section class="grid-todo">
                <div class="item-todo">
                    <p class="todo-label">Total Todo</p>
                    <p class="todo-number">{{ $totalTodos }}</p>
                </div>

                <div class="item-todo">
                    <p class="todo-label">Pending</p>
                    <p class="todo-number">{{ $pendingTodos }}</p>
                </div>

                <div class="item-todo">
                    <p class="todo-label">In Progress</p>
                    <p class="todo-number">{{ $inProgressTodos }}</p>
                </div>

                <div class="item-todo">
                    <p class="todo-label">Selesai</p>
                    <p class="todo-number">{{ $completedTodos }}</p>
                </div>
            </section>

            <section class="deadline-section">
                <h2>Deadline Terdekat</h2>
                <div class="deadline-list">
                    @forelse($todoTerdekat as $todo)
                        <div class="deadline-item">
                            <p class="deadline-title">{{ $todo->title }}</p>
                            <p class="deadline-date">{{ $todo->due_date->format('d F Y H:i') }}</p>
                        </div>
                    @empty
                        <p class="deadline-empty">Tidak ada Todo yang akan datang.</p>
                    @endforelse
                </div>
            </section>
        </main>
    </div>
</body>
</html>