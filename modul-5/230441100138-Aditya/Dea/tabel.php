<?php

session_start();
include ("data/database.php");

$Nim = "";
$Nama = "";
$Alamat = "";
$Prodi = "";
$Angkatan = "";
$eror = "";
$sukses = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $Id = $_GET['Id'];
    $sql1 = "delete from tabelmahasiswa where Id = '$Id'";
    $q1 = mysqli_query($db, $sql1);
    if ($q1) {
        $sukses = "Data Anda Telah Berhasil Terhapus";
    } else {
        $eror = "Gagal melakukan delete data";
    }
}

if ($op == 'edit') {
    $Id = $_GET['Id'];
    $sql1 = "select * from tabelmahasiswa where Id ='$Id'";
    $q1 = mysqli_query($db, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $Nim = $r1['Nim'];
    $Nama = $r1['Nama'];
    $Alamat = $r1['Alamat'];
    $Prodi = $r1['Prodi'];
    $Angkatan = $r1['Angkatan'];

    if ($Nim == '') {
        $eror = "Data Anda Tidak Ditemukan";
    }
}

if (isset($_POST["simpan"])) {
    $Nim = $_POST['Nim'];
    $Nama = $_POST['Nama'];
    $Alamat = $_POST['Alamat'];
    $Prodi = $_POST['Prodi'];
    $Angkatan = $_POST['Angkatan'];

    if ($Nim && $Nama && $Alamat && $Prodi && $Angkatan) {
        if ($op == 'edit') { //untuk update
            $sql1 = "update tabelmahasiswa set Nim = '$Nim',Nama='$Nama',Alamat = '$Alamat',Prodi='$Prodi',Angkatan='$Angkatan' where Id = '$Id'";
            $q1 = mysqli_query($db, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $eror = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1 = "insert into tabelmahasiswa(Nim,Nama,Alamat,Prodi,Angkatan) values ('$Nim','$Nama','$Alamat','$Prodi','$Angkatan')";
            $q1 = mysqli_query($db, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $eror = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 900px
        }

        .card {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="mx-auto ">
        <div class="card">
            <h5 class="card-header">Tambah / Edit Data Mahasiswa</h5>
            <div class="card-body">
                <?php
                if ($eror) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $eror ?>
                    </div>
                    <?php
                }
                ?>

                <?php
                if ($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php
                }
                ?>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="Nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" Id="Nim" value="<?php echo $Nim ?>" name="Nim">
                    </div>
                    <div class="mb-3">
                        <label for="Nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" Id="Nama" value="<?php echo $Nama ?>" name="Nama">
                    </div>
                    <div class="mb-3">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" Id="Alamat" value="<?php echo $Alamat ?>" name="Alamat">
                    </div>
                    <div class="mb-3">
                        <label for="Prodi" class="form-label">Prodi</label>
                        <select class="form-control" name="Prodi" Id="Prodi">
                            <option value="">- Pilih Prodi Anda -</option>
                            <option value="SISTEM INFORMASI" <?php if ($Prodi == "si")
                                echo "selected" ?>>Sistem Informasi
                                </option>
                                <option value="TEKNIK INFORMATIKA" <?php if ($Prodi == "informatika")
                                echo "selected" ?>>Teknik Informatika</option>
                                <option value="TEKNIK INDUSTRI" <?php if ($Prodi == "industri")
                                echo "selected" ?>>Teknik Industri</option>
                                <option value="TEKNIK ELECTRO" <?php if ($Prodi == "electro")
                                echo "selected" ?>>Teknik Electro</option>
                                <option value="TEKNIK MEKATRONIKA" <?php if ($Prodi == "mekatro")
                                echo "selected" ?>>Teknik Mekatronika</option>
                                <option value="TEKNIK MESIN" <?php if ($Prodi == "mesin")
                                echo "selected" ?>>Teknik Mesin
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Angkatan" class="form-label">Angkatan</label>
                            <input type="text" class="form-control" Id="Angkatan" value="<?php echo $Angkatan ?>" name="Angkatan">
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="simpan data" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header text-white bg-secondary">Daftar Mahasiswa</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">Pilihan</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "select * from tabelmahasiswa order by Id desc";
                        $q2 = mysqli_query($db, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $Id = $r2['Id'];
                            $Nim = $r2['Nim'];
                            $Nama = $r2['Nama'];
                            $Alamat = $r2['Alamat'];
                            $Prodi = $r2['Prodi'];
                            $Angkatan = $r2['Angkatan'];
                            ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $Nim ?></td>
                                <td scope="row"><?php echo $Nama ?></td>
                                <td scope="row"><?php echo $Alamat ?></td>
                                <td scope="row"><?php echo $Prodi ?></td>
                                <td scope="row"><?php echo $Angkatan ?></td>
                                <td scope="row">
                                    <a href="tabel.php?op=edit&Id=<?php echo $Id ?>"><button type="button"
                                            class="btn btn-warning">Ubah</button></a>
                                    <a href="tabel.php?op=delete&Id=<?php echo $Id ?>">
                                        <button type="button" class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="card mx-auto" style="width: 900px;">
        <div class="card-body mx-auto">
            <form action="menu.php" style="display: flex; flex-direction: column; margin-top: 10px;">
                <button type="submit" name="logout" class="btn btn-info">Kembali Ke Home</button>
            </form>

            <form action="menu.php" method="POST" style="display: flex; flex-direction: column; margin-top: 10px;">
                <button type="submit" name="logout" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>