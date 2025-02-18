<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Gunakan prepared statements untuk menghindari SQL injection
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifikasi password
        session_start(); // Mulai session
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username; // Simpan username ke session
            header("location: dashboard.php");
            exit();
        } else {
            echo '<center>
                <h1>Username atau Password Salah</h1>
                <p>Silahkan login kembali.</p>
                <strong>
                    <button style="padding: 10px 20px; font-size: 16px;">
                        <a href="index.php" style="text-decoration: none; color: red;">Kembali ke Halaman Login</a>
                    </button>
                </strong>
              </center>';
        }
    } else {
        echo '<center>
            <h1>Username atau Password Salah</h1>
            <p>Silahkan login kembali.</p>
            <strong>
                <button style="padding: 10px 20px; font-size: 16px;">
                    <a href="index.php" style="text-decoration: none; color: red;">Kembali ke Halaman Login</a>
                </button>
            </strong>
          </center>';
    }

    $stmt->close();
}
?>