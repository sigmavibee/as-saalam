<?php
$servername = "dpg-cuqp8gdds78s7380m5gg-a";
$database = 'as_salam';
$username = 'root';
$password = '8V3KtV4IkR1MsvjPIyX1AtZ9qEpvmxBb';

$conn =mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}
?>