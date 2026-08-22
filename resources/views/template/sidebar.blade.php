<aside class="sidebar">
    <h2 class="logo">Todo</h2>

    <nav class="sidebar-menu">
        <a href="{{ route('dashboard') }}"
        class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('todos.index') }}"
        class="{{ request()->routeIs('todos.*') ? 'active' : '' }}">
            Todos
        </a>
    </nav>

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="btn-logout">
            Logout
        </button>
    </form>
</aside>