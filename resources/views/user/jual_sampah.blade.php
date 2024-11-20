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
    </style>
</head>

<body>
    <header class="header">
        <div class="logo-container">
            <img src="/images/logo1.png" alt="Logo Bank Sampah" class="logo">
        </div>
        <div class="profile-container">
            <img src="profile-pic.png" alt="Foto Profil" class="profile-pic">
            <div class="profile-details">
                <span class="customer-name">Selamat Datang {{ $loggedInUser->name }}</span>
                <span class="customer-role">Customer</span>
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
            <li><a href="#">Logout</a></li>
        </ul>
    </nav>

    <section class="request-form">
        <h2>Request Penjualan Sampah</h2>
        <p>Silakan isi formulir di bawah ini dengan data yang benar untuk permintaan penjualan sampah Anda.</p>
        <form action="submit_request.php" method="POST">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Alamat:</label>
            <input type="text" id="address" name="address" required>

            <label for="phone">Nomor HP:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="deskripsi">Deskripsi Sampah:</label>
            <input type="text" id="deskripsi" name="deskripsi" required>

            <label for="pickup_time">Jam Pengambilan:</label>
            <input type="time" id="pickup_time" name="pickup_time" min="09:00" max="16:00" required>

            <button type="submit" class="submit-btn">Kirim Request</button>
        </form>
    </section>
</body>

</html>