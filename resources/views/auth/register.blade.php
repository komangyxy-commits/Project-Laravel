<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Register</h1>

    <form action="/register" method="POST">
        @csrf
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan nama Anda" required><br>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" required> <br>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="••••••••" required><br>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" required><br>

        <button type="submit">Daftar</button>
    </form> 
</body>
</html>