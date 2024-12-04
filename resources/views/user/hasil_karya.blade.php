<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Sampah - Hasil Karya</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
            color: #333;
            background-color: #000000;
            background-image: url("../images/cutomer/background.jpg");
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

        /* Judul Halaman Hasil Karya */
        .judul-hasil-karya {
            text-align: center;
            margin: 30px 0;
            color: #ffffff;
        }

        .judul-hasil-karya h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
            color: #000000; 
        }

        .judul-hasil-karya p {
            font-size: 18px;
            font-weight: 400;
            color: #000000;
        }

        /* Hasil Karya Section */
        .hasil-karya {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: rgb(0, 0, 0);
        }

        .karya-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .karya-item {
            background-color: rgba(255, 255, 255);
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            width: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }

        .karya-item:hover {
            transform: scale(1.05);
        }

        .karya-img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .karya-nama {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .karya-harga {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .btn-keranjang {
            padding: 10px 15px;
            background-color: #ffbb00;
            border: none;
            color: black;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-keranjang:hover {
            background-color: #7bff00;
        }

        .beli-container {
            margin-top: 20px;
        }

        .btn-beli {
            padding: 15px 30px;
            background-color: #4caf50;
            border: none;
            color: rgb(255, 255, 255);
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .btn-beli:hover {
            background-color: #388e3c;
        }

        /* Popup Overlay */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        /* Popup Content */
        .popup-content {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            text-align: center;
            animation: fadeIn 0.3s;
        }

        .popup-content h2 {
            margin-top: 0;
            color: #333;
        }

        .popup-content input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .info-layanan {
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }

        .popup-content button {
            padding: 12px 25px;
            margin: 10px 5px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-content button:first-child {
            background-color: #4CAF50;
            color: #00ff0d;
        }

        .popup-content button:last-child {
            background-color: #f44336;
            color: #fff;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        .karya-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

        .karya-item {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); /* Tebalkan dan lebih gelap */
            width: 200px;
            text-align: center;
        }


        .karya-item img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        let totalItems = 0;
        let keranjang = [];
    
        function tambahKeranjang(itemInputId, itemName, itemPrice, availableStock) {
            // Ambil jumlah item dari input
            const jumlahItem = parseInt(document.getElementById(itemInputId).value);
    
            // Validasi input jumlah
            if (isNaN(jumlahItem) || jumlahItem <= 0) {
                alert("Masukkan jumlah item yang valid.");
                return;
            }
    
            if (jumlahItem > availableStock) {
                alert(`Stok tidak mencukupi! Stok tersedia: ${availableStock}.`);
                return;
            }
    
            // Tambahkan item ke keranjang atau perbarui jumlah
            const existingItemIndex = keranjang.findIndex(item => item.id === itemInputId.split('-')[1]);
            if (existingItemIndex !== -1) {
                keranjang[existingItemIndex].quantity += jumlahItem;
            } else {
                keranjang.push({ 
                    id: itemInputId.split('-')[1],
                    name: itemName, 
                    price: itemPrice, 
                    quantity: jumlahItem 
                });
            }
    
            // Perbarui total jumlah barang
            totalItems += jumlahItem;
            document.getElementById('btn-beli').innerText = `Beli Sekarang (${totalItems} item)`;
    
            // Berikan notifikasi
            alert(`${itemName} sebanyak ${jumlahItem} item telah ditambahkan ke keranjang.`);
        }
    
        function bukaPopup() {
            if (keranjang.length === 0) {
                alert("Keranjang Anda kosong. Tambahkan item terlebih dahulu.");
                return;
            }
    
            const rincianBarang = keranjang.map(item => 
                `<p>${item.name} - ${item.quantity} pcs @ Rp ${item.price.toLocaleString()}</p>`
            ).join('');
    
            // Perbarui rincian barang dan total harga
            document.getElementById('rincian-barang').innerHTML = rincianBarang;
            document.getElementById('total-harga').innerText = keranjang.reduce((total, item) => total + (item.price * item.quantity), 0).toLocaleString();
    
            document.getElementById('popup-pembelian').style.display = 'flex';
        }
    
        function tutupPopup() {
            document.getElementById('popup-pembelian').style.display = 'none';
        }
    
        function toggleInfo() {
            const pilihan = document.querySelector('input[name="pengambilan"]:checked').value;
            const infoLayanan = document.getElementById('info-layanan');
            if (pilihan === 'kirim') {
                infoLayanan.innerHTML = "<p>Transfer ke rekening berikut: <strong>1234567890</strong> atas nama Bank Sampah</p>";
            } else {
                infoLayanan.innerHTML = "<p>Jam layanan di Bank Sampah: <strong>Senin - Jumat, 09:00 - 16:00</strong></p>";
            }
        }
    
        async function simpanTransaksi() {
        const keranjangData = JSON.stringify(keranjang); // Konversi keranjang menjadi JSON

        try {
            const response = await fetch("{{ route('customer.simpanTransaksi') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}" // CSRF token untuk Laravel
                },
                body: JSON.stringify({ keranjang: keranjangData })
            });

            const result = await response.json();

            if (response.ok) {
                alert(result.message || "Transaksi berhasil!");
                // Reset keranjang
                keranjang = [];
                totalItems = 0;
                document.getElementById('btn-beli').innerText = `Beli Sekarang`;
            } else {
                alert(result.error || "Terjadi kesalahan.");
            }
        } catch (error) {
            alert("Terjadi kesalahan dalam mengirim data.");
        }
    }


        async function selesaikanPembelian() {
            const nama = document.getElementById('nama-pembeli').value;
            const alamat = document.getElementById('alamat-pembeli').value;
            const nomorHp = document.getElementById('nomor-hp-pembeli').value;
            const tanggal = document.getElementById('tanggal-pembelian').value; // Ambil nilai tanggal

            if (nama && alamat && nomorHp && tanggal) {
                const rincianBarang = keranjang.map(item => 
                    `${item.name} - ${item.quantity} pcs @ Rp ${item.price.toLocaleString()}` 
                ).join('\n');

                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();

                doc.text("Rincian Pembelian", 10, 10);
                doc.text(`Nama: ${nama}`, 10, 20);
                doc.text(`Alamat: ${alamat}`, 10, 30);
                doc.text(`Nomor HP: ${nomorHp}`, 10, 40);
                doc.text(`Tanggal Pembelian: ${tanggal}`, 10, 50); // Tampilkan tanggal
                doc.text("Rincian Barang:", 10, 60);
                doc.text(rincianBarang, 10, 70);

                const totalHarga = keranjang.reduce((total, item) => total + (item.price * item.quantity), 0);
                doc.text(`Total Harga: Rp ${totalHarga.toLocaleString()}`, 10, 90 + (keranjang.length * 10));

                doc.save("Pembelian_HasilKarya.pdf");

                // Kirim data pembelian ke controller
                const response = await fetch("{{ route('customer.simpanTransaksi') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        keranjang: JSON.stringify(keranjang),
                        nama: nama,
                        alamat: alamat,
                        nomorHp: nomorHp,
                        tanggal: tanggal
                    })
                });

                const result = await response.json();
                if (response.ok) {
                    alert('Pembelian berhasil! Terima kasih telah berbelanja.');
                    tutupPopup();  // Menutup popup setelah pembelian berhasil
                    keranjang = [];
                    totalItems = 0;
                    document.getElementById('btn-beli').innerText = `Beli Sekarang`;
                } else {
                    alert(result.error || 'Terjadi kesalahan saat memproses transaksi.');
                }
            } else {
                alert("Mohon lengkapi data pembeli.");
            }
        }



    </script>
    
