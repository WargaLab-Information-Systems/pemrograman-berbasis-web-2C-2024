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
            <li><a href="data.php">Edit Data Mahasiswa</a></li>
            <div class="logout">
                <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i></a> 
            </div>
        </ul>
        </div>
    </nav>
    <div class="container">
        <div class="data"> 
            <center>
            <form action="update.php" class="tambah" method="post">
                <h2>Form Register</h2>
                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                <div class="form-input">
                    <label for="nama">Nama:</label>
                    <input value="<?= $data['nama']; ?>" name="nama" id="nama" type="text" placeholder="Nama">
                </div>
                <div class="form-input">
                    <label for="nim">NIM:</label>
                    <input value="<?= $data['nim']; ?>" name="nim" id="nim" type="text" placeholder="NIM">
                </div>
                <div class="form-input">
                    <label for="umur">umur:</label>
                    <input value="<?= $data['umur']; ?>" name="umur" id="umur" type="text" placeholder="umur">
                </div>
                <div class="form-input">
                    <label for="jenis_kelamin">jenis_kelamin:</label>
                    <input value="<?= $data['jenis_kelamin']; ?>" name="jenis_kelamin" id="jenis_kelamin" type="text" placeholder="jenis_kelamin">
                </div>
                <div class="form-input">
                    <label for="prodi">prodi:</label>
                    <input value="<?= $data['prodi']; ?>" name="prodi" id="prodi" type="text" placeholder="prodi">
                </div>
                <div class="form-input">
                    <label for="jurusan">Jurusan:</label>
                    <input value="<?= $data['jurusan']; ?>" name="jurusan" id="jurusan" type="text" placeholder="Jurusan">
                </div>
                <div class="form-input">
                    <label for="asal_kota">Asal Kota:</label>
                    <input value="<?= $data['asal_kota']; ?>" name="asal_kota" id="asal_kota" type="text" placeholder="Asal Kota">
                </div>
                <div class="form-input">
                    <button type="submit" name="tambah">Submit</button>
                </div>
            </form>
            </center>
        </div>
    </div>
</body>
</html>