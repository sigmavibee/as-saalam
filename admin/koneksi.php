<?php
$servername = "dpg-cuqp8gdds78s7380m5gg-a";
$database = 'as_salam';
$username = 'root';
$password = '8V3KtV4IkR1MsvjPIyX1AtZ9qEpvmxBb';

try {
    // Membuat koneksi menggunakan PDO
    $conn = new PDO("pgsql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>