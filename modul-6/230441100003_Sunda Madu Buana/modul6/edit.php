<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h3>Edit Data Mahasiswa</h3>
    <a href="index.php">Kembali</a>

    <?php
	include 'koneksi.php';
    // mengambil nilai dri prmter id
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"SELECT * FROM data_mhs WHERE id='$id'");
    // mengambil setiap baris data dan menampilkannya
	while($d = mysqli_fetch_array($data)){
        ?>

        <form method="post" action="proses-edit.php">
            <table>
                <tr>			
                    <td>Nama</td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                        <input type="text" name="nama" value="<?php echo $d['nama']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td><input type="number" name="nim" value="<?php echo $d['nim']; ?>"></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td><input type="number" name="umur" value="<?php echo $d['umur']; ?>"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><input type="text" name="jenis_kelamin" value="<?php echo $d['jenis_kelamin']; ?>"></td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td><input type="text" name="prodi" value="<?php echo $d['prodi']; ?>"></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td><input type="text" name="jurusan" value="<?php echo $d['jurusan']; ?>"></td>
                </tr>
                <tr>
                    <td>Asal Kota</td>
                    <td><input type="text" name="asal_kota" value="<?php echo $d['asal_kota']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Ubah Data"></td>
                </tr>
            </table>
        </form>
        <?php
    }
    ?>

</body>
</html>