<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil aksi yang dipilih (add, update, atau delete)
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

    // Fungsi untuk menambah gambar baru
    if ($action === 'add') {
        // Ambil folder tujuan dari input admin
        $target_dir = filter_input(INPUT_POST, 'targetDirectory', FILTER_SANITIZE_STRING);
        $uploadOk = 1; // Flag untuk menandai apakah upload boleh dilakukan

        // Ambil nama file dan bersihkan dari karakter khusus
        $filename = basename($_FILES["file"]["name"]);
        $filename = preg_replace("/[^a-zA-Z0-9\.]/", "_", $filename);

        // Buat nama file unik dengan menambahkan timestamp
        $filename = time() . "_" . $filename;

        // Path lengkap file tujuan
        $target_file = $target_dir . $filename;

        // Cek apakah file adalah gambar
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowed_types)) {
            echo "Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.";
            $uploadOk = 0;
        }

        // Cek ukuran file (maksimal 5MB)
        if ($_FILES["file"]["size"] > 5000000) {
            echo "File terlalu besar. Maksimal ukuran file adalah 5MB.";
            $uploadOk = 0;
        }

        // Upload file jika semua kondisi terpenuhi
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "Gambar berhasil ditambahkan.";
                header("Refresh: 2; URL=index.php"); // Redirect setelah 2 detik
                exit;
            } else {
                echo "Terjadi kesalahan saat mengupload gambar.";
            }
        }
    }

    // Fungsi untuk mengupdate gambar yang sudah ada
    elseif ($action === 'update') {
        // Ambil folder dan file yang dipilih
        $target_dir = filter_input(INPUT_POST, 'targetDirectoryUpdateDelete', FILTER_SANITIZE_STRING);
        $existingFile = filter_input(INPUT_POST, 'existingFile', FILTER_SANITIZE_STRING);

        // Path lengkap file yang akan ditimpa
        $target_file = $target_dir . $existingFile;

        // Jika file yang dipilih tidak ditemukan
        if (!file_exists($target_file)) {
            echo "File yang dipilih tidak ditemukan.";
            exit;
        }

        // Cek apakah file yang diupload adalah gambar
        $imageFileType = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
        $allowed_types = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowed_types)) {
            echo "Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.";
            exit;
        }

        // Cek ukuran file (maksimal 5MB)
        if ($_FILES["file"]["size"] > 5000000) {
            echo "File terlalu besar. Maksimal ukuran file adalah 5MB.";
            exit;
        }

        // Upload file dan timpa file yang sudah ada
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "Gambar berhasil diupdate.";
            header("Refresh: 2; URL=index.php"); // Redirect setelah 2 detik
            exit;
        } else {
            echo "Terjadi kesalahan saat mengupload gambar.";
        }
    }

    // Fungsi untuk menghapus gambar
    elseif ($action === 'delete') {
        // Ambil folder dan file yang dipilih
        $target_dir = filter_input(INPUT_POST, 'targetDirectoryUpdateDelete', FILTER_SANITIZE_STRING);
        $existingFile = filter_input(INPUT_POST, 'existingFile', FILTER_SANITIZE_STRING);

        // Path lengkap file yang akan dihapus
        $target_file = $target_dir . $existingFile;

        // Jika file yang dipilih tidak ditemukan
        if (!file_exists($target_file)) {
            echo "File yang dipilih tidak ditemukan.";
            exit;
        }

        // Hapus file
        if (unlink($target_file)) {
            echo "Gambar berhasil dihapus.";
            header("Refresh: 2; URL=index.php"); // Redirect setelah 2 detik
            exit;
        } else {
            echo "Terjadi kesalahan saat menghapus gambar.";
        }
    }
}
?>