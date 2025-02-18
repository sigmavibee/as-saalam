<?php
session_start();
session_destroy(); // Hancurkan session
header("location: index.php"); // Arahkan kembali ke halaman login
exit();
?>