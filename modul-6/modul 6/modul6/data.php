<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="logo">
            <a href="index.php">Web Form  <span class="p">Mahasiswa</a>
        </div>
        <ul class="nav-links">
            <li><a href="data.php">Data Mahasiswa</a></li>
            <div class="logout">
                <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i></a> 
            </div>
        </ul>
        </div>
    </nav>
    <div class="container">
        <div class="data">
            <table>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>umur</th>
                    <th>jenis_kelamin</th>
                    <th>prodi</th>
                    <th>Jurusan</th>
                    <th>asal_kota</th>
                    <th>Aksi</th>
                </tr>
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
                                <button class="btn" type="submit" name="delete" value="<?= $d['id']; ?>"><i class="fa-solid fa-trash"></i></button>
                                <a  class="btn" href="edit.php?edit=<?= $d['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </form>
                        </td>
                    </tr>
                <?php } } else { ?>
                    <tr>
                        <td colspan="8">Data Kosong</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>