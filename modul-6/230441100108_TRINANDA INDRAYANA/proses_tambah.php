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


    $check_sql = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $check_result = $conn->query($check_sql);

    
    if ($check_result->num_rows > 0) {
        echo "<script>alert('NIM sudah ada dalam database, data tidak dapat ditambahkan.'); window.location.href='index.php';</script>";
    } else {

        
        $sql = "INSERT INTO mahasiswa (nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota)
                VALUES ('$nama', '$nim', $umur, '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data mahasiswa berhasil ditambahkan'); window.location.href='index.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
