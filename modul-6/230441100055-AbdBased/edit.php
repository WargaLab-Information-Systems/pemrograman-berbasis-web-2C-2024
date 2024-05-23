<?php
include "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM data_mahasiswa WHERE id='$id'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Data tidak ditemukan!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $fakultas = $_POST['fakultas'];
    $prodi = $_POST['prodi'];
    $asal_kota = $_POST['asal_kota'];

    $update_query = "UPDATE data_mahasiswa SET 
        nim='$nim', 
        nama='$nama', 
        umur='$umur', 
        jenis_kelamin='$jenis_kelamin', 
        fakultas='$fakultas', 
        prodi='$prodi', 
        asal_kota='$asal_kota' 
        WHERE id='$id'";

    if (mysqli_query($connect, $update_query)) {
        header("Location: tabelmhs.php");
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($connect);
    }
}
?>