</head>
<body>
    <header class="header">
        <a href="{{ route('home') }}">
            <img src="/images/logo1.png" alt="Logo Bank Sampah" class="logo">
        </a>
        <div class="profile-container">
            <div class="profile-details">
                <span class="customer-name">Selamat Datang, {{ $loggedInUser->name }}</span>
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

    @if(session()->has('feedback'))
    <div style="background-color: #4CAF50; color: white; padding: 10px; text-align: center;">
        {{ session('feedback') }}
    </div>
    @endif

    <section class="judul-hasil-karya">
        <h1>Hasil Karya</h1>
        <p>Temukan berbagai produk kerajinan tangan unik dan menarik!</p>
    </section>

    <section class="hasil-karya">
    <div class="karya-container">
        @forelse ($karyaList as $karya)
            <div class="karya-item">
                <img src="{{ asset('storage/' . $karya->gambar) }}" alt="{{ $karya->namaKarya }}" />
                <h3>{{ $karya->namaKarya }}</h3>
                <p>Rp{{ number_format($karya->hargaKarya, 0, ',', '.') }}</p>
                <p>{{ $karya->deskripsi }}</p>
                <p>Sisa: {{ $karya->stok }}</p>
                <input type="number" id="quantity-{{ $karya->id }}" min="1" placeholder="Jumlah" class="item-input">
                <button class="btn-keranjang" 
                onclick="tambahKeranjang('quantity-{{ $karya->id }}', '{{ $karya->namaKarya }}', {{ $karya->hargaKarya }}, {{ $karya->stok }})">
                Tambah ke Keranjang
                </button>
                

            </div>
        @empty
            <p style="text-align: center;">Tidak ada data hasil karya.</p>
        @endforelse
    </div>
    <div class="beli-container">
        <button id="btn-beli" class="btn-beli" onclick="bukaPopup()">Beli Sekarang</button>
    </div>
    </section>

    <div id="popup-pembelian" class="popup-overlay">
        <div class="popup-content">
            <h2>Rincian Pembelian</h2>
            <div id="rincian-barang"></div>
            <div id="total-harga-container">
                <h3>Total Harga: Rp <span id="total-harga">0</span></h3>
            </div>
    
            <label>Nama:</label>
            <input type="text" id="nama-pembeli" value="{{ $loggedInUser->name }}" readonly>
            
            <label>Alamat:</label>
            <input type="text" id="alamat-pembeli" value="{{ $loggedInUser->alamat }}" readonly>
    
            <label>Nomor HP:</label>
            <input type="text" id="nomor-hp-pembeli" value="{{ $loggedInUser->telepon }}" readonly>
    
            <label>Tanggal Pembelian:</label>
            <input type="date" id="tanggal-pembelian" required>
    
            {{-- <div>
                <label>
                    <input type="radio" name="pengambilan" value="ambil" onclick="toggleInfo()"> Ambil di Bank Sampah
                </label>
                <label>
                    <input type="radio" name="pengambilan" value="kirim" onclick="toggleInfo()"> Dikirim
                </label>
            </div> --}}
    
            <div id="info-layanan" class="info-layanan"></div>
            
            <button onclick="selesaikanPembelian()">Beli</button>
            <button onclick="tutupPopup()">Batal</button>
        </div>
    </div>
    
    
</body>
</html>
