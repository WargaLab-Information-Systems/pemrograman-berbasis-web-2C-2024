<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    body {
    background-color: #2874A6s; /* Gunakan kode warna hex untuk biru tua */
}

</style>
<body>
    <div class="container mt-5">
        <h2>Data Mahasiswa</h2>
        <table class="table table-bordered table-primary">
            <thead class="thead-dark">
                <tr>
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
                include 'koneksi.php';

                $sql = "SELECT * FROM mahasiswa";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['nim'] . "</td>";
                        echo "<td>" . $row['umur'] . "</td>";
                        echo "<td>" . $row['jenis_kelamin'] . "</td>";
                        echo "<td>" . $row['prodi'] . "</td>";
                        echo "<td>" . $row['jurusan'] . "</td>";
                        echo "<td>" . $row['asal_kota'] . "</td>";
                        echo "<td>
                                <a href='ubah.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Ubah</a>
                                <a href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data mahasiswa</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <a href="view.php" class="btn btn-success">lihat data</a>
        <a href="tambah.php" class="btn btn-success">Tambah Data Mahasiswa</a>
    </div>
</body>
</html>
