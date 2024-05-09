<?php
session_start();
include ("services/database.php");

$nim = "";
$nama = "";
$alamat = "";
$prodi = "";
$angkatan = "";
$eror = "";
$sukses = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from daftar_mahasiswa where id = '$id'";
    $q1 = mysqli_query($db, $sql1);
    if ($q1) {
        $sukses = "Data Anda Telah Berhasil Terhapus";
    } else {
        $eror = "Gagal melakukan delete data";
    }
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from daftar_mahasiswa where id ='$id'";
    $q1 = mysqli_query($db, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nim = $r1['nim'];
    $nama = $r1['nama'];
    $alamat = $r1['alamat'];
    $prodi = $r1['prodi'];
    $angkatan = $r1['angkatan'];

    if ($nim == '') {
        $eror = "Data Anda Tidak Ditemukan";
    }

}


if (isset($_POST["simpan"])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];


    if ($nim && $nama && $alamat && $prodi && $angkatan) {
        if ($op == 'edit') { //untuk update
            $sql1 = "update daftar_mahasiswa set nim = '$nim',nama='$nama',alamat = '$alamat',prodi='$prodi',angkatan='$angkatan' where id = '$id'";
            $q1 = mysqli_query($db, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $eror = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1 = "insert into daftar_mahasiswa(nim,nama,alamat,prodi,angkatan) values ('$nim','$nama','$alamat','$prodi','$angkatan')";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
        <!-- input data -->
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
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" value="<?php echo $nim ?>" name="nim">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" value="<?php echo $nama ?>" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" value="<?php echo $alamat ?>" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi</label>
                        <select class="form-control" name="prodi" id="prodi">
                            <option value="">- Pilih Prodi Anda -</option>
                            <option value="SISTEM INFORMASI" <?php if ($prodi == "si")
                                echo "selected" ?>>Sistem Informasi
                                </option>
                                <option value="TEKNIK INFORMATIKA" <?php if ($prodi == "informatika")
                                echo "selected" ?>>Teknik Informatika</option>
                                <option value="TEKNIK INDUSTRI" <?php if ($prodi == "industri")
                                echo "selected" ?>>Teknik Industri</option>
                                <option value="TEKNIK ELECTRO" <?php if ($prodi == "electro")
                                echo "selected" ?>>Teknik Electro</option>
                                <option value="TEKNIK MEKATRONIKA" <?php if ($prodi == "mekatro")
                                echo "selected" ?>>Teknik Mekatronika</option>
                                <option value="TEKNIK MESIN" <?php if ($prodi == "mesin")
                                echo "selected" ?>>Teknik Mesin
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="angkatan" class="form-label">Angkatan</label>
                            <input type="text" class="form-control" id="angkatan" value="<?php echo $angkatan ?>"
                            name="angkatan">
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="simpan data" class="btn btn-primary">
                    </div>


                </form>
            </div>
        </div>


        <!-- output data -->
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
                            <th scope="col">Action</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "select * from daftar_mahasiswa order by id desc";
                        $q2 = mysqli_query($db, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id = $r2['id'];
                            $nim = $r2['nim'];
                            $nama = $r2['nama'];
                            $alamat = $r2['alamat'];
                            $prodi = $r2['prodi'];
                            $angkatan = $r2['angkatan'];

                            ?>

                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nim ?></td>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $alamat ?></td>
                                <td scope="row"><?php echo $prodi ?></td>
                                <td scope="row"><?php echo $angkatan ?></td>
                                <td scope="row">
                                    <a href="tabel.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                            class="btn btn-info">Edit</button></a>

                                    <a href="tabel.php?op=delete&id=<?php echo $id ?>">

                                        <button type="button" class="btn btn-danger">Delete</button></a>

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
                <button type="submit" name="logout" class="btn btn-success">Back To Menu Page</button>
            </form>

            <form action="menu.php" method="POST" style="display: flex; flex-direction: column; margin-top: 10px;">
                <button type="submit" name="logout" class="btn btn-warning">logout</button>
            </form>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>