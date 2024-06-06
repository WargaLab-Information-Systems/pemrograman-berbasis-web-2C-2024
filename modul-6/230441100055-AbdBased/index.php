<?php
include "connect.php";

$nim = "";
$nama = "";
$umur = "";
$jenis_kelamin = "";
$fakultas = "";
$prodi = "";
$asal_kota = "";
$eror = "";
$sukses = "";

if (isset($_POST["simpan"])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $fakultas = $_POST['fakultas'];
    $prodi = $_POST['prodi'];
    $asal_kota = $_POST['asal_kota'];

    if ($nim && $nama && $umur && $jenis_kelamin && $fakultas && $prodi && $asal_kota) {
        //untuk insert
        $sql1 = "insert into data_mahasiswa(nim,nama,umur,jenis_kelamin,fakultas,prodi,asal_kota)
        values ('$nim','$nama','$umur','$jenis_kelamin','$fakultas', '$prodi', '$asal_kota')";
        $q1 = mysqli_query($connect, $sql1);
        if ($q1) {
            $sukses = "Berhasil memasukkan data baru";
        } else {
            $eror = "Gagal memasukkan data";
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
    <link rel="stylesheet" href="/230441100055-AbdBased1/css/style.css">

    <style>
        .mx-auto {
            width: 700px
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
            <center><h5 class="card-header">Data Mahasiswa</h5></center>
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
                <form action="tambah.php" method="POST">
                    <div class="mb-1">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" value="<?php echo $nim ?>" name="nim">
                    </div>
                    <div class="mb-1">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" value="<?php echo $nama ?>" name="nama">
                    </div>
                    <div class="mb-1">
                        <label for="nama" class="form-label">Umur</label>
                        <input type="text" class="form-control" id="umur" value="<?php echo $umur ?>" name="umur">
                    </div>
                    <div class="mb-1">
                        <label for="nama" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="">- jenis kelamin Anda -</option>
                            <option value="LAKI-LAKI" <?php if ($jenis_kelamin == "laki-laki")
                                echo "selected" ?>>Laki-laki</option>
                                <option value="PEREMPUAN" <?php if ($jenis_kelamin == "perempuan")
                                echo "selected" ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="nama" class="form-label">Fakultas</label>
                        <input type="text" class="form-control" id="fakultas" value="<?php echo $fakultas ?>" name="fakultas">
                    </div>
                    <div class="mb-1">
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
                    <div class="mb-2">
                        <label for="alamat" class="form-label">Asal Kota</label>
                        <input type="text" class="form-control" id="asal_kota" value="<?php echo $asal_kota ?>" name="asal_kota">
                    </div>
                    <div class="col-12">
                        <center>
                        <input type="submit" name="simpan" value="simpan data" class="btn btn-success">
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>