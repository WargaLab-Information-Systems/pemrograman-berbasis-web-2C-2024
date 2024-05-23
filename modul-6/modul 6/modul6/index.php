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
            <center>
            <form action="tambah.php" class="tambah" method="post">
                <h2>Form Register</h2>
                <div class="form-input">
                    <label for="nama">Nama:</label>
                    <input name="nama" id="nama" type="text" placeholder="Nama"required>
                </div>
                <div class="form-input">
                    <label for="nim">NIM:</label>
                    <input name="nim" id="nim" type="text" placeholder="NIM"required>
                </div>
                <div class="form-input">
                    <label for="umur">umur:</label>
                    <input name="umur" id="umur" type="text" placeholder="umur"required>
                </div>
                <div class="form-input">
                    <label for="jenis_kelamin">jenis_kelamin:</label>
                    <input name="jenis_kelamin" id="jenis_kelamin" type="text" placeholder="jenis_kelamin"required>
                </div>
                <div class="form-input">
                    <label for="prodi">prodi:</label>
                    <input name="prodi" id="prodi" type="text" placeholder="prodi"required>
                </div>
                <div class="form-input">
                    <label for="jurusan">Jurusan:</label>
                    <input name="jurusan" id="jurusan" type="text" placeholder="Jurusan"required>
                </div>
                <div class="form-input">
                    <label for="asal_kota">Asal Kota:</label>
                    <input name="asal_kota" id="asal_kota" type="text" placeholder="Asal Kota"required>
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