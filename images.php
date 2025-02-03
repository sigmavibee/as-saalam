<?php
$scriptName = basename($_SERVER['SCRIPT_NAME'], '.php');
$directory = 'assets/images/' . $scriptName . '/';
$images = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
foreach ($images as $image) {
    echo '<div class="popup-slide">';
    echo '<img src="' . $image . '" alt="Membership Image" width="400px">';
    echo '</div>';
}
?>