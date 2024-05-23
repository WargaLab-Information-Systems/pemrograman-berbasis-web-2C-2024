<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <center>
            <h1><span>Data</span> Mahasiswa</h1>
            <table id="tabel">
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Program Studi</th>
                    <th>Jurusan</th>
                    <th>Asal Kota</th>
                    <th>Action</th>
                </tr">
                <?php include 'koneksi.php' ?>
                <?php $query = mysqli_query($koneksi, "SELECT * FROM biodata") ?>
                <?php if(mysqli_num_rows($query)) { ?>
                <?php foreach ($query as $d) { ?>
                <tr>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['nim']; ?></td>
                    <td><?= $d['umur']; ?></td>
                    <td><?= $d['jenis_kelamin']; ?></td>
                    <td><?= $d['prodi']; ?></td>
                    <td><?= $d['jurusan']; ?></td>
                    <td><?= $d['asal_kota']; ?></td>
                    <td>
                        <form action="hapus.php" method="post">
                            <button type="submit" name="delete" value="<?= $d['id']; ?>" class="btn"><i class="fa-solid fa-trash"></i></button>
                            <a href="edit.php?edit=<?= $d['id']; ?>" class="btn"><i class="fa-solid fa-pen-to-square"></i></a>
                        </form>
                    </td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="8">Data Kosong</td>
                </tr>
                <?php } ?>
            </table>
        </center>
    </section>
    <footer>
        <div class="kredit">
            <p>Created by <a href="#">frinandaalfitrahramadhani</a>. |&Copy; 2024.</p>
        </div>
    </footer>
</body>
</html>
