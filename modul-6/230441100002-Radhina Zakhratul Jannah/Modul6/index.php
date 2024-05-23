<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Input Data Mahasiswa</h2>
    <form action="proses.php" method="post">
        <!-- Membuka form yang mengirim data ke proses.php dengan metode POST -->
        
        <!-- Label dan input untuk Nama -->
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br>
        
        <!-- Label dan input untuk NIM -->
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br>
        
        <!-- Label dan input untuk Umur -->
        <label for="umur">Umur:</label>
        <input type="number" id="umur" name="umur" required><br>
        
        <!-- Label dan pilihan dropdown untuk Jenis Kelamin -->
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br>
        
        <!-- Label dan input untuk Prodi -->
        <label for="prodi">Prodi:</label>
        <input type="text" id="prodi" name="prodi" required><br>
        
        <!-- Label dan input untuk Jurusan -->
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required><br>
        
        <!-- Label dan input untuk Asal Kota -->
        <label for="asal_kota">Asal Kota:</label>
        <input type="text" id="asal_kota" name="asal_kota" required><br>
        
        <!-- Tombol untuk submit form -->
        <input type="submit" value="Submit">
    </form>
    <!-- Link untuk melihat data mahasiswa yang sudah diinput -->
    <a href="tampilan.php">Lihat Data Mahasiswa</a>
</body>
</html>