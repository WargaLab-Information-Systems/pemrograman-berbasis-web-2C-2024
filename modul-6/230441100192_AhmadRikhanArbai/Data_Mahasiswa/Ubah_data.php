<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data Mahasiswa</title>
    <link rel="stylesheet" href="Buat.css">
</head>
<body>
    <h2>Ubah Data</h2>
    <?php
    include "koneksi.php";

    $id = $_GET['id'];

    
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
            $query = mysqli_query($koneksi, "UPDATE data_mahasiswa SET Nama='$nama',Nim='$nim',Umur='$umur',Jenis_Kelamin='$jenis_kelamin',Prodi='$prodi',Jurusan='$jurusan',Asal_Kota='$asal_kota',Angkatan='$angkatan' WHERE id_mahasiswa=$id");
            if($query){
                echo '<script>alert("Ubah Data Berhasil");</script>';
            }else{
                echo '<script>alert("Ubah Data Gagal");</script>';
            }
        }
    }

    $query = mysqli_query($koneksi, "SELECT * FROM data_mahasiswa WHERE id_mahasiswa = $id");
    $data = mysqli_fetch_array($query);
    ?>
        <form method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama" value="<?php echo $data['Nama']; ?>"></td>
            </tr>
            <tr>
                <td>Nim</td>
                <td><input type="text" name="Nim" value="<?php echo $data['Nim']; ?>"></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="text" name="Umur" value="<?php echo $data['Umur']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="Jenis_Kelamin">
                        <option <?php if ($data['Jenis_Kelamin']== "Laki-Laki") echo 'selected'; ?>>Laki-Laki</option>
                        <option <?php if ($data['Jenis_Kelamin']== "Perempuan") echo 'selected'; ?>>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type="text" name="Prodi" value="<?php echo $data['Prodi']; ?>"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="Jurusan" value="<?php echo $data['Jurusan']; ?>"></td>
            </tr>
            <tr>
                <td>Asal Kota</td>
                <td><textarea name="Asal_Kota"><?php echo $data['Asal_Kota']; ?></textarea></td>
            </tr>
            <tr>
                <td>Angkatan</td>
                <td><input type="text" name="Angkatan" value="<?php echo $data['Angkatan']; ?>"></td>
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