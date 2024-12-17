<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form tambah karya</title>
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

            /* Register Container Styles */
            .register-container {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                padding: 20px;
                background-color: #f4f4f4;
            }

            .form-box {
                background-color: #fff;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 400px;
            }

            h2 {
                font-size: 20px;
                margin-bottom: 20px;
                font-weight: 600;
                color: #333;
                text-align: center;
            }

            /* Form Fields */
            form div {
                margin-bottom: 15px;
            }

            form label {
                font-size: 14px;
                font-weight: 500;
                color: #333;
                margin-bottom: 5px;
                display: block;
            }

            form input, form textarea {
                width: 100%;
                padding: 10px;
                font-size: 14px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
                background-color: #fff;
            }

            form input:focus, form textarea:focus {
                border-color: #66bb6a;
                outline: none;
            }

            /* File Input */
            form input[type="file"] {
                font-size: 14px;
                padding: 5px;
                border: none;
            }

            /* Buttons Alignment */
.submit-btn, .cancel-btn {
    display: inline-block;
    text-align: center;
    padding: 10px 20px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin: 0 5px; /* Adds spacing between buttons */
}

.submit-btn {
    background-color: #007bff;
    color: white;
    border: none;
}

.submit-btn:hover {
    background-color: #0056b3;
}

.cancel-btn {
    background-color: #dc3545;
    color: white;
    text-decoration: none;
    border: none;
}

.cancel-btn:hover {
    background-color: #a71d2a;
}


            /* Responsive Design */
            @media (max-width: 600px) {
                .form-box {
                    padding: 20px;
                }

                h2 {
                    font-size: 18px;
                }

                form input, form textarea, .submit-btn, .cancel-btn {
                    font-size: 12px;
                }

                .submit-btn, .cancel-btn {
                    width: 100%;
                    margin-bottom: 10px;
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
                <span class="customer-name">Administrator</span>
                <span class="customer-role">Administrator</span>
            </div>
        </div>
    </header>
   

    <div class="register-container">
        <div class="form-box">
       
            <h2>Tambah Hasil Karya</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.tambah_karya') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="namaKarya">Nama Karya:</label>
                    <input type="text" id="namaKarya" name="namaKarya" value="{{ $karya->namaKarya ?? '' }}" required>
                </div>
            
                <div>
                    <label for="hargaKarya">Harga Karya:</label>
                    <input type="number" id="hargaKarya" name="hargaKarya" value="{{ $karya->hargaKarya ?? '' }}" required>
                </div>
            
                <div>
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea id="deskripsi" name="deskripsi" required>{{ $karya->deskripsi ?? '' }}</textarea>
                </div>
            
                <div>
                    <label for="stok">Stok:</label>
                    <input type="number" id="stok" name="stok" value="{{ $karya->stok ?? '' }}" required>
                </div>
            
                <div>
                    <label for="gambar">Gambar:</label>
                    <input type="file" id="gambar" name="gambar" {{ isset($karya) ? '' : 'required' }}>
                </div>
                
                <div style="text-align: center; margin-top: 20px;">
                    <button type="submit" class="submit-btn">Tambah</button>
                    <a href="{{ route('admin.data_karya') }}" class="cancel-btn">Batal</a>
                </div>
            </form>
            
            
        </div>
    </div>
</body>
</html>