<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Sampah - Bank Sampah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
            color: #333;
            background-color: #000000;
            background-image: url("../images/admin/background.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: linear-gradient(135deg, #2e7d32, #66bb6a);
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .logo {
            width: 210px;
        }

        .profile-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-details .customer-role {
            font-size: 18px;
            font-weight: 500;
            color: white;
        }

        /* Navigation Menu */
        .nav-menu {
            background-color: #333;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav-menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .nav-menu li {
            margin: 0 15px;
        }

        .nav-menu a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-menu a:hover {
            background: linear-gradient(135deg, #ffbb00, #ffa726);
            transform: translateY(-2px);
        }

        /* Form Styles */
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .form-container h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: #555;
        }

        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        form input:focus {
            border-color: #4caf50;
            outline: none;
            box-shadow: 0 0 4px rgba(76, 175, 80, 0.5);
        }

        form button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #4caf50, #81c784);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        form button:hover {
            background: linear-gradient(135deg, #388e3c, #66bb6a);
            transform: translateY(-2px);
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <a href="{{ route('home') }}">
            <img src="/images/logo1.png" alt="Logo Bank Sampah" class="logo">
        </a>
        <div class="profile-container">
            <div class="profile-details">
                <span class="customer-role">Administrator</span>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="nav-menu">
        <ul>
            <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.pengambilan_sampah') }}">Req Pengambilan Sampah</a></li>
            <li><a href="{{ route('admin.data_sampah') }}">Data Sampah</a></li>
            <li><a href="{{ route('admin.beli_sampah') }}">Pembelian Sampah</a></li>
            <li><a href="{{ route('admin.data_karya') }}">Data Hasil Karya</a></li>
            <li><a href="{{ route('admin.transaksi_karya') }}">Pembelian Hasil Karya</a></li>
            <li><a href="{{ route('admin.laporan') }}">Keuangan</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: white; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Form Container -->
    <div class="form-container">
        <h1>Tambah Data Sampah</h1>
        <form action="{{ route('admin.tambah_sampah') }}" method="POST">
            @csrf
            <label for="jenis_sampah">Jenis Sampah</label>
            <input type="text" id="jenis_sampah" name="jenis_sampah" placeholder="Masukkan jenis sampah" required>

            <label for="harga_per_kg">Harga per Kg</label>
            <input type="number" id="harga_per_kg" name="harga_per_kg" placeholder="Masukkan harga per Kg" required>

            <button type="submit">Simpan</button>
        </form>
        <a href="{{ route('admin.data_sampah') }}" class="back-link">Kembali ke Data Sampah</a>
    </div>
</body>

</html>
