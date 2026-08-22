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
                <h1>Login</h1>
                <p>Masuk ke akun MyTodo kamu.</p>
            </div>

            @if(session('success'))
                <p class="success-message">
                    {{ session('success') }}
                </p>
            @endif

            <form action="{{ route('login') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="contoh@gmail.com" required><br>

                    @error('email')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                    
                 <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="********" required><br>

                    @error('password')
                        <p class="form-error">
                            {{ $message }}
                        </p>
                    @enderror
                    
                    @error('login')
                        <p class="form-error">
                            {{ $message }}
                        </p>
                    @enderror
                    <button type="submit" class="btn-submit">Login</button>
                </div>
            </form>
            <p class="auth-link">Belum punya akun?<a href="{{ route('register') }}">Daftar</a></p>
        </section>
    </main>
</body>
</html>