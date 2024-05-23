<?php
include ("services/koneksi.php");

$nim = "";
$nama = "";
$umur = "";
$kelamin = "";
$prodi = "";
$jurusan = "";
$kota = "";
$eror = "";
$sukses = "";

if (isset($_POST["simpan"])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kota = $_POST['kota'];
    $prodi = $_POST['prodi'];
    $umur = $_POST['umur'];
    $kelamin = $_POST['kelamin'];
    $jurusan = $_POST['jurusan'];

    if ($nim && $nama && $kota && $prodi && $jurusan && $umur && $kelamin) {
        $sql1 = "insert into tb_mhs(nim,nama,kota,prodi,jurusan,umur,kelamin) values ('$nim','$nama','$kota','$prodi','$jurusan','$umur','$kelamin')";
        $q1 = mysqli_query($db, $sql1);
        if ($q1) {
            header("Location: tabel.php");
            exit();
        } else {
            $eror = "Gagal memasukkan data";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form input Data Mahasiswa</title>
    <!-- //css -->
    <link rel="stylesheet" href="form.css">
    <!-- //font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

</head>

<body>
    <div class="content">
        <div class="container">
            <div class="kiri">
                <h2>Form Mahasiswa</h2>
            </div>
            <div class="kanan">
                <form action="" method="POST" onclick="sound1.play()">
                    <input type="text" id="nama" value="<?php echo $nama ?>" name="nama"
                        placeholder="Masukkan nama anda ! ">
                    <input type="text" id="nim" value="<?php echo $nim ?>" name="nim"
                        placeholder="Masukkan NIM anda ! ">
                    <input type="text" id="umur" value="<?php echo $umur ?>" name="umur"
                        placeholder="Masukkan umur anda ! ">
                    <select name="kelamin" id="kelamin">
                        <option value="">- Pilih Jenis Kelamin Anda -</option>
                        <option value="Laki-Laki" <?php if ($kelamin == "Laki-Laki")
                            echo "selected" ?>>Laki - Laki
                            </option>
                            <option value="Perempuan" <?php if ($prodi == "Perempuan")
                            echo "selected" ?>>Perempuan</option>
                        </select>
                        <select name="prodi" id="prodi">
                            <option value="">- Pilih Prodi Anda -</option>
                            <option value="SISTEM INFORMASI" <?php if ($prodi == "si")
                            echo "selected" ?>>Sistem Informasi
                            </option>
                            <option value="TEKNIK INFORMATIKA" <?php if ($prodi == "informatika")
                            echo "selected" ?>>Teknik Informatika</option>
                            <option value="TEKNIK INDUSTRI" <?php if ($prodi == "industri")
                            echo "selected" ?>>Teknik Industri
                            </option>
                            <option value="TEKNIK ELECTRO" <?php if ($prodi == "electro")
                            echo "selected" ?>>Teknik Electro
                            </option>
                            <option value="TEKNIK MEKATRONIKA" <?php if ($prodi == "mekatro")
                            echo "selected" ?>>Teknik Mekatronika</option>
                            <option value="TEKNIK MESIN" <?php if ($prodi == "mesin")
                            echo "selected" ?>>Teknik Mesin
                            </option>
                        </select>
                        <input type="text" id="jurusan" value="<?php echo $jurusan ?>" name="jurusan"
                        placeholder="Masukkan Jurusan anda ! ">
                    <input type="text" id="kota" value="<?php echo $kota ?>" name="kota"
                        placeholder="Masukkan Alamat anda ! ">
                    <input type="submit" name="simpan" value="simpan data"
                        style="width: 100px; align-items: center; margin-left: 40%; margin-bottom: 0;">
                </form>
            </div>
        </div>
    </div>

    <script>
        var sound1 = new Audio();
        sound1.src = "sound/pop.mp3"
    </script>
</body>

</html>