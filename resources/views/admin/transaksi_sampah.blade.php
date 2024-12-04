<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Sampah - Transaksi Sampah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
            color: #333;
            background: linear-gradient(135deg, #2e7d32, #66bb6a);
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

        /* Form Container */
        .form-box {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            max-width: 700px;
            margin: 50px auto;
            padding: 40px;
            animation: fadeIn 1s ease-in-out;
        }

        .form-title {
            font-size: 32px;
            color: #2e7d32;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

       /* Form Elements */
.input-group {
    margin-bottom: 25px;
    position: relative;
}

.input-group label {
    font-size: 16px;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

/* Tambahkan jarak khusus pada jenis barang untuk lebih teratur */
.barang-field label {
    margin-bottom: 10px;  /* Menambah jarak bawah pada label */
}

.barang-field select,
.barang-field input {
    width: 100%;
    padding: 12px 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 15px;  /* Memberikan jarak antara field dan input berikutnya */
    box-sizing: border-box;
}

/* Mengatur margin untuk elemen input pada barang agar jarak antar elemen rapi */
.barang-field {
    margin-bottom: 20px;
    padding: 15px;
    background: #f9f9f9;
    border-radius: 10px;
    border: 1px solid #ddd;
}

.barang-field h3 {
    margin-bottom: 10px;
    font-size: 18px;
}


        /* Buttons */
        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .submit-btn,
        .cancel-button {
            padding: 15px 30px;
            font-size: 16px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .submit-btn {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: #fff;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #45a049, #4CAF50);
            transform: scale(1.05);
        }

        .cancel-button {
            background: linear-gradient(135deg, #f44336, #e53935);
            color: #fff;
        }

        .cancel-button:hover {
            background: linear-gradient(135deg, #e53935, #f44336);
            transform: scale(1.05);
        }

        /* Error Message */
        .error-message {
            color: #e53935;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .form-box {
                padding: 20px;
            }

            .form-title {
                font-size: 24px;
            }

            .submit-btn,
            .cancel-button {
                padding: 10px 20px;
                font-size: 14px;
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
            <li><a href="datasampah.html">Data Sampah</a></li>
            <li><a href="{{ route('admin.beli_sampah') }}">Pembelian Sampah</a></li>
            <li><a href="{{ route('admin.data_karya') }}">Data Hasil Karya</a></li>
            <li><a href="{{ route('admin.transaksi_karya') }}">Pembelian Hasil Karya</a></li>
            <li><a href="...">Keuangan</a></li>
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

    <div class="form-box">
        <h2 class="form-title">Transaksi Sampah</h2>
        <form action="{{ route('admin.transaksi_sampah') }}" method="POST" id="transaksi-sampah-form">
            @csrf
            <!-- Input Telepon -->
            <div class="input-group">
                <label for="telepon">Telepon:</label>
                <input type="text" id="telepon" name="telepon" required><br>
                <div id="telepon-error" class="error-message">Nomor telepon tidak terdaftar.</div>
            </div>

            <!-- Input Jumlah Barang -->
            <div class="input-group">
                <label for="jumlah_barang">Jumlah Barang:</label>
                <input type="number" id="jumlah_barang" name="jumlah_barang" min="1" required oninput="updateBarangFields()"><br>
            </div>

            <!-- Dynamic Barang Fields -->
            <div id="barang-fields"></div>

            <!-- Submit Button -->
            <div class="button-group">
                <input class="submit-btn" id="submit-button" type="submit" value="Kirim">
                <input class="cancel-button" type="button" value="Batal" onclick="window.location.href = '{{ route('admin.beli_sampah') }}';">
            </div>
        </form>
    </div>

    <script>
        // Fungsi untuk menambahkan field berdasarkan jumlah barang yang dimasukkan
        function updateBarangFields() {
            const jumlahBarang = document.getElementById('jumlah_barang').value;
            const barangFieldsContainer = document.getElementById('barang-fields');
            barangFieldsContainer.innerHTML = ''; // Kosongkan field sebelumnya
    
            for (let i = 1; i <= jumlahBarang; i++) {
                const barangField = `
                    <div class="barang-field">
                        <h3>Barang ${i}</h3>
                        <label for="jenis_barang_${i}">Jenis Barang:</label>
                        <select id="jenis_barang_${i}" name="jenis_barang[]" required onchange="updateHargaTotal(${i})">
                            <option value="">Pilih Jenis Barang</option>
                            <!-- Opsi jenis barang akan diisi oleh server -->
                        </select><br>
    
                        <label for="berat_${i}">Berat (kg):</label>
                        <input type="number" id="berat_${i}" name="berat[]" step="0.1" required oninput="updateHargaTotal(${i})"><br>
    
                        <label for="harga_total_${i}">Harga Total (Rp):</label>
                        <input type="number" id="harga_total_${i}" name="harga_total[]" readonly><br>

                        <label for="poin_${i}">Poin:</label>
                        <input type="number" id="poin_${i}" name="poin[]" readonly><br>
                    </div>
                `;
                barangFieldsContainer.innerHTML += barangField;
            }
    
            // Ambil data jenis barang dari server
            fetch('/admin/get-jenis-sampah')
                .then(response => response.json())
                .then(data => {
                    const selects = document.querySelectorAll('[id^="jenis_barang_"]');
                    selects.forEach(select => {
                        data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id;
                            option.textContent = item.jenis_sampah;
                            select.appendChild(option);
                        });
                    });
                });
        }
    
        // Fungsi untuk mengupdate harga total berdasarkan jenis barang dan berat
        function updateHargaTotal(i) {
            const jenisBarang = document.getElementById(`jenis_barang_${i}`).value;
            const berat = document.getElementById(`berat_${i}`).value;
            const hargaTotalInput = document.getElementById(`harga_total_${i}`);
            const poinInput = document.getElementById(`poin_${i}`);
    
            if (jenisBarang && berat) {
                fetch(`/admin/get-harga-per-kg/${jenisBarang}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.harga_per_kg) {
                            const hargaPerKg = data.harga_per_kg;
                            const hargaTotal = hargaPerKg * berat;
                            const poin = Math.floor(hargaTotal / 1000); // Perhitungan poin
    
                            hargaTotalInput.value = hargaTotal;
                            poinInput.value = poin;
                        }
                    });
            }
        }
    
        document.getElementById('telepon').addEventListener('blur', function() {
            const telepon = this.value;
            const teleponError = document.getElementById('telepon-error');
            const submitButton = document.getElementById('submit-button');
    
            // Mengirim request AJAX untuk memeriksa nomor telepon
            fetch(`/admin/cek-telepon/${telepon}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        // Jika telepon terdaftar, sembunyikan pesan error dan aktifkan tombol submit
                        teleponError.style.display = 'none';
                        submitButton.disabled = false; // Mengaktifkan tombol kirim
                    } else {
                        // Jika telepon tidak terdaftar, tampilkan pesan error dan nonaktifkan tombol submit
                        teleponError.style.display = 'block';
                        submitButton.disabled = true; // Menonaktifkan tombol kirim
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Jika ada kesalahan, sembunyikan pesan error dan aktifkan tombol submit
                    teleponError.style.display = 'none';
                    submitButton.disabled = false;
                });
        });
    </script>
</body>

</html>
