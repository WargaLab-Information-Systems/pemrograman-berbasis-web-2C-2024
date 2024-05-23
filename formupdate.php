<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
$row = mysqli_fetch_array($query);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h4 class="text-center mb-5 mt-5">FORMULIR UPDATE</h4>
    <form action="update.php?id=<?php echo $id; ?>" method="POST">
      <div class="mb-3 ms-5 me-5">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row['nama']; ?>">
      </div>
      <div class="mb-3 ms-5 me-5">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control" id="nim" value="<?php echo $row['nim']; ?>">
      </div>
      <div class="mb-3 ms-5 me-5">
        <label for="umur" class="form-label">Umur</label>
        <input type="number" name="umur" class="form-control" id="umur
        </div>
      <div class="mb-3 ms-5 me-5">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
          <option value="Laki-laki" <?php if($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
          <option value="Perempuan" <?php if($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
        </select>
      </div>
      <div class="mb-3 ms-5 me-5">
        <label for="prodi" class="form-label">Prodi</label>
        <input type="text" name="prodi" class="form-control" id="prodi" value="<?php echo $row['prodi']; ?>">
      </div>
      <div class="mb-3 ms-5 me-5">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?php echo $row['jurusan']; ?>">
      </div>
      <div class="mb-3 ms-5 me-5">
        <label for="asal_kota" class="form-label">Asal Kota</label>
        <input type="text" name="asal_kota" class="form-control" id="asal_kota" value="<?php echo $row['asal_kota']; ?>">
      </div>
      <div class="mb-3 ms-5 me-5">
        <button type="submit" name="submit" class="btn btn-success">Update</button>
      </div>
    </form>
    <div class="me-5 ms-5">
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
