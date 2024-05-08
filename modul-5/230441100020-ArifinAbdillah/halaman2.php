<?php 
    if(!isset($_SESSION)) { 
        session_start(); 
        if(!isset($_SESSION['user'])) {
            header('Location: login.php');
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
                    "angkatan" => $_POST['angkatan'] 
                ];
                header('Location: halaman2.php');
            }
        }
        if(isset($_POST['delete'])) {
            unset($_SESSION['data'][$_POST['delete']]);
            header('Location: halaman2.php');
        }
    }
?>
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
            <a href="halaman1.php">Web Form  <span class="p">Mahasiswa</a>
        </div>
        <ul class="nav-links">
            <li><a href="halaman1.php">Home</a></li>
            <li><a href="halaman2.php">Data Mahasiswa</a></li>
            <div class="logout">
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a> 
            </div>
        </ul>
        </div>
    </nav>
    <div class="container">
        <div class="data">
            
            <form action="" class="tambah" method="post">
                <h2>Tambah Data</h2>
                <div class="form-input">
                    <label for="nim">NIM:</label>
                    <input name="nim" id="nim" type="text" placeholder="NIM">
                </div>
                <div class="form-input">
                    <label for="nama">Nama:</label>
                    <input name="nama" id="nama" type="text" placeholder="Nama">
                </div>
                <div class="form-input">
                    <label for="jurusan">Jurusan:</label>
                    <input name="jurusan" id="jurusan" type="text" placeholder="Jurusan">
                </div>
                <div class="form-input">
                    <label for="alamat">Alamat:</label>
                    <input name="alamat" id="alamat" type="text" placeholder="Alamat">
                </div>
                <div class="form-input">
                    <label for="angkatan">Angkatan:</label>
                    <input name="angkatan" id="angkatan" type="text" placeholder="Angkatan">
                </div>
                <div class="form-input">
                    <button type="submit" name="tambah">Submit</button>
                </div>
            </form>
            <table>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Angkatan</th>
                    <th>Aksi</th>
                </tr>
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
                                <button type="submit" name="delete" value="<?= $key; ?>"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php } } else { ?>
                    <tr>
                        <td colspan="6">Data Kosong</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>