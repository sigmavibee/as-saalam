<?php
session_start(); // Mulai session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Pengguna'; // Ambil username dari session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Gambar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Kelola Gambar</h1>
    <h2>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h2>

    <!-- Form untuk Add, Update, atau Delete -->
    <form action="manage_images.php" method="post" enctype="multipart/form-data">
        <!-- Pilih Aksi (Add, Update, atau Delete) -->
        <label for="action" style="display: block; margin-bottom: 10px;">Pilih Aksi:</label>
        <select name="action" id="action" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <option value="add">Tambah Gambar Baru</option>
            <option value="update">Update Gambar yang Sudah Ada</option>
            <option value="delete">Hapus Gambar</option>
        </select>
        <br>

        <!-- Input File (Hanya untuk Add dan Update) -->
        <div id="fileSection">
            <label for="file">Pilih Gambar:</label>
            <input type="file" name="file" id="file">
            <br>
        </div>

        <!-- Folder Tujuan (Hanya untuk Add) -->
        <div id="addSection">
            <label for="targetDirectory" style="display: block; margin-bottom: 10px;">Pilih Folder Tujuan:</label>
            <select name="targetDirectory" id="targetDirectory" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                <option value="../assets/images/fasilitas/">Fasilitas</option>
                <option value="../assets/images/freetrial/">Freetrial</option>
                <option value="../assets/images/jadwal/">Jadwal</option>
                <option value="../assets/images/kelas/">Kelas</option>
                <option value="../assets/images/lokasi/">Lokasi</option>
                <option value="../assets/images/membership/">Membership</option>
                <option value="../assets/images/personal_training/">Personal Training</option>
                <option value="../assets/images/stadium_profile/">Stadium Profile</option>
                <option value="../assets/images/swimschool/">Swimschool</option>
            </select>
            <br>
        </div>

        <!-- Pilih File yang Akan Ditimpa atau Dihapus (Hanya untuk Update dan Delete) -->
        <div id="updateDeleteSection" style="display: none; margin-top: 20px;">
            <label for="targetDirectoryUpdateDelete" style="display: block; margin-bottom: 10px;">Pilih Folder:</label>
            <select name="targetDirectoryUpdateDelete" id="targetDirectoryUpdateDelete" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <option value="../assets/images/fasilitas/">Fasilitas</option>
            <option value="../assets/images/freetrial/">Freetrial</option>
            <option value="../assets/images/jadwal/">Jadwal</option>
            <option value="../assets/images/kelas/">Kelas</option>
            <option value="../assets/images/lokasi/">Lokasi</option>
            <option value="../assets/images/membership/">Membership</option>
            <option value="../assets/images/personal_training/">Personal Training</option>
            <option value="../assets/images/stadium_profile/">Stadium Profile</option>
            <option value="../assets/images/swimschool/">Swimschool</option>
            </select>
            <br><br>

            <label for="existingFile" style="display: block; margin-bottom: 10px;">Pilih File:</label>
            <select name="existingFile" id="existingFile" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 10px;">
            <!-- Daftar file akan diisi oleh JavaScript -->
            </select>
            <br>
        </div>
        <button type="button" onclick="window.location.href='logout.php'">Logout</button>
                <!-- Tombol Submit -->
        <button type="submit">Proses</button>
    </form>

    <!-- JavaScript untuk Menampilkan/Menyembunyikan Section dan Mengisi Daftar File -->
    <script>
        document.getElementById('action').addEventListener('change', function () {
            var action = this.value;
            if (action === 'add') {
                document.getElementById('fileSection').style.display = 'block';
                document.getElementById('addSection').style.display = 'block';
                document.getElementById('updateDeleteSection').style.display = 'none';
            } else if (action === 'update' || action === 'delete') {
                document.getElementById('fileSection').style.display = (action === 'update') ? 'block' : 'none';
                document.getElementById('addSection').style.display = 'none';
                document.getElementById('updateDeleteSection').style.display = 'block';
                loadFiles(); // Memuat daftar file saat aksi diubah
            }
        });

        document.getElementById('targetDirectoryUpdateDelete').addEventListener('change', function () {
            loadFiles(); // Memuat daftar file saat folder diubah
        });

        // Fungsi untuk memuat daftar file
        function loadFiles() {
            var folder = document.getElementById('targetDirectoryUpdateDelete').value;
            fetch('get_files.php?folder=' + encodeURIComponent(folder))
                .then(response => response.json())
                .then(data => {
                    var select = document.getElementById('existingFile');
                    select.innerHTML = ''; // Kosongkan dropdown
                    data.forEach(file => {
                        var option = document.createElement('option');
                        option.value = file;
                        option.text = file;
                        select.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>

</html>