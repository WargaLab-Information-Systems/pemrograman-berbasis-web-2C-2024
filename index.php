<?php
include "koneksi.php"; // Koneksi ke database

// Jika formulir telah di-submit
if(isset($_POST['submit'])){
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];

    // Simpan data ke database
    $query = "INSERT INTO mahasiswa (nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES ('$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')";
    $result = mysqli_query($koneksi, $query);
    
    if($result) {
        // Jika data berhasil disimpan, redirect ke halaman tampilkan.php
        header("Location: tampilkan.php");
        exit; // Penting: pastikan untuk keluar dari skrip setelah melakukan redirect
    } else {
        echo '<script>alert("Gagal menyimpan data");</script>';
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Input Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tampilkan.php">Tampilkan Data</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <h4 class="text-center mb-5 mt-5">FORMULIR REGISTRASI</h4>
    <form action="add.php" method="POST" onsubmit="return validateForm()">
      <!-- Form fields -->
      <div class="mb-3 ms-5 me-5">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama Anda">
      </div>
      <div class="mb-3 ms-5 me-5">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukkan NIM Anda">
      </div>
      <div class="mb-3 ms-5 me-5">
        <label for="umur" class="form-label">Umur</label>
        <input type="number" name="umur" class="form-control" id="umur" placeholder="Masukkan umur Anda">
      </div>
      <div class="mb-3 ms-5 me-5">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div class="mb-3 ms-5 me-5">
        <label for="prodi" class="form-label">Prodi</label>
        <input type="text" name="prodi" class="form-control" id="prodi" placeholder="Masukkan program studi Anda">
      </div>
      <div class="mb-3 ms-5 me-5">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Masukkan jurusan Anda">
      </div>
      <div class="mb-3 ms-5 me-5">
        <label for="asal_kota" class="form-label">Asal Kota</label>
        <input type="text" name="asal_kota" class="form-control" id="asal_kota" placeholder="Masukkan asal kota Anda">
      </div>
      <div class="mb-3 ms-5 me-5">
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
  </body>
</html>
