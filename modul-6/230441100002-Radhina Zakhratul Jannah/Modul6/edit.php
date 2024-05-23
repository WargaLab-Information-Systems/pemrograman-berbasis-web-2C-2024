<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahasiswa_db";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah ada parameter 'id' yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Mengambil data mahasiswa berdasarkan id
    $sql = "SELECT * FROM mahasiswa WHERE id=$id";
    $result = $conn->query($sql);

    // Memeriksa apakah data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
}

// Memeriksa apakah form dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $umur = $_POST["umur"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $prodi = $_POST["prodi"];
    $jurusan = $_POST["jurusan"];
    $asal_kota = $_POST["asal_kota"];

    // Mengupdate data mahasiswa berdasarkan id
    $sql = "UPDATE mahasiswa SET 
            nama='$nama', 
            nim='$nim', 
            umur=$umur, 
            jenis_kelamin='$jenis_kelamin', 
            prodi='$prodi', 
            jurusan='$jurusan', 
            asal_kota='$asal_kota' 
            WHERE id=$id";

    // Menjalankan query dan memeriksa apakah berhasil
    if ($conn->query($sql) === TRUE) {
        header("Location: tampilan.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi ke database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <form action="edit.php" method="post">
        <!-- Input tersembunyi untuk menyimpan id mahasiswa -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
        
        <!-- Input untuk Nama -->
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required><br>
        
        <!-- Input untuk NIM -->
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php echo htmlspecialchars($row['nim']); ?>" required><br>
        
        <!-- Input untuk Umur -->
        <label for="umur">Umur:</label>
        <input type="number" id="umur" name="umur" value="<?php echo htmlspecialchars($row['umur']); ?>" required><br>
        
        <!-- Dropdown untuk Jenis Kelamin -->
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki" <?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="Perempuan" <?php echo ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
        </select><br>
        
        <!-- Input untuk Prodi -->
        <label for="prodi">Prodi:</label>
        <input type="text" id="prodi" name="prodi" value="<?php echo htmlspecialchars($row['prodi']); ?>" required><br>
        
        <!-- Input untuk Jurusan -->
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo htmlspecialchars($row['jurusan']); ?>" required><br>
        
        <!-- Input untuk Asal Kota -->
        <label for="asal_kota">Asal Kota:</label>
        <input type="text" id="asal_kota" name="asal_kota" value="<?php echo htmlspecialchars($row['asal_kota']); ?>" required><br>
        
        <!-- Tombol untuk submit form -->
        <input type="submit" value="Update">
    </form>
</body>
</html>
