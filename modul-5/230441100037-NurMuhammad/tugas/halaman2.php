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
            $_SESSION['data'][] = [
                "nim" => $_POST['nim'], 
                "nama" => $_POST['nama'], 
                "jurusan" => $_POST['jurusan'], 
                "alamat" => $_POST['alamat'], 
                "angkatan" => $_POST['angkatan'] 
            ];
            header('Location: halaman2.php');
        }
        if(isset($_POST['edit'])) {
            $_SESSION['data'][$_POST['edit']] = [
                "nim" => $_POST['nim'], 
                "nama" => $_POST['nama'], 
                "jurusan" => $_POST['jurusan'], 
                "alamat" => $_POST['alamat'], 
                "angkatan" => $_POST['angkatan'] 
            ];
            header('Location: halaman2.php');
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

    <!-- NAVBAR -->
    <div class="navbar sidebar-active">
        <!-- SIDEBAR -->
        <div class="sidebar active">
            <div class="logo">
                <h1>My Website</h1>
            </div>
            <div class="nav-list">
                <div class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    <a href="halaman1.php">Home</a>
                </div>
                <div class="nav-link">
                    <i class="fa-solid fa-user-tie"></i>
                    <a>Dosen</a>
                </div>
                <div class="nav-link">
                    <i class="fa-solid fa-user-graduate"></i>
                    <a href="halaman2.php">Mahasiswa</a>
                </div>
                <div class="nav-link">
                    <i class="fa-solid fa-rectangle-list"></i>
                    <a>Mata Kuliah</a>
                </div>
            </div>
            <div class="logout">
                <a href="logout.php">Logout <i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>
        <!-- sidebar -->
        <button id="humberger-menu">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="nav-items">
            <div class="search">
                <form>
                    <input type="text" placeholder="Search....">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="profil">
                <p><?= $_SESSION['user']['username']; ?></p>
                <div class="gambar">
                    <img src="https://assets-a1.kompasiana.com/items/album/2021/03/24/blank-profile-picture-973460-1280-605aadc08ede4874e1153a12.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- navbar -->

    <!-- NOTIF -->
    <div class="notif">
        <div class="kotak">
            <h2>Yakin ingin menghapus data ini?</h2>
            <form action="" method="post">
                <button type="submit" name="delete" class="iya">Iya</button>
                <button class="cancel">Cancel</button>
            </form>
        </div>
    </div>
    <!-- notif -->

    <div class="container sidebar-active">
        <div class="data">
            <h1>Data Mahasiswa</h1>
            <button type="button" class="tambah" onclick="formTambah(this)">Tambah</button>
            <form action="" class="tambah" method="post">
                <div class="isi">
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
                        <button type="submit" name="tambah" onclick="return validasiTambah()">Submit</button>
                    </div>
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
                            <button type="button" name="edit" onclick="formEdit(this)" value="<?= $key; ?>"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></button>
                            <button type="button" name="delete" onclick="formDelete(this)" value="<?= $key; ?>"><i class="fa-solid fa-trash"></i></button>
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

    <script src="script.js"></script>
</body>
</html>