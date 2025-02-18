<?php
session_start();

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'assalam_database');

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password']; // Ambil password tanpa hashing

    // Query untuk mencari admin berdasarkan username
    $sql = "SELECT id, username, password FROM admin WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $row['password'])) { // Verifikasi password
            // Password cocok, buat session
            $_SESSION['login_user'] = $row['username'];
            header("location: dashboard.php"); // Redirect ke halaman dashboard
        } else {
            // Password tidak cocok
            $error = "Password salah!";
            header("location: index.php?error=" . urlencode($error));
        }
    } else {
        // Username tidak ditemukan
        $error = "Username tidak ditemukan!";
        header("location: index.php?error=" . urlencode($error));
    }
}

// Tutup koneksi
$conn->close();
?>