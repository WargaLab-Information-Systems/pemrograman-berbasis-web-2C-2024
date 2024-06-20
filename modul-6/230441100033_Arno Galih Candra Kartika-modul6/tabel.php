<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Sistem Informasi Mahasiswa</h1>
    </header>
    <main class="container mt-5">
        <div class="card shadow-lg mx-auto" style="max-width: 900px;">
            <div class="card-header bg-gradient-primary text-white text-center">
                <h2>Data Mahasiswa</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
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
                        $sql = "SELECT * FROM data_mahasiswa";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['nama']}</td>
                                        <td>{$row['nim']}</td>
                                        <td>{$row['umur']}</td>
                                        <td>{$row['jenis_kelamin']}</td>
                                        <td>{$row['prodi']}</td>
                                        <td>{$row['jurusan']}</td>
                                        <td>{$row['asal_kota']}</td>
                                        <td>
                                            <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                            <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>Tidak ada data.</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-info">Tambah Data</a>
            </div>
        </div>
    </main>
    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2024 Sistem Informasi Mahasiswa. All rights reserved.</p>
    </footer>
</body>
</html>
