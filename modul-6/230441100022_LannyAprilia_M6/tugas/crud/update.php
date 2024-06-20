<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    // Include file koneksi untuk koneksi ke database
    include "koneksi.php";

    // Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = "";
    $nama = "";
    $nim = "";
    $umur = "";
    $prodi = "";
    $asal_kota = "";

    // Cek apakah ada nilai yang dikirim menggunakan metode GET dengan nama id_peserta
    if (isset($_GET['id'])) {
        $id = input($_GET["id"]);

        // Prepared statement untuk mencegah SQL injection
        $sql = $conn->prepare("SELECT * FROM peserta WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $result = $sql->get_result();
        $data = $result->fetch_assoc();

        if ($data) {
            $id = $data['id'];
            $nama = $data['nama'];
            $nim = $data['nim'];
            $umur = $data['umur'];
            $prodi = $data['prodi'];
            $asal_kota = $data['asal_kota'];
        } else {
            echo "<div class='alert alert-danger'>ID tidak ditemukan.</div>";
        }
    }

    // Cek apakah ada kiriman form dari metode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = htmlspecialchars($_POST["id"]);
        $nama = input($_POST["nama"]);
        $nim = input($_POST["nim"]);
        $umur = input($_POST["umur"]);
        $prodi = input($_POST["prodi"]);
        $asal_kota = input($_POST["asal_kota"]);

        // Prepared statement untuk mencegah SQL injection
        $sql = $conn->prepare("UPDATE peserta SET nama=?, nim=?, umur=?, prodi=?, asal_kota=? WHERE id=?");
        $sql->bind_param("sssssi", $nama, $nim, $umur, $prodi, $asal_kota, $id);
        
       
        // Mengeksekusi atau menjalankan query diatas
        $hasil = $sql->execute();

        // Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location: index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Update Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required value="<?php echo $nama; ?>" />
        </div>
        <div class="form-group">
            <label>NIM:</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan Nim Anda" required value="<?php echo $nim; ?>" />
        </div>
        <div class="form-group">
            <label>Umur:</label>
            <input type="text" name="umur" class="form-control" placeholder="Masukan Umur Anda" required value="<?php echo $umur; ?>" />
        </div>
        <div class="form-group">
            <label>Prodi:</label>
            <input type="text" name="prodi" class="form-control" placeholder="Masukan Prodi Anda" required value="<?php echo $prodi; ?>" />
        </div>
        <div class="form-group">
            <label>Asal Kota:</label>
            <textarea name="asal_kota" class="form-control" rows="5" placeholder="Masukan Asal Kota Anda" required><?php echo $asal_kota; ?></textarea>
        </div>

        <input type="hidden" name="id" value="<?php echo $id; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>