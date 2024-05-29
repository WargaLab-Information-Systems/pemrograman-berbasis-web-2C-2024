<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Ubah Data</h2>
        <!-- Connection -->
        <?php
        include 'koneksi.php';
        // Mengambil id dari URL
        $id = $_GET['id'];

        if(isset($_POST['nama'])){
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $umur = $_POST['umur'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $prodi = $_POST['prodi'];
            $jurusan = $_POST['jurusan'];
            $asal_kota = $_POST['asal_kota'];

            if ($nama == "" || $nim == "" || $umur == "" || $jenis_kelamin == "" || $prodi == "" || $jurusan == ""|| $asal_kota == "") {
                echo '<div class="alert alert-danger">Data Tidak Boleh Kosong</div>';
            } else {
                $query = "UPDATE biodata SET nama='$nama', nim='$nim', umur='$umur', jenis_kelamin='$jenis_kelamin', prodi='$prodi', jurusan='$jurusan', asal_kota='$asal_kota' WHERE id_mahasiswa=$id";
                if(mysqli_query($koneksi, $query)){
                    echo '<div class="alert alert-success">Ubah Data Berhasil</div>';
                } else {
                    echo '<div class="alert alert-danger">Ubah Data Gagal</div>';
                }
            }
        }

        $query = mysqli_query($koneksi, "SELECT * FROM biodata WHERE id_mahasiswa=$id");
        $data = mysqli_fetch_array($query);
        ?>
        <!-- Form -->
        <form method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" name="nim" value="<?php echo $data['nim']; ?>">
            </div>
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="text" class="form-control" name="umur" value="<?php echo $data['umur']; ?>">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                    <option <?php if($data['jenis_kelamin']=="Perempuan") echo 'selected'; ?>>Perempuan</option>
                    <option <?php if($data['jenis_kelamin']=="Laki-laki") echo 'selected'; ?>>Laki-laki</option> 
                </select>
            </div>
            <div class="form-group">
                <label for="prodi">Prodi</label>
                <input type="text" class="form-control" name="prodi" value="<?php echo $data['prodi']; ?>">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control" name="jurusan" value="<?php echo $data['jurusan']; ?>">
            </div>
            <div class="form-group">
                <label for="asal_kota">Asal Kota</label>
                <textarea class="form-control" name="asal_kota"><?php echo $data['asal_kota']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-link">Kembali</a>
        </form>
    </div>
</body>
</html>
