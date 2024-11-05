<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Sampah Gedangsewu</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
    <!-- Header Section -->
    <header>
        <div class="logo">
        <img src="/images/logo1.png" alt="Logo">

        </div>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#education">Edukasi</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </nav>
    </header>

    <!-- Home Section -->
    <section class="home" id="home">
        <div class="overlay"></div>
        <div class="container">
            <h3>SELAMAT DATANG</h3>
            <h1>BANK SAMPAH</h1>
            <h2>GEDANGSEWU</h2>
            <p>Mari kita jaga kelestarian bumi dengan mengelola sampah secara bijak di bank sampah, karena dengan
                pengolahan yang baik, kita dapat mengurangi pencemaran lingkungan, mendaur ulang limbah menjadi barang
                bernilai.</p>
            <div class="btn-group">
                <button class="register-btn" onclick="window.location.href='{{ route('register') }}'">Daftar</button>
            </div>

            <!-- Login Form Container -->
            <div class="login-box">
                <h2>LOGIN</h2>
                <form action="login.php" method="POST">
                    <div class="input-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="submit-btn">Log in</button>
                </form>

            </div>
        </div>
    </section>

    <!-- Program Section -->
    <section class="program">
        <div class="container">
            <img src="/images/program.png" alt="Program Bank Sampah" class="program-img">
        </div>
    </section>

    <!-- Edukasi Section -->
    <section class="edukasi" id="education">
        <div class="container">
            <h2>Edukasi</h2>
            <div class="edukasi-content">
                <!-- YouTube Videos Column -->
                <div class="videos">
                    <iframe width="100%" height="200"
                        src="https://www.youtube.com/embed/CGd3lgxReFE?si=PQcQwqIBqlXck-sk" frameborder="0"
                        allowfullscreen></iframe>
                    <iframe width="100%" height="200"
                        src="https://www.youtube.com/embed/tVuNnac7m0o?si=8BXMPF2HpikRQSFR" frameborder="0"
                        allowfullscreen></iframe>
                    <iframe width="100%" height="200"
                        src="https://www.youtube.com/embed/nrANKUUHBf0?si=EoLh5lahJMwH6GrC" frameborder="0"
                        allowfullscreen></iframe>
                    <iframe width="100%" height="200"
                        src="https://www.youtube.com/embed/v4x-i8wWUAQ?si=S5om-ans3XL-VdKF" frameborder="0"
                        allowfullscreen></iframe>
                </div>
                <!-- Posters Column -->
                <div class="posters">
                    <img src="/images/poster1.jpg" alt="Edukasi Poster 1" class="poster">
                    <img src="/images/poster2.jpg" alt="Edukasi Poster 2" class="poster">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
    <div class="about-bg"></div>
        <div class="container">
            <h2>Tentang Bank Sampah Gedangsewu</h2>
            <p>
                Bank Sampah Gedangsewu adalah inisiatif yang berdiri sejak tahun 2020 di Desa Gedangsewu. Kami bertujuan
                mengelola sampah secara bijak dan mendidik masyarakat tentang daur ulang, serta memberikan solusi
                ekonomi
                berkelanjutan melalui pemanfaatan limbah. Dengan kolaborasi warga, kami berhasil menciptakan lingkungan
                yang lebih bersih, sehat, dan ekonomis. Bergabunglah dengan kami dalam mewujudkan bumi yang lebih baik!
            </p>
            <h3>Kontak Kami:</h3>
            <div class="contact-info">
                <div class="contact-item">
                    <img src="/images/iconhp.png" alt="Telepon">
                    <span>Telepon: 081217348230</span>
                </div>
                <div class="contact-item">
                    <img src="/images/iconemail.png" alt="Email">
                    <span>Email: banksampahgsewu77@gmail.com</span>
                </div>
                <div class="contact-item">
                    <img src="/images/iconweb.png" alt="Website">
                    <span>Website: banksampahgedangsewu.com</span>
                </div>
                <div class="contact-item">
                    <img src="/images/iconalamat.png" alt="Alamat">
                    <span>Alamat: Gedangsewu, Tulungagung, Jawa Timur</span>
                </div>
            </div>
        </div>
    </section>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

</body>

</html>