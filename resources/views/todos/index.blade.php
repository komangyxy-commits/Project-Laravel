<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="layout">
        @include('template.sidebar')
        <main class="todo-page">
            <section class="todo-header">
                <div>
                    <h1>Todo Saya</h1>
                    <p>Kelola semua tugas kamu di sini.</p>
                </div>

                <a href="{{ route('todos.create') }}"
                   class="btn-primary-action">
                    + Tambah Todo
                </a>
            </section>

            @if (session('success'))
                <p class="success-message"> {{ session('success') }} </p>
            @endif

            <section class="todo-list">
                @forelse ($todos as $todo)
                    <div class="todo-card">
                        <h2 class="todo-title">{{ $todo->title }}</h2>
                        <p class="todo-description">{{ $todo->description }}</p>

                        <div class="todo-info">
                            <p class="todo-status">@if ($todo->status == 'pending')
                                    Pending
                                @elseif ($todo->status == 'in_progress')
                                    In Progress
                                @else
                                    Selesai
                                @endif
                            </p>
                            <p class="todo-priority">
                                Priority :

                                @if ($todo->priority == 'low')
                                    Rendah

                                @elseif ($todo->priority == 'medium')
                                    Sedang

                                @else
                                    Tinggi
                                @endif
                            </p>
                        </div>

                        <div class="todo-deadline">
                            <p class="deadline-date">Deadline : 
                                {{ $todo->due_date->locale('id')->translatedFormat('l, d F Y H:i') }}
                            </p>
                            @if ($todo->due_date->isToday())
                                <p class="deadline-status">Hari ini</p>
                            @elseif ($todo->due_date->isPast())
                                <p class="deadline-status expired">Expired</p>
                            @else
                                <p class="deadline-status">{{ (int) now()->diffInDays($todo->due_date) }} hari lagi</p>
                            @endif

                            @if ($todo->status == 'completed' && $todo->completed_at)
                                <p class="completed-date">Selesai pada :
                                    {{ $todo->completed_at->locale('id')->translatedFormat('l, d F Y H:i') }}
                                </p>
                            @endif
                        </div>
                        <div class="todo-actions">
                            <a href="{{ route('todos.edit', $todo->id) }}" class="btn-edit">Edit</a>
                            <form
                                action="{{ route('todos.destroy', $todo->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus Todo ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Tidak ada Todo.</p>
                @endforelse
            </section>
        </main>
    </div>
</body>
</html>