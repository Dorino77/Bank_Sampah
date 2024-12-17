<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Sampah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
            color: #333;
            background-color: #f4f4f4;
            background-image: url('background.png');
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

        /* Table Styles */
        .table-container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .add-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-button:hover {
            background-color: #45a049;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
        }

        .data-table th {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .data-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .lihat-button {
            background-color: #ffbb33;
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .lihat-button:hover {
            background-color: #ffa500;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            max-height: 90%;
            overflow-y: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .modal-content h3 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
        }

        .form-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        

        .clear-button {
            background-color: #ff9800;
            color: white;
        }

        .cancel-button {
            background-color: #f44336;
            color: white;
        }

        .sub-form {
            margin-bottom: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        /* Detail Modal Styles */
        .detail-modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            max-height: 90%;
            overflow-y: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .detail-modal-content h3 {
            margin-top: 0;
        }

        .close-detail-modal {
            position: absolute;
            top: 15px;
            right: 20px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .header, .nav-menu ul {
                flex-direction: column;
                align-items: center;
            }

            .nav-menu li {
                margin: 5px 0;
            }
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
    <h2 style="text-align: center; margin-top: 50px; font-size: 2.2rem;">Pembelian Sampah</h2>
<!-- Date Filter Form -->
<div style="text-align: center; margin-bottom: 20px;">
    <form action="{{ route('admin.riwayat_sampah') }}" method="GET">
        <label for="tanggal" style="font-size: 1rem;">Cari Berdasarkan Tanggal: </label>
        <input type="date" name="tanggal" id="tanggal" value="{{ request()->tanggal }}" style="padding: 5px 10px;">
        <button type="submit" class="add-button" style="padding: 5px 15px;">Cari</button>
    </form>
</div>

<div class="table-container">
    <table class="data-table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor HP</th>
                <th>Jenis Barang</th>
                <th>Berat</th>
                <th>Harga Total (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi_sampah as $item)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                    <td>{{ $item->user_name }}</td>
                    <td>{{ $item->user_alamat }}</td>
                    <td>{{ $item->user_telepon }}</td>
                    <td>{{ $item->jenis_sampah }}</td>
                    <td>{{ $item->berat }} kg</td>
                    <td>Rp.{{ number_format($item->harga_total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
  
      
    </body>
  </html>
