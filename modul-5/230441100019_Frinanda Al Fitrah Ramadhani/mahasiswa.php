<?php
    if(!isset($_SESSION)) { 
        session_start(); 
        if(!isset($_SESSION['user'])) {
            header('Location: index.php');
        }

        if (!isset($_SESSION['data'])) {
            $_SESSION['data'] = [];
        }
        if(isset($_POST['tambah'])) {
            if (!empty($_POST['nim']) AND !empty($_POST['nama']) AND !empty($_POST['jurusan']) AND !empty($_POST['alamat']) AND !empty($_POST['angkatan'])) {
                $_SESSION['data'][] = [
                    "nim" => $_POST['nim'],
                    "nama" => $_POST['nama'], 
                    "jurusan" => $_POST['jurusan'], 
                    "alamat" => $_POST['alamat'], 
                    "angkatan" => $_POST['angkatan']];
                header('Location: mahasiswa.php');
            }
        }
        if(isset($_POST['delete'])) { 
            unset($_SESSION['data'][$_POST['delete']]); 
            header('Location: mahasiswa.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav class="navbar">
        <a href="home.php" class="navbar-logo">Biodata<span>Mahasiswa.</span></a>
        <div class="navbar-nav">
            <a href="home.php">Beranda</a>
            <a href="data.php">Data</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <section class="data">
        <center>
            <h1><span>Data</span> Mahasiswa</h1>
            <table id="tabel">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Angkatan</th>
                    <th>Action</th>
                </tr id="dataRow">
                <?php if(!empty($_SESSION['data'])) { ?>
                <?php foreach ($_SESSION['data'] as $key => $d) { ?>
                <tr>
                    <td><?= $d['nim']; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['jurusan']; ?></td>
                    <td><?= $d['alamat']; ?></td>
                    <td><?= $d['angkatan']; ?></td>
                    <td>
                        <form action="" method="post">
                            <button type="submit" name="delete" value="<?= $key; ?>" style="background-color:var(--primary); color:#fff;">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="6">Data Kosong</td>
                </tr>
                <?php } ?>
            </table>
            <form action="" class="tambah" method="post">
            <section class="form_biodata">
            <main class="content">
                <center>
                    <h1><span>Tambah</span> Data</h1>
                    <form name="data">
                        <input type="text" id="nim" name="nim" placeholder="Masukan NIM" required><br>
                        <input type="text" id="nama" name="nama" placeholder="Masukan Nama" required><br>
                        <input type="text" id="jurusan" name="jurusan" placeholder="Masukan Jurusan" required><br>
                        <input type="text" id="alamat" name="alamat" placeholder="Masukan Alamat" required><br>
                        <input type="text" id="angkatan" name="angkatan" placeholder="Masukan Angkatan" required><br>
                        <button type="submit" class="btn" name="tambah">Tambah</button>
                    </form>
                </center>
            </main>
        </section>
            </form>
        </center>
    </section>
    <footer>
        <div class="kredit">
            <p>Created by <a href="#">frinandaalfitrahramadhani</a>. |&Copy; 2024.</p>
        </div>
    </footer>
</body>
</html>
