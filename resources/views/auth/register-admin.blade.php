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

            <form action="/daftar" method="POST">
                @csrf
                <div class="input-group">
                    <label for="telepon">Telepon:</label>
                    <input type="text" name="telepon" id="telepon" required>
                
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                
                <div class="input-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
                
                <button type="submit" class="submit-btn">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
