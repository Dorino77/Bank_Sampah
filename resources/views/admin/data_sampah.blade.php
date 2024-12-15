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

        /* Box-style Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
            background-color: #f9f9f9;
        }

        th {
            background-color: #66bb6a;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        tr:hover {
            background-color: #ddd;
        }

        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header-title {
            font-size: 2rem;
            
            text-align: center;
            margin-bottom: 20px;
        }

        /* Action Buttons */
        .btn-edit, .btn-delete {
            padding: 5px 10px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #ff9800;
        }

        .btn-edit:hover {
            background-color: #f57c00;
        }

        .btn-delete {
            background-color: #e53935;
        }

        .btn-delete:hover {
            background-color: #d32f2f;
        }

        /* Form Styling */
        form {
            display: inline;
        }

        button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
        }
        /* Card container to hold all cards */
.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Responsive grid */
    gap: 20px;
    margin-top: 20px;
}

/* Individual card styling */
.card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

/* Card hover effect */
.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

/* Card title */
.card-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

/* Card category and price */
.card-category, .card-price {
    font-size: 16px;
    margin-bottom: 8px;
}

/* Card action buttons */
.card-actions {
    margin-top: 15px;
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

/* Edit and delete buttons */
.btn-edit, .btn-delete {
    padding: 8px 15px;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}

.btn-edit {
    background-color: #ff9800;
}

.btn-edit:hover {
    background-color: #f57c00;
}

.btn-delete {
    background-color: #e53935;
}

.btn-delete:hover {
    background-color: #d32f2f;
}

    </style>
</head>

<body>
    <!-- Header with logo and profile -->
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

   <!-- Main Content -->
<main class="main-content">
    <section class="container">
        <h1 class="header-title">Data Sampah</h1>

        <div class="card-container">
            @foreach ($sampah as $sampahItem)
            <div class="card">
                <h3 class="card-title">{{ $sampahItem->jenis_sampah }}</h3>
                <p class="card-price">Harga /Kg: Rp{{ number_format($sampahItem->harga_per_kg, 0, ',', '.') }}</p>

                <!-- Mencari total berat untuk jenis sampah yang sesuai -->
                @foreach ($result as $resultItem)
                    @if ($sampahItem->id == $resultItem->id) <!-- Cek apakah ID sampah cocok -->
                        <p>{{ number_format($resultItem->total_berat, 2, ',', '.') }} KG</p>
                    @endif
                @endforeach

                <div class="card-actions">
                    <!-- Option to edit or delete -->
                    <a href="{{ route('admin.edit_sampah', $sampahItem->id) }}" class="btn btn-warning btn-edit">Edit</a>
                    <form action="{{ route('admin.delete_sampah', $sampahItem->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</main>

    
</body>

</html>
