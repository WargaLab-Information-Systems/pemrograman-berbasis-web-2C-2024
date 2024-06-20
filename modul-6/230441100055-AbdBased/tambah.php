<?php
include "connect.php";

// Ambil data dari POST
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$umur = $_POST['umur'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$fakultas = $_POST['fakultas'];
$prodi = $_POST['prodi'];
$asal_kota = $_POST['asal_kota'];

// Cek apakah NIM sudah ada di database
$check_query = "SELECT * FROM data_mahasiswa WHERE nim = '$nim'";
$result = mysqli_query($connect, $check_query);

// Jika NIM sudah ada, tampilkan pesan error
if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('NIM $nim sudah digunakan!'); window.location.href = 'index.php';</script>";
} else {
    // Jika NIM belum ada, lakukan INSERT
    $query = "INSERT INTO data_mahasiswa (nim, nama, umur, jenis_kelamin, fakultas, prodi, asal_kota) 
              VALUES ('$nim', '$nama', '$umur', '$jenis_kelamin', '$fakultas', '$prodi', '$asal_kota')";
    if (mysqli_query($connect, $query)) {
        echo "<script>window.location.href = 'tabelmhs.php'</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}
?>
