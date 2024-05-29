<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Tambah Data</h2>
        <!-- Connection -->
        <?php
        //mengkoneksikan file php lain
        include "koneksi.php";
        //mengambil data dari form
        //if percabangan
        //isset untuk mengatur variabel dan variabel post menyimpan data yang akan dikirimkan ke server
        if(isset($_POST['nama'])){
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $umur = $_POST['umur'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $prodi = $_POST['prodi'];
            $jurusan = $_POST['jurusan'];
            $asal_kota = $_POST['asal_kota'];
            //terdapat percabangan if
            //(||==atau) dan (=="kosong jika belumdiinputkan" maka akan muncul informasi data tidak boleh kosong)
            if ($nama == "" || $nim == "" || $umur == "" || $jenis_kelamin == "" || $prodi == "" || $jurusan == ""|| $asal_kota == "") {
                echo '<div class="alert alert-danger">Data Tidak Boleh Kosong</div>';
                //pada kondisi lain
            } else {
                //variabel query utk menyimpan data setelah ditambahkan 
                //insert to=menambahkan kedalam tabel biodata  value =berdasarkan urutan prperto nama,nim,umur,jeniskelamin,prodi,jurusan
                //variabel koneksi untuk mengkoneksikan ke database mahasiswa
                $query = mysqli_query($koneksi, "INSERT INTO biodata(nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES ('$nama', '$nim', '$umur', '$jenis_kelamin','$prodi','$jurusan','$asal_kota')");
                if($query){
                    //jika berhasil menambah data akan muncul informasi dibawah
                    echo '<div class="alert alert-success">Tambah Data Berhasil</div>';
                } else {
                    //jika gagal menambah data akan muncul informasi dibawah
                    echo '<div class="alert alert-danger">Tambah Data Gagal</div>';
                }
            }
        }
        ?>
        <!-- Form -->
        <form method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" name="nim">
            </div>
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="text" class="form-control" name="umur">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                    <option>Perempuan</option>
                    <option>Laki-laki</option>
                </select>
            </div>
            <div class="form-group">
                <label for="prodi">Prodi</label>
                <input type="text" class="form-control" name="prodi">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control" name="jurusan">
            </div>
            <div class="form-group">
                <label for="asal_kota">Asal Kota</label>
                <textarea class="form-control" name="asal_kota"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-link">Kembali</a>
        </form>
    </div>
</body>
</html>
