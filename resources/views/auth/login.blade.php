<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Login</h1>
    @if(session('success'))
        <div style="color: green; padding: 10px; border: 1px solid green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="/login" method="POST">
    @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required><br>

        @error('email')
            <div>{{ $message }}</div>
        @enderror
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>