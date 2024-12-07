<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Sampah - Dashboard</title>
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
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 210px;
            height: auto;
        }

        .profile-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-pic {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 2px solid white;
            object-fit: cover;
        }

        .profile-details {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .customer-name {
            font-size: 22px;
            font-weight: 600;
        }

        .customer-role {
            font-size: 18px;
            opacity: 0.8;
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
            transition: background 0.3s;
        }

        .nav-menu a:hover {
            background-color: #ffbb00;
        }

        /* Main Content */
        .main-content {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
            background: linear-gradient(135deg, #2e7d32, #66bb6a);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .welcome-section {
            text-align: center;
        }

        .welcome-section h1 {
            color: white;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .welcome-section p {
            font-size: 1rem;
            color: #ffffff;
        }

        /* Stats Section */
        .stats-section {
            display: flex;
            gap: 20px;
            margin-top: 40px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .stat-box {
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 200px;
            transition: transform 0.5s;
            position: relative;
        }

        .stat-box:hover {
            transform: scale(1.05);
        }

        .stat-box img {
            width: 40px;
            height: 40px;
            margin-bottom: 10px;
        }

        .stat-box h2 {
            font-size: 1.5rem;
            margin: 0;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
            /* Adding shadow */
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            margin: 10px 0;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
            /* Adding shadow */
        }

        .stat-box p {
            font-size: 1.5rem;
            opacity: 0.9;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
            /* Adding shadow */
        }


        /* Specific Colors for Each Box */
        .box-1 {
            background: linear-gradient(135deg, #4caf50, #81c784);
            /* Green Gradient */
        }

        .box-2 {
            background: linear-gradient(135deg, #42a5f5, #64b5f6);
            /* Blue Gradient */
        }

        .box-3 {
            background: linear-gradient(135deg, #ffb74d, #ffcc80);
            /* Orange Gradient */
        }

        .box-4 {
            background: linear-gradient(135deg, #ba68c8, #ce93d8);
            /* Purple Gradient */
        }
    </style>
</head>

<body>
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
    <main class="main-content">
        <section class="welcome-section">
            <h1>Bank Sampah Gedangsewu</h1>
            <p>Gunakan menu di atas untuk menjelajahi fitur-fitur yang tersedia.</p>
        </section>
    </main>

    <!-- Monitoring Section -->
    <section class="stats-section">
        <div class="stat-box box-1">
            <img src="/images/admin/customer.png" alt="Registered Customers Icon">
            <h2>Jumlah Customer</h2>
            <p class="stat-value">{{ $custCount }}</p>
            <p>Customers</p>
        </div>
        <div class="stat-box box-2">
            <img src="/images/admin/order.png" alt="Incoming Orders Icon">
            <h2>Order Hasil Karya</h2>
            <p class="stat-value">{{ $buyCount }}</p>
            <p>Order</p>
        </div>
        <div class="stat-box box-3">
            <img src="/images/admin/karya.png" alt="Creations Icon">
            <h2>Hasil Karya</h2>
            <p class="stat-value">{{ $karyaCount }}</p>
            <p>Items</p>
        </div>
        <div class="stat-box box-4">
            <img src="/images/admin/coin.png" alt="Customer Points Icon">
            <h2>Customer Points</h2>
            <p class="stat-value">{{ $totalPoin }}</p> 
            <p>Points</p>
        </div>
    </section>
</body>

</html>