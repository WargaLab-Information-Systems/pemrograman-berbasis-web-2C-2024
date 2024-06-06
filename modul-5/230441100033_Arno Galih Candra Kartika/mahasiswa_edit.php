<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$nim = $_GET['nim'];
$mahasiswa = $_SESSION['mahasiswa'];
$current_mahasiswa = null;
$current_key = null;

foreach ($mahasiswa as $key => $mhs) {
    if ($mhs['nim'] == $nim) {
        $current_mahasiswa = $mhs;
        $current_key = $key;
        break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    $_SESSION['mahasiswa'][$current_key] = ['nim' => $nim, 'nama' => $nama, 'alamat' => $alamat, 'angkatan' => $angkatan];

    header('Location: mahasiswa.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h2>Edit Mahasiswa</h2>
        <form method="POST">
            <div class="form-group">
                <label>NIM:</label>
                <input type="text" name="nim" class="form-control" value="<?php echo $current_mahasiswa['nim']; ?>" disabled>
            </div>
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $current_mahasiswa['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $current_mahasiswa['alamat']; ?>" required>
            </div>
            <div class="form-group">
                <label>Angkatan:</label>
                <input type="text" name="angkatan" class="form-control" value="<?php echo $current_mahasiswa['angkatan']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
