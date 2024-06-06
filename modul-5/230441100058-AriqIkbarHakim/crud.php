<?php
session_start();

$error = '';
$sukses = '';
$mahasiswa = isset($_SESSION['mahasiswa']) ? $_SESSION['mahasiswa'] : array();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    if (isset($_POST['simpan'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $fakultas = $_POST['fakultas'];
        $angkatan = $_POST['angkatan'];

        $prevNim = $nim;
        $prevNama = $nama;
        $prevAlamat = $alamat;
        $prevFakultas = $fakultas;
        $prevAngkatan = $angkatan;

        if ($nim && $nama && $alamat && $fakultas && $angkatan) {
            if (!is_numeric($nim)) {
                $error = "NIM harus berupa angka";
            } elseif (!is_numeric($angkatan)) {
                $error = "Angkatan harus berupa angka";
            } else {
                if (isset($_GET['op']) && $_GET['op'] == 'edit') {
                    $id = $_GET['id'];
                    $mahasiswa[$id] = array(
                        'nim' => $nim,
                        'nama' => $nama,
                        'alamat' => $alamat,
                        'fakultas' => $fakultas,
                        'angkatan' => $angkatan
                    );
                    $sukses = "Data berhasil diupdate";
                } else {
                    $id = count($mahasiswa) + 0;
                    $mahasiswa[$id] = array(
                        'nim' => $nim,
                        'nama' => $nama,
                        'alamat' => $alamat,
                        'fakultas' => $fakultas,
                        'angkatan' => $angkatan
                    );
                    $sukses = "Berhasil memasukkan data baru";
                }
                $_SESSION['mahasiswa'] = $mahasiswa;
                $prevNim = '';
                $prevNama = '';
                $prevAlamat = '';
                $prevFakultas = '';
                $prevAngkatan = '';
            }
        } else {
            $error = "Silakan masukkan semua data";
        }
    }

    if (isset($_GET['op'])) {
        if ($_GET['op'] == 'delete') {
            $id = $_GET['id'];
            if (isset($mahasiswa[$id])) {
                unset($mahasiswa[$id]);
                $_SESSION['mahasiswa'] = $mahasiswa;
                $sukses = "Berhasil hapus data";
            } else {
            }
        } elseif ($_GET['op'] == 'edit') {
            $id = $_GET['id'];
            if (isset($mahasiswa[$id])) {
                $data = $mahasiswa[$id];
                $prevNim = $data['nim'];
                $prevNama = $data['nama'];
                $prevAlamat = $data['alamat'];
                $prevFakultas = $data['fakultas'];
                $prevAngkatan = $data['angkatan'];
            } else {
                $error = "Data tidak ditemukan";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .ayam {
            color: white;
            background-color: orange;
            border-radius: 0.5rem;
            cursor: pointer;
            margin-left: 10px;
        }

        .bebek {
            color: white;
            background-color: orange;
            border-radius: 0.5rem;
            cursor: pointer;
            margin-right: 10px;
        }

        .navbar a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
            border-radius: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a class="ayam"> Selamat Datang <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></a>
        <a class="bebek" href="logout.php">Logout</a>
    </div>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php if ($error) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <?php if ($sukses) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php endif; ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $prevNim ?? ''; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $prevNama ?? ''; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $prevAlamat ?? ''; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="fakultas" id="fakultas">
                                <option value="">- Pilih Fakultas -</option>
                                <option value="Sistem Informasi" <?php if (isset($prevFakultas) && $prevFakultas == "Sistem Informasi") echo "selected"; ?>>Sistem Informasi</option>
                                <option value="Teknik Informatika" <?php if (isset($prevFakultas) && $prevFakultas == "Teknik Informatika") echo "selected"; ?>>Teknik Informatika</option>
                                <option value="Hukum" <?php if (isset($prevFakultas) && $prevFakultas == "Hukum") echo "selected"; ?>>Hukum</option>
                                <option value="Akutansi" <?php if (isset($prevFakultas) && $prevFakultas == "Akutansi") echo "selected"; ?>>Akutansi</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="angkatan" name="angkatan" value="<?php echo $prevAngkatan ?? ''; ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                        <a href="crud.php" class="btn btn-success">Buat Data</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mahasiswa as $id => $data) : ?>
                            <tr>
                                <th scope="row"><?php echo $id + 1 ?></th>
                                <td><?php echo $data['nim'] ?></td>
                                <td><?php echo $data['nama'] ?></td>
                                <td><?php echo $data['alamat'] ?></td>
                                <td><?php echo $data['fakultas'] ?></td>
                                <td><?php echo $data['angkatan'] ?></td>
                                <td>
                                    <a href="crud.php?op=edit&id=<?php echo $id ?>" class="btn btn-warning">Edit</a>
                                    <a href="crud.php?op=delete&id=<?php echo $id ?>" class="btn btn-danger" onclick="return confirm('Yakin mau delete data?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
