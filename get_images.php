<?php
// Daftar folder yang diperbolehkan
$allowedDirectories = [
    "freetrial" => "assets/images/freetrial/",
    "membership" => "assets/images/membership/",
    "swimschool" => "assets/images/swimschool/"
];

// Ambil parameter `page` dari URL
$page = isset($_GET['page']) ? $_GET['page'] : '';

// Periksa apakah parameter sesuai dengan folder yang diperbolehkan
if (array_key_exists($page, $allowedDirectories)) {
    $dir = $allowedDirectories[$page];
    
    // Ambil semua gambar dengan ekstensi tertentu dalam folder
    $files = glob($dir . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
    
    // Ubah menjadi JSON agar bisa digunakan di JavaScript
    echo json_encode($files);
} else {
    // Jika parameter tidak valid, kirim array kosong
    echo json_encode([]);
}
?>