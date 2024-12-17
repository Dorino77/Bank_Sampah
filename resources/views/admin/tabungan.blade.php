<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Tabungan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: linear-gradient(135deg, #2e7d32, #66bb6a);
            color: white;
            border-bottom: 2px solid #fff;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 210px;
            height: auto;
        }

        .container {
            padding: 30px;
        }

        .tabungan-info {
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: center;
        }

        .tabungan-info h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .tabungan-info p {
            font-size: 20px;
            color: #333;
            margin: 10px 0;
        }

        .tabungan-form {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .tabungan-form input {
            padding: 10px;
            font-size: 16px;
            width: 45%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .tabungan-form button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 45%;
        }

        .tabungan-form button:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            font-size: 18px;
            color: green;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>

    <header class="header">
        <a href="{{ route('home') }}">
            <img src="/images/logo1.png" alt="Logo Bank Sampah" class="logo">
        </a>
    </header>

    <div class="container">
        <div class="tabungan-info">
            <h3>Informasi Tabungan</h3>
            <p>Total Uang Saat Ini: Rp. {{ number_format($totalUang, 2) }}</p>
        </div>

        <!-- Form untuk menambah dan mengurangi saldo tabungan -->
        <div class="tabungan-form">
            <!-- Form untuk menambah saldo -->
            <form action="{{ route('admin.tambahTabungan') }}" method="POST">
                @csrf
                <input type="number" name="jumlah" placeholder="Jumlah yang ingin ditambahkan" required min="1">
                <button type="submit">Tambah Tabungan</button>
            </form>

            <!-- Form untuk mengurangi saldo -->
            <form action="{{ route('admin.kurangiTabungan') }}" method="POST">
                @csrf
                <input type="number" name="jumlah" placeholder="Jumlah yang ingin dikurangi" required min="1">
                <button type="submit">Kurangi Tabungan</button>
            </form>
        </div>

        <!-- Pesan keberhasilan atau kegagalan -->
        @if (session('success'))
        <div class="message">{{ session('success') }}</div>
        @elseif (session('error'))
        <div class="message error-message">{{ session('error') }}</div>
        @endif
    </div>

</body>

</html>
