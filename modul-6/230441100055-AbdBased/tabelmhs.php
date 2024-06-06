<?php
include "connect.php";

// Ambil data dari database
$data = mysqli_query($connect, "SELECT * FROM data_mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/230441100055-AbdBased1/css/tabel.css">
</head>
<body>
<div class="card">
    <center><h5 class="card-header">Data Mahasiswa</h5></center>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Fakultas</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Asal Kota</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $urut = 1;
                while ($r2 = mysqli_fetch_array($data)) {
                    $id = $r2['id'];
                    $nim = $r2['nim'];
                    $nama = $r2['nama'];
                    $umur = $r2['umur'];
                    $jenis_kelamin = $r2['jenis_kelamin'];
                    $fakultas = $r2['fakultas'];
                    $prodi = $r2['prodi'];
                    $asal_kota = $r2['asal_kota'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $urut++ ?></th>
                        <td><?php echo $nim ?></td>
                        <td><?php echo $nama ?></td>
                        <td><?php echo $umur ?></td>
                        <td><?php echo $jenis_kelamin ?></td>
                        <td><?php echo $fakultas ?></td>
                        <td><?php echo $prodi ?></td>
                        <td><?php echo $asal_kota ?></td>
                        <td>
                            <a href="formedit.php?id=<?php echo $id ?>"><button type="button" class="btn btn-info">Edit</button></a>
                            <a href="delete.php?id=<?php echo $id ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<center>
    <div class="btn-back">
        <form action="index.php" style="display: flex; flex-direction: column; margin-top: 10px;">
            <button type="submit" name="logout" class="btn btn-success">Back To Form</button>
        </form>
    </div>
</center>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
