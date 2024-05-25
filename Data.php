<?php
session_start();


if (!isset($_SESSION['dataMahasiswa'])) {
    $_SESSION['dataMahasiswa'] = array(
    );
}


$dataMahasiswa =& $_SESSION['dataMahasiswa'];

function tambahData($nim, $nama, $alamat, $angkatan) {
    global $dataMahasiswa;
    $dataMahasiswa[] = array($nim, $nama, $alamat, $angkatan);
}

function hapusData($index) {
    global $dataMahasiswa;
    array_splice($dataMahasiswa, $index, 1);
}

if(isset($_POST['submit'])) {
    tambahData($_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['angkatan']);
}

if(isset($_GET['action']) && $_GET['action'] == 'delete') {
    hapusData($_GET['index']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODUL 5</title>
    <link rel="stylesheet" href="data.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="data.php">DATA</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <table>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Action</th>
            </tr>
            <?php foreach ($dataMahasiswa as $index => $mahasiswa): ?>
                <tr>
                    <td><?= $mahasiswa[0] ?></td>
                    <td><?= $mahasiswa[1] ?></td>
                    <td><?= $mahasiswa[2] ?></td>
                    <td><?= $mahasiswa[3] ?></td>
                    <td>
                        <a href='?action=delete&index=<?= $index ?>' class="delete-link">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h3>Tambah Data Mahasiswa</h3>
        <form method="post" action="">
            <input type="text" name="nim" placeholder="NIM" required><br>
            <input type="text" name="nama" placeholder="Nama" required><br>
            <input type="text" name="alamat" placeholder="Alamat" required><br>
            <input type="text" name="angkatan" placeholder="Angkatan" required><br>
            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>  
</body>
</html>
