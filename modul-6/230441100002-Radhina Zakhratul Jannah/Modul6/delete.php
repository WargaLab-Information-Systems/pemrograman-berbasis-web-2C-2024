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
    // Menyusun query untuk menghapus data mahasiswa berdasarkan id
    $sql = "DELETE FROM mahasiswa WHERE id=$id";

    // Menjalankan query dan memeriksa apakah berhasil
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus. <a href='tampilan.php'>Lihat Data</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Menutup koneksi ke database
$conn->close();
?>
