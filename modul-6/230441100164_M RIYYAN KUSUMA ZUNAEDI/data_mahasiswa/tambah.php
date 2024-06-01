<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['Nama'];
    $nim = $_POST['NIM'];
    $umur = $_POST['Umur'];
    $jenis_kelamin = $_POST['Jenis_Kelamin'];
    $prodi = $_POST['Prodi'];
    $jurusan = $_POST['Jurusan'];
    $asal_kota = $_POST['Asal_kota'];
    mysqli_query($koneksi, "INSERT INTO mahasiswa (Nama, NIM, Umur, Jenis_kelamin, Prodi, Jurusan, Asal_kota) VALUES('$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')");
    header("location:datamhs.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            var nama = document.getElementById("Nama").value;
            var nim = document.getElementById("NIM").value;
            var umur = document.getElementById("Umur").value;
            var prodi = document.getElementById("Prodi").value;
            var jurusan = document.getElementById("Jurusan").value;
            var asal_kota = document.getElementById("Asal_kota").value;
            if (nama === "" || nim === "" || umur === "" || prodi === "" || jurusan === "" || asal_kota === "") {
                alert("Semua field harus diisi!");
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Form Tambah Data Mahasiswa</h2>
        <form method="POST" action="" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="Nama">Nama:</label>
                <input type="text" id="Nama" name="Nama">
            </div>  
            <div class="form-group">
                <label for="NIM">NIM:</label>
                <input type="text" id="NIM" name="NIM">
            </div>
            <div class="form-group">
                <label for="Umur">Umur:</label>
                <input type="text" id="Umur" name="Umur">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <input type="radio" name="Jenis_Kelamin" value="Laki-laki"> Laki-laki
                <input type="radio" name="Jenis_Kelamin" value="Perempuan"> Perempuan
            </div>
            <div class="form-group">
                <label for="Prodi">Prodi:</label>
                <input type="text" id="Prodi" name="Prodi">
            </div>
            <div class="form-group">
                <label for="Jurusan">Jurusan:</label>
                <input type="text" id="Jurusan" name="Jurusan">
            </div>
            <div class="form-group">
                <label for="Asal_kota">Asal Kota:</label>
                <input type="text" id="Asal_kota" name="Asal_kota">
            </div>
            <div class="form-group button-container">
                <input type="submit" value="Submit">
            </div> 
            
        </form>
    </div>
</body>
</html>
