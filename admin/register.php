<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($password)) {
        echo '<center>
                <h1>Username dan Password tidak boleh kosong</h1>
                <strong>
                    <button style="padding: 10px 20px; font-size: 16px;">
                        <a href="register.php" style="text-decoration: none; color: white;">Kembali ke Halaman Registrasi</a>
                    </button>
                </strong>
              </center>';
        exit;
    }

    // Cek apakah username sudah ada
    $check_query = "SELECT * FROM admin WHERE username = '$username'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo '<center>
                <h1>Username sudah terdaftar</h1>
                <strong>
                    <button style="padding: 10px 20px; font-size: 16px;">
                        <a href="register.php" style="text-decoration: none; color: white;">Kembali ke Halaman Registrasi</a>
                    </button>
                </strong>
              </center>';
    } else {
        // Enkripsi password sebelum disimpan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan data ke database
        $insert_query = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";
        if (mysqli_query($conn, $insert_query)) {
            echo '<center>
                    <h1>Registrasi Berhasil</h1>
                    <p>Silahkan login dengan akun Anda.</p>
                    <strong>
                        <button style="padding: 10px 20px; font-size: 16px;">
                            <a href="index.php" style="text-decoration: none; color: white;">Kembali ke Halaman Login</a>
                        </button>
                    </strong>
                  </center>';
        } else {
            echo '<center>
                    <h1>Terjadi Kesalahan, Silahkan Coba Lagi</h1>
                    <strong>
                        <button style="padding: 10px 20px; font-size: 16px;">
                            <a href="register.php" style="text-decoration: none; color: white;">Kembali ke Halaman Registrasi</a>
                        </button>
                    </strong>
                  </center>';
        }
    }
}
?>

<!-- Form Registrasi -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <form method="POST" action="register.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="index.php">Login di sini</a></p>
</body>
</html>