<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>

   
<style>
    body {
        background-color: #52BE80; 
        padding: 20px;
        
    }

    h2 {
        color: #007bff;
    }

    .form-group label {
        color: #6c757d;
    }

    .btn-primary {
        background-color: #DC7633;
        border-color: #DC7633;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .container {
        max-width: 700px;
        margin: 20px auto;
        padding: 20px; 
        background-color: #04FCF8  ;
        border-radius: 8px; 
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        
    }
</style>



<body>
    <div class="container mt-5">
        <h2>Ubah Data Mahasiswa</h2>
        <?php
        include 'koneksi.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM mahasiswa WHERE id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
        <form action="proses_ubah.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $row['nim']; ?>" required>
            </div>
            <div class="form-group">
                <label for="umur">Umur:</label>
                <input type="number" class="form-control" id="umur" name="umur" value="<?php echo $row['umur']; ?>" required>
            </div>

                        <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki" <?php if($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="prodi">Prodi:</label>
                <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $row['prodi']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan:</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $row['jurusan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="asal_kota">Asal Kota:</label>
                <input type="text" class="form-control" id="asal_kota" name="asal_kota" value="<?php echo $row['asal_kota']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
        <?php
            } else {
                echo "Data tidak ditemukan";
            }
        } else {
            echo "ID tidak ditemukan";
        }
        ?>
    </div>
</body>
</html>

