<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sampah - Bank Sampah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            color: #333;
            background-color: #f4f4f4;
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 150px;
            height: auto;
        }

        .profile-container {
            display: flex;
            align-items: center;
            gap: 10px;
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


        /* Main container */
        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .header-title {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        /* Card container */
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-price {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: #757575;
        }

        /* Card buttons */
        .card-actions {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .btn-edit,
        .btn-delete {
            padding: 10px 15px;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-edit {
            background: #ffa726;
        }

        .btn-edit:hover {
            background: #f57c00;
        }

        .btn-delete {
            background: #e53935;
        }

        .btn-delete:hover {
            background: #970909;
        }

        .btn-tambah {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 25px;
            font-size: 18px;
            background: linear-gradient(135deg, #027e10, #04a017);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .btn-tambah:hover {
            background: #027e10;
            transform: translateY(-2px);
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

    <!-- Navbar -->
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

    <!-- Main Content -->
    <main>
        <section class="container">
            <h1 class="header-title">Data Sampah</h1>
            <div class="card-container">
                @foreach ($sampah as $sampahItem)
                <div class="card">
                    <h3 class="card-title">{{ $sampahItem->jenis_sampah }}</h3>
                    <p class="card-price">Harga /Kg: Rp{{ number_format($sampahItem->harga_per_kg, 0, ',', '.') }}</p>
                    @php $totalBerat = $result->firstWhere('id', $sampahItem->id)->total_berat ?? 0; @endphp
                    <p>{{ number_format($totalBerat, 2, ',', '.') }} KG</p>
                    <div class="card-actions">
                        <a href="{{ route('admin.edit_sampah', $sampahItem->id) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.delete_sampah', $sampahItem->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('admin.tambah_sampah') }}" class="btn-tambah">Tambah Sampah</a>
        </section>
    </main>
</body>

</html>
