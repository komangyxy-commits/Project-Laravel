<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $totalTodos = $user->todos()->count();
        $pendingTodos = $user->todos()->where('status', 'pending')->count();
        $completedTodos = $user->todos()->where('status', 'completed')->count();
        $inProgressTodos = $user->todos()->where('status', 'in_progress')->count();
        $todoTerdekat = $user->todos()->where('status', '!=', 'completed')->where('due_date', '>=', now())->orderBy('due_date', 'asc')->take(3)->get();

        return view('dashboard', compact('user', 'totalTodos', 'pendingTodos', 'completedTodos', 'inProgressTodos', 'todoTerdekat'));
    }

    
}
