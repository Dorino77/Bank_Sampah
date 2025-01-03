<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Sampah - Customer</title>
    <link rel="stylesheet" href="/css/customer-styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <a href="{{ route('home') }}">
            <img src="/images/logo1.png" alt="Logo Bank Sampah" class="logo">
        </a>
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
            
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: rgb(255, 25, 25); cursor: pointer; font-size: 16px; font-weight: bold;">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <main class="main-content">
        <section class="welcome-section">
            <h1>Selamat Datang di Bank Sampah!</h1>
            <p>Gunakan menu di atas untuk menjelajahi fitur-fitur yang tersedia.</p>
        </section>
    </main>
    <section class="carousel-section">
        <div class="carousel">
            <img src="\images\poster1.jpg" alt="Poster 1" class="carousel-item">
            <img src="\images\poster2.jpg" alt="Poster 2" class="carousel-item">
            <img src="\images\poster1.jpg" alt="Poster 3" class="carousel-item">
            <img src="\images\poster2.jpg" alt="Poster 4" class="carousel-item">
            <img src="\images\poster1.jpg" alt="Poster 5" class="carousel-item">
            <img src="\images\poster2.jpg" alt="Poster 6" class="carousel-item">
            <img src="\images\poster1.jpg" alt="Poster 7" class="carousel-item">
            <img src="\images\poster2.jpg" alt="Poster 8" class="carousel-item">
            <img src="\images\poster1.jpg" alt="Poster 9" class="carousel-item">
            <img src="\images\poster2.jpg" alt="Poster 10" class="carousel-item">
            <img src="\images\poster1.jpg" alt="Poster 11" class="carousel-item">
            <img src="\images\poster1.jpg" alt="Poster 12" class="carousel-item">
        </div>
    </section>
    
    <!-- Pop-up Section -->
    <div id="popup" class="popup">
        <span id="popup-close" class="popup-close">&times;</span>
        <img id="popup-img" class="popup-content" src="" alt="Popup Image">
    </div>

    
    <script>
        const carousel = document.querySelector('.carousel');
        const items = carousel.querySelectorAll('.carousel-item');
        const totalItems = items.length;
        let currentIndex = 0;
    
        // Mengatur posisi awal carousel
        function updateCarousel() {
            const angle = 360 / totalItems;
            items.forEach((item, index) => {
                const rotation = (index - currentIndex) * angle;
                item.style.transform = `rotateY(${rotation}deg) translateZ(400px)`;
                item.style.opacity = index === currentIndex ? 1 : 0.5;
                item.style.zIndex = index === currentIndex ? 1 : 0;
            });
        }
    
        // Carousel rotation on click
        carousel.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalItems;
            updateCarousel();
        });
    
        // Double-click to show pop-up
        items.forEach((item) => {
            item.addEventListener('dblclick', (e) => {
                const popup = document.getElementById('popup');
                const popupImg = document.getElementById('popup-img');
                popupImg.src = e.target.src;
                popup.style.display = 'flex';
            });
        });
    
        // Close the pop-up
        document.getElementById('popup-close').addEventListener('click', () => {
            document.getElementById('popup').style.display = 'none';
        });
    
        // Optional: Close pop-up when clicking outside the image
        document.getElementById('popup').addEventListener('click', (e) => {
            if (e.target === e.currentTarget) {
                document.getElementById('popup').style.display = 'none';
            }
        });
    
        // Initialize carousel positions
        updateCarousel();
    </script>

<section class="container">
    <h1 class="header-title">Harga Sampah</h1>
    <div class="card-container">
        @foreach ($sampah as $sampahItem)
        <div class="card">
          
            <div class="card-content">
                <h3 class="card-title">{{ $sampahItem->jenis_sampah }}</h3>
                <p class="card-price">Harga /Kg: <span style="color: #2e7d32; font-weight: bold;">Rp{{ number_format($sampahItem->harga_per_kg, 0, ',', '.') }}</span></p>
            </div>
            <div class="card-footer">
                <button class="card-button" style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; transition: all 0.3s;">
                    Detail
                </button>
            </div>
        </div>
        @endforeach
    </div>
</section>
</body>

</html>