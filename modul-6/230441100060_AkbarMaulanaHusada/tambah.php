<?php

include("Service/conn.php");
    session_start();

    if (!isset($_SESSION)) {
        header("Location: login.php");
    }

    if (isset($_SESSION["isLogin"]) == false) {
        header("Location: login.php");
    }

    if (isset($_POST["tambah"])) {
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

        $sql = "INSERT INTO mahasiswa (nim, nama, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES ('$nim', '$nama', '$umur', '$jk', '$ps', '$jurusan', '$asal')";

        // $query = mysqli_query($db, $sql);
        if ($db->query($sql)) {     
            echo "<script>
                alert('Berhasil menambah data...');
                window.location.href = 'tambah.php';
                </script>";
            }
            else {
                echo "<script>alert('Gagal menambah data..!');
                window.location.href = 'tambah.php';
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
    <header class="header">
        <a href="" class="logo"><i class="fa-regular fa-user"></i><?= $_SESSION["nama"]?></a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="#">Tambah</a>
            <a href="data.php">Data</a>
            <a href="logout.php" onclick="logout()">Logout</a>
            <script>
                function logout() {
                    alert('Berhasil Logout...')
                }
            </script>
        </nav>
    </header>
    <div class="heading">
        <h2>Input Data Mahasiswa</h2>
    </div>
    <div class="mx-auto w-50">
        <div class="card">
            <h5 class="card-header" style="background-color: #5847b6; color: #fff;">Tambah Data Mahasiswa</h5>
            <div class="card-body">
                <form action="tambah.php" method="POST">
                    <div class="mb-3">
                        <label for="nim" class="form-label">nim</label>
                        <input type="number" class="form-control" id="nim" name="nim" oninput="limitInput(event, 12)" placeholder="Masukkan nim" style="height: 32px;" required>
                    </div>
                    <div class="mb-2">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama" style="height: 32px;" required>
                    </div>
                    <div class="mb-2">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="number" class="form-control" name="umur" id="umur" placeholder="Masukkan umur" oninput="limitInput(event, 2)" style="height: 32px;" required>
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
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control" style="height: 32px;" required>
                            <option value="">-- Jenis Kelamin --</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Program Studi</label>
                        <select name="programStudi" id="programStudi" class="form-control" style="height: 35px;" required>
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
                        <input type="text" class="form-control" name="asal" id="asal" placeholder="Masukkan Asal Kota" style="height: 32px;" required>
                    </div>
                    <button type="submit" class="btn" name="tambah" style="background-color: #5847b6; color: #fff;">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>