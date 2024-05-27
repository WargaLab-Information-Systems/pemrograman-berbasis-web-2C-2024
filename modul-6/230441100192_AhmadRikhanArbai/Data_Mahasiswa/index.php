<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>DATA MAHASISWA</h2>
    <a href="buat_data.php">Tambah Data Baru</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Asal Kota</th>
            <th>Angkatan</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM data_mahasiswa ORDER BY nama ASC" );
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
        <td><?php echo $i ; ?></td>
        <td><?php echo $data['Nama'] ; ?></td>
        <td><?php echo $data['Nim'] ; ?></td>
        <td><?php echo $data['Umur'] ; ?></td>
        <td><?php echo $data['Jenis_Kelamin'] ; ?></td>
        <td><?php echo $data['Prodi'] ; ?></td>
        <td><?php echo $data['Jurusan'] ; ?></td>
        <td><?php echo $data['Asal_Kota'] ; ?></td>
        <td><?php echo $data['Angkatan'] ; ?></td>
        <td>
            <a href="Ubah_data.php?id=<?php echo $data['id_mahasiswa']; ?>">Ubah</a>|
            <a onclick="return confirm('Apakah Anda Yakin Menghapus Data ini?')" href="Hapus_data.php?id=<?php echo $data['id_mahasiswa']; ?>">Hapus</a>
        </td>
        </tr>
        <?php
        $i++;
            }
        ?>
    </table>
    
</body>
</html>