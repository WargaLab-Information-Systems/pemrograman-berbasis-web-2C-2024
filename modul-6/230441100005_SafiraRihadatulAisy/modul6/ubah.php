<?php
include 'koneksi.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Periksa apakah formulir telah diserahkan
    $id = $_POST['id'];// Ambil data formulir
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];
    
    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', umur='$umur', jenis_kelamin='$jenis_kelamin', prodi='$prodi', jurusan='$jurusan', asal_kota='$asal_kota' WHERE id='$id'";

    // Jalankan kueri pembaruan
    if (mysqli_query($sambungan, $sql)) {
        echo "Data berhasil diubah.";
        header("Location: data_mhs.php");
        exit; 
    } else {
        echo "Error updating record: " . mysqli_error($sambungan);
    }
    
    // Close database
    mysqli_close($sambungan);
}
?>
