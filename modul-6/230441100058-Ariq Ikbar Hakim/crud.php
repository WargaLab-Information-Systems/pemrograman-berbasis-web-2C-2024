<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "mahasiswa";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { 
    die("Tidak bisa terkoneksi ke database");
}

$nim = "";
$nama = "";
$umur = "";
$jenis_kelamin = "";
$prodi = "";
$jurusan = "";
$asal_kota = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete' && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $sql1 = "DELETE FROM mahasiswa WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal melakukan delete data";
    }
}

if ($op == 'edit' && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $sql1 = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    if ($r1) {
        $nim = $r1['nim'];
        $nama = $r1['nama'];
        $umur = $r1['umur'];
        $jenis_kelamin = $r1['jenis_kelamin'];
        $prodi = $r1['prodi'];
        $jurusan = $r1['jurusan'];
        $asal_kota = $r1['asal_kota'];
    } else {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $umur = mysqli_real_escape_string($koneksi, $_POST['umur']);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    $asal_kota = mysqli_real_escape_string($koneksi, $_POST['asal_kota']);

    if ($nim && $nama && $umur && $jenis_kelamin && $prodi && $jurusan && $asal_kota) {
        if (!is_numeric($nim)) {
            $error = "NIM harus berupa angka";
        } elseif (!is_numeric($umur)) {
            $error = "Umur harus berupa angka";
        } else {
            if ($op == 'edit' && isset($_GET['id'])) {
                $id = mysqli_real_escape_string($koneksi, $_GET['id']);
                $sql1 = "UPDATE mahasiswa SET nim = '$nim', nama='$nama', umur='$umur', jenis_kelamin='$jenis_kelamin', prodi='$prodi', jurusan='$jurusan', asal_kota='$asal_kota' WHERE id = '$id'";
                $q1 = mysqli_query($koneksi, $sql1);
                if ($q1) {
                    $sukses = "Data berhasil diupdate";
                } else {
                    $error = "Data gagal diupdate";
                }
            } else {
                $sql_check = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
                $q_check = mysqli_query($koneksi, $sql_check);
                if (mysqli_num_rows($q_check) > 0) {
                    $error = "NIM sudah ada, gunakan NIM yang lain";
                } else {
                    $sql1 = "INSERT INTO mahasiswa(nim, nama, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES ('$nim', '$nama', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')";
                    $q1 = mysqli_query($koneksi, $sql1);
                    if ($q1) {
                        $sukses = "Berhasil memasukkan data baru";
                    } else {
                        $error = "Gagal memasukkan data";
                    }
                }
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}

if ($op == 'create') {
    $nim = "";
    $nama = "";
    $umur = "";
    $jenis_kelamin = "";
    $prodi = "";
    $jurusan = "";
    $asal_kota = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }
        .card {
            margin-top: 10px;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar .greeting {
            color: white;
            background-color: orange;
            border-radius: 0.5rem;
            cursor: pointer;
            padding: 14px 20px;
        }
        .navbar .ayam {
            color: white;
            background-color: orange;
            border-radius: 0.5rem;
            padding: 14px 20px;
        }
        .navbar a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="ayam">Selamat Datang, <?php echo htmlspecialchars($_SESSION['user_name']); ?></div>
    <a class="greeting" href="logout.php">Logout</a>
</div>
<div class="mx-auto">
    <div class="card">
        <div class="card-header text-center">
            Buat Data Dan Edit Data
        </div>
        <div class="card-body">
            <?php if ($error) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
            <?php } ?>
            <?php if ($sukses) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
            <?php } ?>

            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo htmlspecialchars($nim); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="umur" name="umur" value="<?php echo htmlspecialchars($umur); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="">- Pilih Jenis Kelamin -</option>
                            <option value="L" <?php if ($jenis_kelamin == "L") echo "selected" ?>>Laki-laki</option>
                            <option value="P" <?php if ($jenis_kelamin == "P") echo "selected" ?>>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo htmlspecialchars($prodi); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo htmlspecialchars($jurusan); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="asal_kota" class="col-sm-2 col-form-label">Asal Kota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="asal_kota" name="asal_kota" value="<?php echo htmlspecialchars($asal_kota); ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10 offset-sm-1 d-flex justify-content-between">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                        <a href="crud.php?op=create" class="btn btn-secondary">Buat Data</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header text-white bg-secondary">
            Data Mahasiswa
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Asal Kota</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql2 = "SELECT * FROM mahasiswa ORDER BY id DESC";
                    $q2 = mysqli_query($koneksi, $sql2);
                    $urut = 1;
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $id = $r2['id'];
                        $nim = $r2['nim'];
                        $nama = $r2['nama'];
                        $umur = $r2['umur'];
                        $jenis_kelamin = $r2['jenis_kelamin'];
                        $prodi = $r2['prodi'];
                        $jurusan = $r2['jurusan'];
                        $asal_kota = $r2['asal_kota'];
                    ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td scope="row"><?php echo htmlspecialchars($nim) ?></td>
                            <td scope="row"><?php echo htmlspecialchars($nama) ?></td>
                            <td scope="row"><?php echo htmlspecialchars($umur) ?></td>
                            <td scope="row"><?php echo ($jenis_kelamin == 'L') ? 'Laki-laki' : 'Perempuan'; ?></td>
                            <td scope="row"><?php echo htmlspecialchars($prodi) ?></td>
                            <td scope="row"><?php echo htmlspecialchars($jurusan) ?></td>
                            <td scope="row"><?php echo htmlspecialchars($asal_kota) ?></td>
                            <td scope="row">
                                <a href="crud.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                <a href="crud.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
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
