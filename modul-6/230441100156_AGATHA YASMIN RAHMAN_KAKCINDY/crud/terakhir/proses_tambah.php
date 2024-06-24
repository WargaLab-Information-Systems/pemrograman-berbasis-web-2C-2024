<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];

    // Debugging: Tambahkan log untuk memeriksa nilai variabel
    error_log("Nama: $nama");
    error_log("NIM: $nim");
    error_log("Umur: $umur");
    error_log("Jenis Kelamin: $jenis_kelamin");
    error_log("Prodi: $prodi");
    error_log("Jurusan: $jurusan");
    error_log("Asal Kota: $asal_kota");

    $sql = "INSERT INTO mahasiswa (nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota)
            VALUES ('$nama', '$nim', $umur, '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data mahasiswa berhasil ditambahkan'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
