<?php 
include "koneksi.php"; // Koneksi ke database
$bio = mysqli_query($koneksi, "SELECT * FROM mahasiswa"); // Query untuk mendapatkan data dari tabel mahasiswa
?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Input Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tampilkan.php">Tampilkan Data</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <h4 class="text-center mb-5 mt-5">DATA MAHASISWA</h4>
    <div class="me-5 ms-5">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">NIM</th>
            <th scope="col">Umur</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Prodi</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Asal Kota</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_array($bio)) { ?> 
            <tr> 
              <td><?php echo $row['nama'] ?></td> 
              <td><?php echo $row['nim'] ?></td>
              <td><?php echo $row['umur'] ?></td>
              <td><?php echo $row['jenis_kelamin'] ?></td>
              <td><?php echo $row['prodi'] ?></td>
              <td><?php echo $row['jurusan'] ?></td>
              <td><?php echo $row['asal_kota'] ?></td>
              <td>
                <a href="formupdate.php?id=<?php echo $row['id'] ?>">edit</a>
                <a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirmDelete()">delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
  </body>
</html>