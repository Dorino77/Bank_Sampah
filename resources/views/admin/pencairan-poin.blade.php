<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencairan Poin</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
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
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }
        h2 {
            font-weight: bold;
            color: #333;
        }
        .btn-custom {
            background-color: #ff9800;
            color: white;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #e68900;
            color: #fff;
        }
        .form-label {
            font-weight: 600;
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
            <li><a href="{{ route('admin.pencairan-poin') }}">Pencairan Poin</a></li>
            <li><a href="{{ route('admin.laporan') }}">Keuangan</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: rgb(255, 25, 25); cursor: pointer; font-size: 16px; font-weight: bold;">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-8">
            <div class="card p-4">
                <!-- Header -->
                <div class="text-center mb-4">
                    <i class="bi bi-coin" style="font-size: 3rem; color: #ff9800;"></i>
                    <h2 class="mt-2">Pencairan Poin</h2>
                    <p class="text-muted">Form Pencairan Poin Customer</p>
                </div>

                <!-- Notifikasi sukses -->
                @if(session('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <div>{{ session('error') }}</div>
                </div>
                @endif


                <!-- Form -->
                <form action="{{ route('admin.reduce-poin.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="idUser" class="form-label">Pilih Nama Customer</label>
                        <select name="idUser" id="idUser" class="form-select" required>
                            <option value="">-- Pilih Nama Customer --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->idUser }}">
                                    Nama: {{ $user->name }} | Total Poin: {{ $user->totalPoin }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jumlahPoin" class="form-label">Jumlah Poin yang Ingin Dicairkan</label>
                        <input type="number" name="jumlahPoin" id="jumlahPoin" class="form-control" placeholder="Masukkan jumlah poin" min="1" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-custom">
                            <i class="bi bi-dash-circle me-1"></i> Cairkan Poin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
