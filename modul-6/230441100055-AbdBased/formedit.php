<?php
include "edit.php";

$prodi = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/230441100055-AbdBased1/css/formedit.css">
</head>
<body>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <center><h5>Edit Data Mahasiswa</h5></center>
        </div>
        <div class="card-body">
            <form method="POST" action="edit.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-1">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $row['nim']; ?>" required>
                </div>
                <div class="mb-1">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                </div>
                <div class="mb-1">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="number" class="form-control" id="umur" name="umur" value="<?php echo $row['umur']; ?>" required>
                </div>
                <div class="mb-1">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </div>
                <div class="mb-1">
                    <label for="fakultas" class="form-label">Fakultas</label>
                    <input type="text" class="form-control" id="fakultas" name="fakultas" value="<?php echo $row['fakultas']; ?>" required>
                </div>
                <div class="mb-1">
                    <label for="prodi" class="form-label">Prodi</label>
                    <select class="form-control" name="prodi" id="prodi">
                        <option value="">- Pilih Prodi Anda -</option>
                        <option value="SISTEM INFORMASI" <?php if ($prodi == "si")
                        echo "selected" ?>>Sistem Informasi
                        </option>
                        <option value="TEKNIK INFORMATIKA" <?php if ($prodi == "informatika")
                        echo "selected" ?>>Teknik Informatika</option>
                        <option value="TEKNIK INDUSTRI" <?php if ($prodi == "industri")
                        echo "selected" ?>>Teknik Industri</option>
                        <option value="TEKNIK ELECTRO" <?php if ($prodi == "electro")
                        echo "selected" ?>>Teknik Electro</option>
                        <option value="TEKNIK MEKATRONIKA" <?php if ($prodi == "mekatro")
                        echo "selected" ?>>Teknik Mekatronika</option>
                        <option value="TEKNIK MESIN" <?php if ($prodi == "mesin")
                        echo "selected" ?>>Teknik Mesin
                        </option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="asal_kota" class="form-label">Asal Kota</label>
                    <input type="text" class="form-control" id="asal_kota" name="asal_kota" value="<?php echo $row['asal_kota']; ?>" required>
                </div>
                <center><button type="submit" class="btn btn-primary">Update</button></center>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
