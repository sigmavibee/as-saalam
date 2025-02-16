<?php
if (isset($_GET['folder'])) {
    $folder = $_GET['folder'];
    $files = glob($folder . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
    $files = array_map('basename', $files); // Ambil nama file saja
    echo json_encode($files);
} else {
    echo json_encode([]);
}
?>