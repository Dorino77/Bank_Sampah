<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>  
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            color: #333;
            background-color: #000;
            background-image: url("{{ asset('images/admin/background.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            box-sizing: border-box;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: linear-gradient(135deg, #2e7d32, #66bb6a);
            color: white;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 200px;
            height: auto;
        }

        .profile-container {
            display: flex;
            align-items: center;
        }

        .profile-details {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .customer-role {
            font-size: 18px;
            opacity: 0.9;
        }

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
            transition: background 0.3s;
        }

        .nav-menu a:hover {
            background-color: #ffbb00;
        }

        .main-content {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .main-content h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .card-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            width: 300px;
            padding: 20px;
            background-color: #ffbb00;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 60px;
            height: 60px;
            margin-bottom: 15px;
        }

        .card h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .card .total-price {
            font-size: 1.2rem;
            color: #555;
            margin-top: 10px;
        }

        .card .total-price span {
            font-weight: bold;
            color: #2e7d32;
        }

        button {
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
        }

        .add-button {
        display: center;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 50%;
        padding: 12px;
        background: linear-gradient(135deg, #1d8522, #2e7d32);
        color: white;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .add-button:hover {
        background: linear-gradient(135deg, #2e7d32, #66bb6a);
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .add-button i {
        font-size: 18px;
    }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header class="header">
        <a href="{{ route('admin.laporan') }}">
            <img src="/images/logo1.png" alt="Logo Bank Sampah" class="logo">
        </a>
        <div class="profile-container">
            <div class="profile-details">
                <span class="customer-role">Administrator</span>
            </div>
        </div>
    </header>

    <!-- Navbar Section -->
    <nav class="nav-menu">
        <ul>
            <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.pengambilan_sampah') }}">Req Pengambilan Sampah</a></li>
            <li><a href="{{ route('admin.data_sampah') }}">Data Sampah</a></li>
            <li><a href="{{ route('admin.beli_sampah') }}">Pembelian Sampah</a></li>
            <li><a href="{{ route('admin.data_karya') }}">Data Hasil Karya</a></li>
            {{-- <li><a href="{{ route('admin.transaksi_karya') }}">Pembelian Hasil Karya</a></li> --}}
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

    <!-- Main Content Section -->
    <div class="main-content">
        <h1>Laporan Keuangan</h1>
        <div class="card-container">
            <!-- Card Transaksi Sampah -->
            <div class="card">
                <img src="/images/admin/GmbSampah.png" alt="Transaksi Sampah Icon">
                <h2>Transaksi Sampah</h2>
                <div class="total-price">
                    <span>Rp.{{ number_format($totalHargaSampah, 2, ',', '.') }}</span>
                </div>
                <button class="add-button" onclick="window.location.href='{{ route('admin.riwayat_sampah') }}'">
                    <i class="fa fa-recycle"></i> Lihat Detail
                </button>
                
            </div>

            <!-- Card Transaksi Hasil Karya -->
            <div class="card">
                <img src="/images/admin/karya.png" alt="Transaksi Hasil Karya Icon">
                <h2>Transaksi Hasil Karya</h2>
                <div class="total-price">
                    <span>Rp.{{ number_format($totalHargaKarya, 2, ',', '.') }}</span>
                </div>
                <button class="add-button" onclick="window.location.href='{{ route('admin.transaksi_karya') }}'">
                    <i class="fa fa-paint-brush"></i> Lihat Detail
                </button>
            </div>

            <!-- Card Total Transaksi -->
            <div class="card">
                <img src="/images/admin/indonesian-rupiah (1).png" alt="Total Icon">
                <h2>Tabungan</h2>
                <div class="total-price">
                    <span>Rp.{{ number_format($hasilPengurangan, 2, ',', '.')}}</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
