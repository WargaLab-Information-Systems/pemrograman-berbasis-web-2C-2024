<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "form";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { // cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$nama       = "";
$nim        = "";
$umur       = "";
$gender     = "";
$prodi      = "";
$jurusan    = "";
$askot      = "";
$error      = "";
$sukses     = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM datamhs WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nama = $r1['nama'];
    $nim = $r1['nim'];
    $umur = $r1['umur'];
    $gender = $r1['gender'];
    $prodi = $r1['prodi'];
    $jurusan = $r1['jurusan'];
    $askot = $r1['askot'];

    if ($nim == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) { // untuk create atau update
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $umur = mysqli_real_escape_string($koneksi, $_POST['umur']);
    $gender = mysqli_real_escape_string($koneksi, $_POST['gender']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    $askot = mysqli_real_escape_string($koneksi, $_POST['askot']);

    if ($nama && $nim && $umur && $gender && $prodi && $jurusan && $askot) {
        if ($op == 'edit') { // untuk update
            $id = $_GET['id'];
            $sql1 = "UPDATE datamhs SET 
                        nama = '$nama',
                        nim = '$nim',
                        umur = '$umur',
                        gender = '$gender',
                        prodi = '$prodi',
                        jurusan = '$jurusan',
                        askot = '$askot' 
                    WHERE id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else { // untuk insert
            $sql1 = "INSERT INTO datamhs(nama, nim, umur, gender, prodi, jurusan, askot) 
                     VALUES ('$nama', '$nim', '$umur', '$gender', '$prodi', '$jurusan', '$askot')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Mahasiswa</title>
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
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php if ($error): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <?php if ($sukses): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php header("refresh:2;url=index.php"); ?>
                <?php endif; ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="umur" class="col-sm-2 col-form-label">UMUR</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="umur" name="umur" value="<?php echo $umur ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gender" class="col-sm-2 col-form-label">JENIS KELAMIN</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="gender" id="gender">
                                <option value="">- Pilih Jenis Kelamin -</option>
                                <option value="m" <?php if ($gender == "m") echo "selected" ?>>Laki-laki</option>
                                <option value="f" <?php if ($gender == "f") echo "selected" ?>>Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="prodi" class="col-sm-2 col-form-label">PRODI</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $prodi ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">JURUSAN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $jurusan ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="askot" class="col-sm-2 col-form-label">ASAL KOTA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="askot" name="askot" value="<?php echo $askot ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
