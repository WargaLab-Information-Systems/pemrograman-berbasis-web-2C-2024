<?php
    include 'koneksi.php';
    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $data = mysqli_query($koneksi, "SELECT * FROM biodata WHERE id = '$id'");
        $data = mysqli_fetch_array($data);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <a href="home.php" class="navbar-logo">Biodata<span>Mahasiswa.</span></a>
        <div class="navbar-nav">
            <a href="home.php">Beranda</a>
            <a href="mahasiswa.php">Data</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <section class="data">
        <form action="update.php" class="tambah" method="post">
            <section class="form_biodata">
                <main class="content">
                    <center>
                        <h1><span>Edit</span> Data</h1>
                        <form>
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <input value="<?= $data['nama']; ?>" type="text" id="nama" name="nama" placeholder="Nama" required><br>
                            <input value="<?= $data['nim']; ?>" type="text" id="nim" name="nim" placeholder="NIM" required><br>
                            <input value="<?= $data['umur']; ?>" type="text" id="umur" name="umur" placeholder="Umur" required><br>
                            <input value="<?= $data['jenis_kelamin']; ?>" type="text" id="jenis_kelamin" name="jenis_kelamin" placeholder="Jenis Kelamin" required><br>
                            <input value="<?= $data['prodi']; ?>" type="text" id="prodi" name="prodi" placeholder="Program Studi" required><br>
                            <input value="<?= $data['jurusan']; ?>" type="text" id="jurusan" name="jurusan" placeholder="Jurusan" required><br>
                            <input value="<?= $data['asal_kota']; ?>" type="text" id="asal_kota" name="asal_kota" placeholder="Asal Kota" required><br>
                            <button type="submit" class="btn" name="tambah">Edit</button>
                        </form>
                    </center>
                </main>
            </section>
        </form>
    </section>
    <footer>
        <div class="kredit">
            <p>Created by <a href="#">frinandaalfitrahramadhani</a>. |&Copy; 2024.</p>
        </div>
    </footer>
</body>
</html>
