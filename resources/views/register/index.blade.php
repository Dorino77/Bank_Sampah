<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar- Bank Sampah Gedangsewu</title>
    <link rel="stylesheet" href="/css/register-styles.css"> 
</head>
<body>
    <div class="register-container">
        <div class="form-box">
        <img src="images/logo2.png" alt="Logo Bank Sampah Gedangsewu" class="logo">
            <h2>Daftar</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/register" method="POST">
                @csrf
                <div class="input-group">
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>
                
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                
                <div class="input-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>
                
                <div class="input-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}" required>
                </div>
                
                <div class="input-group">
                    <label for="telepon">Telepon:</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" value="{{ old('telepon') }}" required>
                </div>
                
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                
                <button type="submit" class="submit-btn">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
