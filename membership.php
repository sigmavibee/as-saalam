<?php
header("Content-Type: text/html; charset=UTF-8");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>As Salaam</title>
    <link rel="icon" href="assets/images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="style-form.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="cover-background">
                <img alt="As Salaam Logo" height="100" src="assets/images/logo.png" width="228" />
                <h1>LET'S GET WET!</h1>
                <div class="features">
                    <li>Kursus renang di kolam dengan standar Olympic</li>
                    <li>Pelatih berpengalaman dan bersertifikasi internasional</li>
                    <li>Menggunakan kurikulum aquatic yang telah teruji</li>
                </div>
            </div>
        </div>
    </header>

    <!-- The Popup -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <!-- Navigation arrows -->
            <button class="close-popup">&times;</button>
            <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
            <a class="next" onclick="changeSlide(1)">&#10095;</a>

            <!-- Slideshow images -->
            <?php include 'images.php'; ?>

            <!-- Info button -->
            <a href="https://wa.me/+6288902872779" class="popup-button-ads">Info Lebih Lanjut</a>
        </div>
    </div>

    <script async src="popup.js"></script>

    <main class="main">
        <div class="form-container">
            <h2>Isi Data Diri untuk Daftar Membership</h2>
            <form>
                <label for="name">Nama</label>
                <input placeholder="Nama Anda" type="text" id="name" />
                <label for="phone">No. Handphone</label>
                <input placeholder="No. Handphone" type="text" id="phone" />
                <label for="email">Email</label>
                <input placeholder="Email Anda" type="email" id="email" />
                <div class="checkbox-group">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    <p for="newsletter" class="checkbox-label">Berlangganan Newsletter</p>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="privacy" name="privacy" required>
                    <p for="privacy" class="checkbox-label">Saya sudah baca dan setuju dengan kebijakan data privasi</p>
                </div>
                <button class="btn-submit" type="submit">DAFTAR</button>
            </form>
        </div>
    </main>

    <footer>
        <div class="category-container">
            <div class="category-foot" id="get-wet">
                <div class="category-header">
                    <div class="category-icon">
                        <img alt="Icon Get Wet" src="assets/images/getwet.png" width="48" />
                    </div>
                    <h2>GET WET !</h2>
                </div>
                <div class="category-info">
                    <p>Membership</p>
                    <p>Kelas</p>
                    <p>Personal Training</p>
                    <!-- <p>Unduh Aplikasi</p> -->
                </div>
            </div>

            <div class="category-foot" id="jump-with-us">
                <div class="category-header">
                    <div class="category-icon">
                        <img alt="Icon Jump With Us" src="assets/images/jumpwithus.png" width="48" />
                    </div>
                    <h2>JUMP WITH US </h2>
                </div>
                <div class="category-info">
                    <p>Jadwal</p>
                    <p>Lokasi</p>
                    <p>Fasilitas</p>
                </div>
            </div>
        </div>

        <div class="category-container">
            <div class="category-foot" id="kemitraan">
                <div class="category-header">
                    <div class="category-icon">
                        <img alt="Icon Kemitraan" src="assets/images/kemitraan.png" width="48" />
                    </div>
                    <h2>KEMITRAAN</h2>
                </div>
                <div class="category-info">
                    <p>Kolaborasi Brand / Company</p>
                    <p>Korporasi Membership</p>
                    <p>Pengen Buka Kolam Renang?</p>
                </div>
            </div>
            <div class="category-foot" id="tentang-kami">
                <div class="category-header">
                    <div class="category-icon">
                        <img alt="Icon Tentang Kami" src="assets/images/tentangkami.png" width="48" />
                    </div>
                    <h2>TENTANG KAMI</h2>
                </div>
                <div class="category-info">
                    <p>Stadium Profile</p>
                    <p>FAQ</p>
                    <p>Syarat dan Ketentuan</p>
                    <!-- <p>Unduh Aplikasi</p> -->
                </div>
            </div>
        </div>
        <div class="contact-section">
            <div class="category-foot">
                <div class="category-header">
                    <div class="category-icon">
                        <img alt="Icon Kemitraan" src="assets/images/layanankonsumen.png" width="48" />
                    </div>
                    <h2>LAYANAN OPERASIONAL</h2>
                </div>
                <div class="contact-info">
                    <p>Assalaam Olympic Pool Stadium</p>
                    <p>Kawasan Assalaam Barat</p>
                    <p>Jalan Garuda Mas, Mendungan, Pabelan</p>
                    <p>Kecamatan Kartasura, Kabupaten Sukoharjo</p>
                    <p> 57102, Jawa Tengah</p>
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d988.7992424215381!2d110.76885749587885!3d-7.553489342568874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a153e97b63dd1%3A0xb40c0455dce2c638!2sAssalaam%20Olympic%20Pool%20Stadium!5e0!3m2!1sid!2sid!4v1737697423609!5m2!1sid!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <h3>WhatsApp:</h3>
                    <p>0889 - 0287 - 2779</p>
                    <h3>Email:</h3>
                    <p>assalaamolympicpool@gmail.com</p>
                    <h3>Instagram:</h3>
                    <p><a href="https://www.instagram.com/assalaamolympicpool"
                            style="color: white;">@assalaamolympicpool</a></p>
                </div>
                <div class="find-us">
                    <div class="category-foot">
                        <div class="category-header">
                            <div class="category-icon">
                                <img alt="Icon Kemitraan" src="assets/images/findus.png" width="48" />
                            </div>
                            <h2>FIND US</h2>
                        </div>
                        <p><i class="fas fa-envelope"></i><a href="mailto:assalaamolympicpool@gmail.com" target="_blank"
                                rel="noopener noreferrer">assalaamolympicpool@gmail.com</p>
                        <p><i class="fab fa-facebook"></i> -</p>
                        <p><i class="fab fa-instagram"></i> <a href="https://www.instagram.com/assalaamolympicpool/"
                                target="_blank" rel="noopener noreferrer">@assalaamolympicpool</a></p>
                        <p><i class="fab fa-tiktok"></i> -</p>
                    </div>
                </div>
    </footer></body>

</html>