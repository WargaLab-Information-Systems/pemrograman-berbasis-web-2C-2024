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
<html>
<head>
    <title>Menambahkan data mahasiswa</title>
    <link rel="stylesheet" href="style5.css">
    <script>
        function validateForm() {
            var nama = document.getElementById("Nama").value;
            var nim = document.getElementById("NIM").value;
            var umur = document.getElementById("Umur").value;
            var prodi = document.getElementById("Prodi").value;
            var jurusan = document.getElementById("Jurusan").value;
            var asal_kota = document.getElementById("Asal_kota").value;
            if (nama === "" || nim === "" || umur === "" || prodi === "" || jurusan === "" || asal_kota === "") {
                alert("Harus di isi lengkap yaa :)");
                return false;
            }
        }
    </script>
</head>
<body>
    <center>
    <h2>Menambahkan data mahasiswa</h2>
    <form method="POST" action="" onsubmit="return validateForm()">
        <label>Nama:</label>
        <input type="text" id="Nama" name="Nama">
        <label>NIM:</label>
        <input type="text" id="NIM" name="NIM">
        <label>Umur:</label>
        <input type="text" id="Umur" name="Umur">
        <label>Jenis Kelamin:</label>
        <input type="radio" name="Jenis_Kelamin" value="Laki-laki"> Laki-laki
        <input type="radio" name="Jenis_Kelamin" value="Perempuan"> Perempuan
        <label>Prodi:</label>
        <input type="text" id="Prodi" name="Prodi">
        <label>Jurusan:</label>
        <input type="text" id="Jurusan" name="Jurusan">
        <label>Asal Kota:</label>
        <input type="text" id="Asal_kota" name="Asal_kota">
        <input type="submit" value="Submit">
        <a href="datamhs.php"><button type="button">KEMBALI</button></a>
    </form>
    
</body>
</html>
