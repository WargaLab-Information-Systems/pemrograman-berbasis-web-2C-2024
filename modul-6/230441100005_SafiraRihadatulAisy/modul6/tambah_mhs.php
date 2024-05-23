<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Tambah Data Mahasiswa</h2>
<form action="simpan.php" method="post">
    <p>
        Nama Mahasiswa : <br>
        <input type="text" name="nama" required="">
    </p>
    <p>
        NIM : <br>
        <input type="number" name="nim" required="">
    </p>
    <p>
        Umur : <br>
        <input type="text" name="umur" required="">
    </p>
    <p>
        Jenis Kelamin : <br>
        <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
    </p>
    <p>
        Prodi : <br>
        <input type="text" name="prodi" required="">
    </p>
    <p>
        Jurusan : <br>
        <input type="text" name="jurusan" required="">
    </p>
    <p>
        Asal Kota : <br>
        <input type="text" name="asal_kota" required="">
    </p>
    <p>
        <input type="submit" value="SIMPAN">
    </p>
</form>
</body>
</html>