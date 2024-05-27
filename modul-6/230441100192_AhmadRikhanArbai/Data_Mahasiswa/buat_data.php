<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data Mahasiswa</title>
    <link rel="stylesheet" href="Buat.css">
</head>
<body>
    <h2>Tambah Data</h2>
    <?php
    include "koneksi.php";
    
    if(isset($_POST['Nama'])){
        $nama = $_POST['Nama'];
        $nim = $_POST['Nim'];
        $umur = $_POST['Umur'];
        $jenis_kelamin = $_POST['Jenis_Kelamin'];
        $prodi = $_POST['Prodi'];
        $jurusan = $_POST['Jurusan'];
        $asal_kota = $_POST['Asal_Kota'];
        $angkatan = $_POST['Angkatan'];

        if ($nama == "" || $nim == "" || $umur == "" || $jenis_kelamin == "" || $prodi == "" || $jurusan == ""|| $asal_kota == "" || $angkatan == "") {
            echo '<script>alert("Data Tidak Boleh Kosong");</script>';
        }else{
            $query = mysqli_query($koneksi, "INSERT into data_mahasiswa (nama,nim,umur,jenis_kelamin,prodi,jurusan,asal_kota,angkatan) values('$nama','$nim','$umur','$jenis_kelamin','$prodi','$jurusan','$asal_kota','$angkatan')");
            if($query){
                echo '<script>alert("Tambah Data Berhasil");</script>';
            }else{
                echo '<script>alert("Tambah Data Gagal");</script>';
            }
        }
    }
    ?>
    <form method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr>
                <td>Nim</td>
                <td><input type="text" name="Nim"></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="text" name="Umur"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="Jenis_Kelamin">
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type="text" name="Prodi"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="Jurusan"></td>
            </tr>
            <tr>
                <td>Asal Kota</td>
                <td><textarea name="Asal_Kota"></textarea></td>
            </tr>
            <tr>
                <td>Angkatan</td>
                <td><input type="text" name="Angkatan"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Simpan</button>
                    <button type="reset">Reset</button>
                    <a href="index.php">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>