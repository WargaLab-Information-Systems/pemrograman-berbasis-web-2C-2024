<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user'])) {
    $userLogin = false;
    for ($i = 0; $i < count($_SESSION['user']); $i++) {
        if ($_SESSION['user'][$i]['isLogin'] === true) {
            $userLogin = true;
            break;
        }
    }
    if (!$userLogin) {
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
}
if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = [];
}
if (isset($_POST['tambah'])) {
    if (!empty($_POST['nim']) and !empty($_POST['nama']) and !empty($_POST['alamat']) and !empty($_POST['angkatan'])) {
        $_SESSION['data'][] = [
            "nim" => $_POST['nim'],
            "nama" => $_POST['nama'],
            "alamat" => $_POST['alamat'],
            "angkatan" => $_POST['angkatan']
        ];
        header('Location: crud.php');
    } else {
        echo "<script>alert('Tambah Data Gagal...');</script>";
    }
}
if (isset($_POST['delete'])) {
    unset($_SESSION['data'][$_POST['delete']]);
    header('Location: crud.php');
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
        <a href="" class="logo"><i class="fa-regular fa-user"></i><?= $_SESSION['userLogin']['nama'] ?></a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="#">CRUD</a>
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
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="number" class="form-control" id="nim" name="nim" placeholder="Masukkan nim">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Angkatan</label>
                        <select name="angkatan" id="angkatan" class="form-control">
                            <option value="">-- Tahun angkatan --</option>
                            <option value="angkatan 2019">Angkatan 2019</option>
                            <option value="angkatan 2020">Angkatan 2020</option>
                            <option value="angkatan 2021">Angkatan 2021</option>
                            <option value="angkatan 2022">Angkatan 2022</option>
                            <option value="angkatan 2023">Angkatan 2023</option>
                            <option value="angkatan 2024">Angkatan 2024</option>
                        </select>
                    </div>
                    <button type="submit" class="btn" name="tambah" style="background-color: #5847b6; color: #fff;">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
    <div class="heading">
        <h2>Data Mahasiswa</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nim
                <th>Nama
                <th>Alamat
                <th>angkatan
                <th>Aksi
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($_SESSION['data'])) {
                foreach ($_SESSION['data'] as $key => $x) {
            ?>
                    <tr>
                        <td><?= $x['nim']; ?></td>
                        <td><?= $x['nama']; ?></td>
                        <td><?= $x['alamat']; ?></td>
                        <td><?= $x['angkatan']; ?></td>
                        <td>
                            <form action="" method="post">
                                <button type="submit" name="delete" class="del" style="border: 0px; background-color: rgb(38, 38, 176); color: #fff; width:80px; border-radius: 20px; padding: 8px;" value="<?= $key; ?>">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Data Kosong</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>