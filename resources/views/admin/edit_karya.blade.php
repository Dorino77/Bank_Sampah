<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hasil Karya</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
    font-family: 'Inter', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.form-container {
    max-width: 450px;
    margin: 50px auto;
    padding: 30px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

h2 {
    text-align: center;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 25px;
}

label {
    display: block;
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 5px;
}

input, textarea {
    width: 100%;
    padding: 12px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
    margin-bottom: 15px;
    background-color: #f9f9f9;
}

textarea {
    resize: vertical;
    height: 100px;
}

input[type="file"] {
    padding: 6px;
    border: none;
}

button {
    width: 100px;
    padding: 10px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-right: 10px;
}

.btn-save {
    background-color: #007bff;
    color: white;
    border: none;
}

.btn-save:hover {
    background-color: #0056b3;
}

.btn-cancel {
    background-color: #dc3545;
    color: white;
    border: none;
    text-decoration: none;
}

.btn-cancel:hover {
    background-color: #a71d2a;
}

.alert {
    padding: 15px;
    background-color: #f8d7da;
    color: #721c24;
    border-radius: 5px;
    margin-bottom: 15px;
}

.alert ul {
    padding-left: 20px;
}

.alert li {
    font-size: 14px;
}

button[type="submit"] {
    display: inline-block;
}

a.btn-cancel {
    display: inline-block;
    text-align: center;
    padding: 10px 20px;
    font-size: 14px;
    margin-top: 10px;
}

    </style>
</head>
<body>
    <div class="form-container">
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

            <button type="submit" class="btn-save">Simpan</button>
            <a href="{{ route('admin.data_karya') }}" class="btn-cancel" style="text-align: center; display: inline-block; margin-top: 10px; text-decoration: none;">Batal</a>
        </form>
    </div>
</body>
</html>
