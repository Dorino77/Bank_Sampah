<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sampah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
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
                /* Title */
                .title {
            text-align: center;
            margin-top: 50px;
            font-size: 2.2rem;
        }

        /* Table Container */
        .table-container {
            width: 80%;
            margin: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        thead tr {
            background-color: #4CAF50;
            color: white;
        }

        tbody tr {
            background-color: #f9f9f9;
        }

        /* Switch Style */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 28px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e74c3c; /* Merah untuk 'Belum Terkonfirmasi' */
            transition: .4s;
            border-radius: 28px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #4CAF50; /* Hijau untuk 'Terkonfirmasi' */
        }

        input:checked + .slider:before {
            transform: translateX(30px);
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="logo-container">
            <img src="/images/logo1.png" alt="Logo Bank Sampah" class="logo">
        </div>
        <div class="profile-container">
            <div class="profile-details">
                <span class="customer-name">Guntur Ganteng</span>
                <span class="customer-role">Administrator</span>
            </div>
        </div>
    </header>
    <nav class="nav-menu">
        <ul>
            <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.pengambilan_sampah') }}">Req Pengambilan Sampah</a></li>
            <li><a href="datasampah.html">Data Sampah</a></li>
            <li><a href="pembeliansampah.html">Pembelian Sampah</a></li>
            <li><a href="{{ route('admin.data_karya') }}">Data Hasil Karya</a></li>
            <li><a href="pembeliankarya.html">Pembelian Hasil Karya</a></li>
            <li><a href="keuanganpoin.html">Keuangan</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </nav>
    <h2 style="text-align: center; margin-top: 50px; font-size: 2.2rem;">Request Pengambilan Sampah</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomor HP</th>
                    <th>Deskripsi Sampah</th>
                    <th>Jam Pengambilan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Aldo</td>
                    <td>Maguwoharjo Klaten</td>
                    <td>0897654678</td>
                    <td>Sampah Plastik dan Kertas</td>
                    <td>12.00</td>
                    <td>
                        <label class="switch">
                            <input type="checkbox" onclick="toggleConfirmation(this)">
                            <span class="slider"></span>
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- JavaScript Terpisah di dalam Tag Script -->
    <script>
        function toggleConfirmation(element) {
            if (element.checked) {
                element.parentNode.querySelector('.slider').setAttribute('data-status', 'Terkonfirmasi');
            } else {
                element.parentNode.querySelector('.slider').setAttribute('data-status', 'Belum Terkonfirmasi');
            }
        }
    </script>
</body>

</html>