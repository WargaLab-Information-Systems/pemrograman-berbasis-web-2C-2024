<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <br>
    <a href="tambah.php">Tambah Data Mahasiswa</a><br><br>

    <table>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>NIM</td>
            <td>Umur</td>
            <td>Jenis Kelamin</td>
            <td>Prodi</td>
            <td>Jurusan</td>
            <td>Asal Kota</td>
            <td>Pilihan</td>
        </tr>

        <?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"SELECT * FROM data_mhs");
        // mengulangi proses pengambilan data setiap baris data dan menampilkannya
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama']; ?></td>
				<td><?php echo $d['nim']; ?></td>
				<td><?php echo $d['umur']; ?></td>
                <td><?php echo $d['jenis_kelamin']; ?></td>
                <td><?php echo $d['prodi']; ?></td>
                <td><?php echo $d['jurusan']; ?></td>
                <td><?php echo $d['asal_kota']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $d['id']; ?>">Edit</a>
					<a href="hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
				</td>
			</tr>
			<?php 
		}
		?>
    </table>  
</body>
</html>