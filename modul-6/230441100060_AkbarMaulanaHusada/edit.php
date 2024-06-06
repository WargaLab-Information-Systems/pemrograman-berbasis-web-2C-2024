<?php

include("Service/conn.php");
    session_start();

    if (!isset($_SESSION)) {
        header("Location: login.php");
    }

    if (isset($_SESSION["isLogin"]) == false) {
        header("Location: login.php");
    }

    if (isset($_GET["edit"])) {
        $edit = $_GET["edit"];
    
        $sql = "SELECT * FROM mahasiswa where nim = $edit";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

        }  
        
    }

    if (isset($_POST["edit"])) {
        $nim_lama = $_POST["nim_lama"];
        $nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $umur = $_POST["umur"];
        $jk = $_POST["jk"];
        $ps = $_POST["programStudi"];
        $jurusan = "";
        $asal = $_POST["asal"];

        if ($ps == "Teknik Industri" OR $ps == "Teknik Mekatronika" OR $ps == "Teknik Elektro" OR $ps == "Teknik Mesin") {
            $jurusan = "Teknik Industri";
        }
        if ($ps == "Sistem Informasi" OR $ps == "Teknik Informatika" ) {
            $jurusan = "Teknik Informatika";
        }

        $sql = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', umur = '$umur', jenis_kelamin = '$jk', prodi = '$ps', jurusan = '$jurusan', asal_kota = '$asal' where nim = '$nim_lama' ";

        // $query = mysqli_query($db, $sql);
        if ($db->query($sql)) {     
            echo "<script>
            alert('Berhasil mengedit data...');
            window.location.href = 'data.php';
            </script>";
        }
        else {
            echo "<script>alert('Gagal mengedit data..!');
            window.location.href = 'data.php';
            </script>";    
        }

        // header('Location: ../tambah.php');
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page Tambah</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

</head>

<body>
    <div class="heading" style="margin-top: 20px;" >
        <h2>Edit Data Mahasiswa</h2>
    </div>
    <div class="mx-auto w-50">
        <div class="card">
            <h5 class="card-header" style="background-color: #5847b6; color: #fff;">Edit Data Mahasiswa</h5>
            <div class="card-body">
                <form action="edit.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="nim_lama" value="<?= $row["nim"] ?>">
                        <label for="nim" class="form-label">nim</label>
                        <input type="number" class="form-control" id="nim" name="nim" oninput="limitInput(event, 12)" placeholder="Masukkan nim" style="height: 32px;" value="<?= $row["nim"] ?>" required>
                    </div>
                    <script>
                        function limitInput(event, maxLength) {
                            const input = event.target;
                            if (input.value.length > maxLength) {
                                input.value = input.value.slice(0, maxLength);
                            }
                        }
                    </script>
                    <div class="mb-2">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama" style="height: 32px;" value="<?= $row["nama"] ?>" required>
                    </div>
                    <div class="mb-2">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="number" class="form-control" name="umur" id="umur" placeholder="Masukkan umur" oninput="limitInput(event, 2)" value="<?= $row["umur"] ?>" style="height: 32px;" required>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control" style="height: 32px;" required>
                            <option value="<?= $row["jenis_kelamin"] ?>"><?= $row["jenis_kelamin"] ?></option>
                            <option value="">-- Jenis Kelamin --</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Program Studi</label>
                        <select name="programStudi" id="programStudi" class="form-control" style="height: 35px;" required>
                            <option value="<?= $row["prodi"] ?>"><?= $row["prodi"] ?></option>
                            <option value="">-- Program Studi --</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknik Mekatronika">Teknik Mekatronika</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="asal" class="form-label">Asal Kota</label>
                        <input type="text" class="form-control" name="asal" id="asal" placeholder="Masukkan Asal Kota" style="height: 32px;" value="<?= $row["asal_kota"] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-danger" name="kembali"><a href="data.php" style="text-decoration: none; color: #fff;" >Batal</a></button>
                    <button type="submit" class="btn" name="edit" style="background-color: #5847b6; color: #fff;" onclick="return confirm('Apakah anda yakin ingin mengedit data ini?');">Edit Data</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>