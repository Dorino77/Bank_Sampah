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


        .add-button-container {
            display: flex;
            justify-content: center;
            margin: 30px 0;
        }

        .add-button {
            padding: 15px 30px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-button:hover {
            background-color: #45a049;
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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 200px;
            text-align: center;
        }

        .karya-item img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .btn-edit,
        .btn-hapus {
            padding: 10px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            margin: 5px 0;
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-hapus {
            background-color: #dc3545;
            color: white;
        }

        .btn-hapus:hover {
            background-color: #a71d2a;
        }

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
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            text-align: center;
        }

        .modal-content input {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-cancel,
        .btn-save {
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }

        .btn-cancel {
            background-color: #dc3545;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #a71d2a;
        }

        .btn-save {
            background-color: #007bff;
            color: white;
        }

        .btn-save:hover {
            background-color: #0056b3;
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

    <h2 style="text-align: center; margin-top: 50px; font-size: 2.2rem;">Data Hasil Karya</h2>
    <div class="add-button-container">
        <button class="add-button" onclick="window.location.href='{{ route('admin.form_tambah_karya') }}'">Tambah Hasil Karya</button>
    </div>

    <div class="karya-container">
        @forelse ($karyaList as $karya)
            <div class="karya-item">
                <img src="{{ asset('storage/' . $karya->gambar) }}" alt="{{ $karya->namaKarya }}" />
                <h3>{{ $karya->namaKarya }}</h3>
                <p>Harga: Rp{{ number_format($karya->hargaKarya, 0, ',', '.') }}</p>
                <p>Deskripsi: {{ $karya->deskripsi }}</p>
                <p>Stok: {{ $karya->stok }}</p>
                <button class="btn-edit" onclick="window.location.href='{{ route('admin.edit_karya', $karya->id) }}'">Edit</button>
                {{-- <button onclick="openModal('{{ route('admin.edit_karya', $karya->id) }}')" class="btn-edit">Edit</button> --}}

                <form action="{{ route('admin.delete_karya', $karya->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                </form>
            </div>
        @empty
            <p style="text-align: center;">Tidak ada data hasil karya.</p>
        @endforelse
    </div>





    {{-- <!-- Modal -->
<div class="modal" id="editModal">
    <div class="modal-content">
        <h2>Edit Hasil Karya</h2>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.update_karya', $karya->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="namaKarya">Nama Karya:</label>
            <input type="text" id="namaKarya" name="namaKarya" value="{{ old('namaKarya', $karya->namaKarya) }}" required>

            <label for="hargaKarya">Harga Karya:</label>
            <input type="number" id="hargaKarya" name="hargaKarya" value="{{ old('hargaKarya', $karya->hargaKarya) }}" required>

            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $karya->deskripsi) }}</textarea>

            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" value="{{ old('stok', $karya->stok) }}" required>

            <label for="gambar">Gambar (kosongkan jika tidak ingin mengganti):</label>
            <input type="file" id="gambar" name="gambar">

            <div class="modal-footer">
                <button type="submit" class="btn-save">Simpan</button>
                <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
            </div>
        </form>
    </div>
</div>






<script>
    function openModal(route) {
        document.getElementById('editModal').style.display = 'flex';
        document.getElementById('editForm').action = route;
    }

    function closeModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    // Optional: Close modal when clicking outside of it
    window.onclick = function(event) {
        var modal = document.getElementById('editModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script> --}}



</body>

</html>