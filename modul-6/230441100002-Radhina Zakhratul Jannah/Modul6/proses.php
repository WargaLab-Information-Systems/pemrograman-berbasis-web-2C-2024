<?php
// Menyimpan detail koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahasiswa_db";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    // Jika koneksi gagal, hentikan script dan tampilkan pesan error
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah form dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form dan menyimpannya dalam variabel
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $umur = $_POST["umur"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $prodi = $_POST["prodi"];
    $jurusan = $_POST["jurusan"];
    $asal_kota = $_POST["asal_kota"];

    // Menyusun perintah SQL untuk memasukkan data ke tabel mahasiswa
    $sql = "INSERT INTO mahasiswa (nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota)
    VALUES ('$nama', '$nim', $umur, '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')";

    // Menjalankan perintah SQL dan memeriksa apakah berhasil
    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, redirect ke tampilan.php
        header("Location: tampilan.php");
        exit();
    } else {
        // Jika gagal, menampilkan pesan error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi ke database
$conn->close();
?>
