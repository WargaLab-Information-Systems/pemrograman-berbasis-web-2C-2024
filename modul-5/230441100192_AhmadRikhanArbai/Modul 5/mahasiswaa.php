<?php
session_start();

// Periksa apakah pengguna belum login, jika ya, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil nama pengguna dari sesi
$username = $_SESSION['username'];

// Data mahasiswa (contoh sederhana)
$mahasiswa = [

];

// Proses CRUD
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tambah'])) {
        // Periksa apakah semua data telah diisi sebelum menambahkan data mahasiswa
        if(isset($_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['angkatan'])) {
            // Proses tambah data mahasiswa
            // (Anda bisa tambahkan validasi dan logika penyimpanan data di sini)
            $mahasiswa[] = [
                'nim' => $_POST['nim'],
                'nama' => $_POST['nama'],
                'alamat' => $_POST['alamat'],
                'angkatan' => $_POST['angkatan']
            ];
        } else {
            // Handle error jika data belum lengkap
            echo "Semua data harus diisi!";
        }
    } elseif (isset($_POST['edit'])) {
        // Proses edit data mahasiswa
        // (Anda bisa tambahkan validasi dan logika pengeditan data di sini)
        $nim_to_edit = $_POST['nim_to_edit'];
        foreach ($mahasiswa as &$mhs) {
            if ($mhs['nim'] === $nim_to_edit) {
                $mhs['nama'] = isset($_POST['nama']) ? $_POST['nama'] : $mhs['nama'];
                $mhs['alamat'] = isset($_POST['alamat']) ? $_POST['alamat'] : $mhs['alamat'];
                $mhs['angkatan'] = isset($_POST['angkatan']) ? $_POST['angkatan'] : $mhs['angkatan'];
                break;
            }
        }
    } elseif (isset($_POST['hapus'])) {
        // Proses hapus data mahasiswa
        // (Anda bisa tambahkan validasi dan logika penghapusan data di sini)
        $nim_to_delete = $_POST['nim_to_delete'];
        foreach ($mahasiswa as $key => $mhs) {
            if ($mhs['nim'] === $nim_to_delete) {
                unset($mahasiswa[$key]);
                break;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <p>Selamat datang, <?php echo $username; ?>!</p>
    <a href="logout.php">Logout</a>
    <br><br>
    <h3>Tambah Data Mahasiswa</h3>
    <form method="post">
        <label>NIM:</label><br>
        <input type="text" name="nim" required><br>
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br>
        <label>Alamat:</label><br>
        <input type="text" name="alamat" required><br>
        <label>Angkatan:</label><br>
        <input type="text" name="angkatan" required><br>
        <input type="submit" name="tambah" value="Tambah">
    </form>
    <br><br>
    <h3>Data Mahasiswa</h3>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Angkatan</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($mahasiswa as $mhs): ?>
        <tr>
            <td><?php echo $mhs['nim']; ?></td>
            <td><?php echo $mhs['nama']; ?></td>
            <td><?php echo $mhs['alamat']; ?></td>
            <td><?php echo $mhs['angkatan']; ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="nim_to_edit" value="<?php echo $mhs['nim']; ?>">
                    <input type="submit" name="edit" value="Edit">
                </form>
            </td>
            <td>
                <form method="post">
                    <input type="hidden" name="nim_to_delete" value="<?php echo $mhs['nim']; ?>">
                    <input type="submit" name="hapus" value="Hapus">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
