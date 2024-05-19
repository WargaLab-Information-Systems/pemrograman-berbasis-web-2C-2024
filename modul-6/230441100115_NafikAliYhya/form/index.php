<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "form";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { // cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

if (isset($_GET['op']) && $_GET['op'] == 'delete') {
    $id = $_GET['id'];
    $sql1 = "DELETE FROM datamhs WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal melakukan delete data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }
        body {
            background-color: rgba(99, 44, 227, 1);
        }
    </style>
</head>
<body>
    <div class="mx-auto">
        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                BIODATA
            </div>
            <div class="card-body">
                <?php if (isset($error) && $error): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($sukses) && $sukses): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php header("refresh:2;url=index.php"); ?>
                <?php endif; ?>
                <a href="form.php" class="btn btn-primary mb-3">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Asal Kota</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT * FROM datamhs ORDER BY id DESC";
                        $q2 = mysqli_query($koneksi, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id = $r2['id'];
                            $nama = $r2['nama'];
                            $nim = $r2['nim'];
                            $umur = $r2['umur'];
                            $gender = $r2['gender'];
                            $prodi = $r2['prodi'];
                            $jurusan = $r2['jurusan'];
                            $askot = $r2['askot'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td><?php echo $nama ?></td>
                                <td><?php echo $nim ?></td>
                                <td><?php echo $umur ?></td>
                                <td><?php echo $gender ?></td>
                                <td><?php echo $prodi ?></td>
                                <td><?php echo $jurusan ?></td>
                                <td><?php echo $askot ?></td>
                                <td>
                                    <a href="form.php?op=edit&id=<?php echo $id ?>" class="btn btn-warning">Edit</a>
                                    <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Yakin mau delete data?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
