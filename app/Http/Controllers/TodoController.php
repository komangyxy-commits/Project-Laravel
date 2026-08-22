<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', Auth::id())->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function edit(Todo $todo)
    {
        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }
        return view('todos.edit', compact('todo'));
    }

    public function destroy(Todo $todo)
    {
        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }
        
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Todo berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:pending,in_progress,completed'],
            'priority' => ['required', 'in:low,medium,high'],
            'due_date' => ['required', 'date'],
        ]);

        $completedAt = null;
        if ($request->status == 'completed') {
            $completedAt = now();
        }
        Todo::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
            'completed_at' => $completedAt,
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo berhasil ditambahkan.');
    }
    
    public function update(Request $request, Todo $todo)
    {
        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:pending,in_progress,completed'],
            'priority' => ['required', 'in:low,medium,high'],
            'due_date' => ['required', 'date'],
        ]);
        
        $completedAt = $todo->completed_at;
        if ($todo->status != 'completed' && $request->status == 'completed') {
            $completedAt = now();
        }

        if ($request->status != 'completed') {
            $completedAt = null;
        }
        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
            'completed_at' => $completedAt,
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo berhasil diperbarui.');
    }

    protected function casts(): array
    {
        return [
            'due_date' => 'datetime',
        ];
    }
}
