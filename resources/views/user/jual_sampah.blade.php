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
            transition: background 0.3s, transform 0.3s;
        }

        .nav-menu a:hover {
            background-color: #ffbb00;
            transform: scale(1.1);
        }

        /* Request Form Section */
        .request-form {
            max-width: 600px;
            margin: 40px auto;
            padding: 40px;
            background: linear-gradient(145deg, #ffffff, #e6e6e6);
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7), inset 0 1px 5px rgba(255, 255, 255, 0.3);
            text-align: center;
            backdrop-filter: blur(10px);
            color: #2e7d32;
        }

        .request-form h2 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #2e7d32;
            font-weight: bold;
            text-transform: uppercase;
        }

        .request-form p {
            margin-bottom: 20px;
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }

        .request-form label {
            display: block;
            margin: 10px 0 5px;
            font-weight: 500;
            color: #555;
            font-size: 18px;
        }

        .request-form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f7f7f7;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            color: #333;
            transition: box-shadow 0.3s ease;
        }

        .request-form input:focus {
            outline: none;
            border-color: #66bb6a;
            box-shadow: 0 0 10px rgba(102, 187, 106, 0.4);
        }

        .submit-btn {
            background: linear-gradient(135deg, #66bb6a, #2e7d32);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
            box-shadow: 0 4px 10px rgba(102, 187, 106, 0.4);
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #2e7d32, #66bb6a);
            transform: translateY(-3px);
        }

        .submit-btn:active {
            transform: scale(0.98);
        }

        .success {
            color: green;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            font-size: 14px;
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
                <span class="customer-name">Selamat Datang, {{ $loggedInUser->name }}</span>
                <span class="customer-role" style="font-size: 18px; font-weight: bold; color: #4CAF50; background-color: #e8f5e9; padding: 5px 10px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    Poin: {{ $totalPoin }}
                </span>
            </div>
        </div>
    </header>

    <nav class="nav-menu">
        <ul>
            <li><a href="{{ route('user.index') }}">Dashboard</a></li>
            <li><a href="{{ route('customer.jual_sampah') }}">Jual Sampah</a></li>
            <li><a href="{{ route('customer.hasil_karya') }}">Hasil Karya</a></li>
            {{-- <li><a href="{{ route('customer.') }}">Aktivitas</a></li>
            <li><a href="{{ route('customer.') }}">Poin</a></li> --}}
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: white; cursor: pointer; font-size: 16px; font-weight: bold;">
                            Logout
                        </button>
                    </form>
                </li>
        </ul>
    </nav>

    <section class="request-form">
        <h2>Request Penjualan Sampah</h2>
        <p>Silakan isi formulir di bawah ini dengan data yang benar untuk permintaan penjualan sampah Anda, yang akan dilayani pukul 09:00 - 12:00 WIB.</p>

        <!-- Pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Pesan error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customer.requestSampah') }}" method="POST">
            @csrf 
        
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" autocomplete="off" name="nama" value="{{ old('nama', Auth::user()->name) }}" required>
            @error('nama') <p class="error">{{ $message }}</p> @enderror
            <br><br>
        
            <label for="alamat">Alamat:</label><br>
            <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
            @error('alamat') <p class="error">{{ $message }}</p> @enderror
            <br><br>
        
            <label for="nomor_hp">Nomor HP:</label><br>
            <input type="tel" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp', Auth::user()->telepon) }}" readonly>
            @error('nomor_hp') <p class="error">{{ $message }}</p> @enderror
            <br><br>
        
            <label for="deskripsi_sampah">Deskripsi Sampah:</label><br>
            <input type="text" id="deskripsi_sampah" name="deskripsi_sampah" value="{{ old('deskripsi_sampah') }}" required>
            @error('deskripsi_sampah') <p class="error">{{ $message }}</p> @enderror
            <br><br>
        
            <label for="jam_pengambilan">Jam Pengambilan (09:00 - 12:00 AM):</label><br>
            <input type="time" id="jam_pengambilan" name="jam_pengambilan" value="{{ old('jam_pengambilan') }}" min="09:00" max="12:00" required>
            @error('jam_pengambilan') <p class="error">{{ $message }}</p> @enderror
            <br><br>
        
            <button type="submit" class="submit-btn">Kirim Request</button>
        </form>
        
            <!-- Pesan sukses -->
            @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <!-- Pesan error -->
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>
</body>

</html>