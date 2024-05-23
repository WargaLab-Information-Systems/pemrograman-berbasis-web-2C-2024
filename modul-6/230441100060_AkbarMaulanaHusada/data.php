    <?php
    include("Service/conn.php");
    session_start();
    if (!isset($_SESSION)) {
        header("Location: login.php");
    }

    if (isset($_SESSION["isLogin"]) == false) {
        header("Location: login.php");
    }

    if (isset($_GET["hapus"])) {
        $hapus = $_GET["hapus"];

        $sql = "DELETE FROM mahasiswa where nim = $hapus";
        $result = $db->query($sql);

        if ($result) {
            echo "<script>alert('Berhasil menghapus data...');
                    window.location.href = 'data.php';
                    </script>";
        }
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>page CRUD</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

    </head>

    <body>
        <header class="header">
            <a href="" class="logo"><i class="fa-regular fa-user"></i><?= $_SESSION["nama"] ?></a>

            <nav class="navbar">
                <a href="index.php">Home</a>
                <a href="tambah.php">Tambah</a>
                <a href="#">Data</a>
                <a href="logout.php" onclick="logout()">Logout</a>
                <script>
                    function logout() {
                        alert('Berhasil Logout...')
                    }
                </script>
            </nav>
        </header>
        <div class="heading">
            <h2>Data Mahasiswa</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nim
                    <th>Nama
                    <th>Umur
                    <th>Jenis Kelamin
                    <th>Program Studi
                    <th>Jurusan
                    <th>Asal Kota
                    <th colspan="2" style="text-align: center;">Aksi
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM mahasiswa";
                $result = $db->query($sql);
                if ($result->num_rows > 0) {
                    while ($dataMhs = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?= $dataMhs["nim"] ?></td>
                            <td><?= $dataMhs["nama"] ?></td>
                            <td><?= $dataMhs["umur"] ?></td>
                            <td><?= $dataMhs["jenis_kelamin"] ?></td>
                            <td><?= $dataMhs["prodi"] ?></td>
                            <td><?= $dataMhs["jurusan"] ?></td>
                            <td><?= $dataMhs["asal_kota"] ?></td>
                            <td>
                                <button type="submit" name="edit" class="btn btn-warning" style="border: 0px; width:80px; border-radius: 20px; padding: 8px; "><a href="edit.php?edit=<?= $dataMhs['nim']?>" style="text-decoration: none; color: #fff;">Edit</a></button>
                            <td>
                                <button type="submit" name="delete" class="btn btn-danger" style="border: 0px; width:80px; border-radius: 20px; padding: 8px; "><a href="data.php?hapus=<?= $dataMhs['nim']?>" style="text-decoration: none; color: #fff;" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a></button>
                            </td>
                        </tr>
                    <?php
                    }
                } else { ?>
                    <tr>
                        <td colspan="8" style="text-align: center;">Data Kosong</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>

    </html>