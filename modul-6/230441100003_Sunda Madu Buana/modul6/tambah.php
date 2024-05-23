<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Tambah Data Mahasiswa</h3>
    <a href="index.php">Kembali</a>
    <!-- mengirimkan data ke dalam file proses-tambah.php dengan metode post -->
    <form method="post" action="proses-tambah.php">
        <table>
            <tr>			
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><input type="number" name="nim"></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="number" name="umur"></td>
            </tr>
            <tr>
                <td>jenis Kelamin</td>
                <td><input type="text" name="jenis_kelamin"></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type="text" name="prodi"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan"></td>
            </tr>
            <tr>
                <td>Asal Kota</td>
                <td><input type="text" name="asal_kota"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Simpan"></td>
            </tr>	
        </table>
    </form>   
</body>
</html>