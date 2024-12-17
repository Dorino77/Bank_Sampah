<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sampah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .logo {
            width: 180px;
            height: auto;
        }

        .profile-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .customer-role {
            font-size: 1.2rem;
            font-weight: 600;
        }

        /* Heading */
        .heading-title {
            text-align: center;
            margin: 30px 0;
            font-size: 2.5rem;
            font-weight: 700;
        }

        /* Edit Form */
        .edit-form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 50px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 700px;
        }

        .edit-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            color: #555;
            font-size: 1rem;
        }

        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus {
            border-color: #66bb6a;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 187, 106, 0.5);
        }

        .btn-container {
            display: flex;
            gap: 15px;
        }

        .btn-save, .btn-cancel {
            flex: 1;
            padding: 12px;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-save {
            background-color: #2e7d32;
            color: white;
        }

        .btn-save:hover {
            background-color: #1b5e20;
            transform: scale(1.05);
        }

        .btn-cancel {
            background-color: #dc3545;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #b71c1c;
            transform: scale(1.05);
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
            <span class="customer-role">Administrator</span>
        </div>
    </header>

    <!-- Title -->
    <h2 class="heading-title">Edit Data Sampah</h2>

    <!-- Form Container -->
    <div class="edit-form-container">
        <form action="{{ route('admin.update_sampah', $sampah->id) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="jenis_sampah">Jenis Sampah</label>
                <input type="text" name="jenis_sampah" id="jenis_sampah" value="{{ $sampah->jenis_sampah }}" readonly>
            </div>

            <div class="form-group">
                <label for="harga_per_kg">Harga per KG</label>
                <input type="number" name="harga_per_kg" id="harga_per_kg" value="{{ $sampah->harga_per_kg }}" required>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn-save">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <button type="button" class="btn-cancel" onclick="window.location.href='{{ route('admin.data_sampah') }}'">
                    <i class="fas fa-times"></i> Batal
                </button>
            </div>
        </form>
    </div>
</body>

</html>
