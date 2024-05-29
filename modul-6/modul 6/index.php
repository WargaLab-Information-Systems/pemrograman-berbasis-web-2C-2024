<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>database</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Biodata Mahasiswa</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data Baru</a>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                //table
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Prodi</th>
                    <th>Jurusan</th>
                    <th>Asal Kota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                //mengkoneksikan file php lain
                include "koneksi.php";
                // <!-- membuat variabel $i untuk data yang berurut -->
                $i = 1;
                // select menampilkan data dari data terbesar ke yg terkecil
                $query = mysqli_query($koneksi, "SELECT * FROM biodata ORDER BY nim ASC");
                while ($data = mysqli_fetch_array($query)) {
                 // akan mengulang selama banyak data yang didapat
                ?>
                <tr>
                    <!-- menampilkan id-nya dam judul kolomnya -->
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['nim']; ?></td>
                    <td><?php echo $data['umur']; ?></td>
                    <td><?php echo $data['jenis_kelamin']; ?></td>
                    <td><?php echo $data['prodi']; ?></td>
                    <td><?php echo $data['jurusan']; ?></td>
                    <td><?php echo $data['asal_kota']; ?></td>
                    <td>
                        <!-- //mengkoneksian link halaman ubah  -->
                        <a href="Ubah.php?id=<?php echo $data['id_mahasiswa']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                        <!-- //mengkoneksian link halaman hapus  -->
                        <a onclick="return confirm('Apakah Anda Yakin Menghapus Data ini?')" href="Hapus.php?id=<?php echo $data['id_mahasiswa']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php
                    // untuk data berurutan
                    $i++;
                    // mengakhiri perulangan
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
