<?php
//Memulai sesi PHP. Ini diperlukan untuk menyimpan dan mengakses variabel sesi.
session_start();
if(!isset($_SESSION['username'])) {
    // Jika belum login blm bisa ke halaman data mahasiswa
    header("Location: login.php");
    exit();
    }
//Memeriksa apakah variabel sesi dataMahasiswa sudah diinisialisasi. 
//Jika belum, variabel tersebut diinisialisasi sebagai array kosong.
if (!isset($_SESSION['dataMahasiswa'])) {
$_SESSION['dataMahasiswa'] = array();
}
//Membuat alias untuk $_SESSION['dataMahasiswa sehingga dapat diakses melalui variabel $dataMahasiswa.
$dataMahasiswa =& $_SESSION['dataMahasiswa'];
//Fungsi tambahData menambahkan data mahasiswa baru ke dalam array $dataMahasiswa.
function tambahData($nim, $nama, $alamat, $angkatan) {
global $dataMahasiswa;
$dataMahasiswa[] = array($nim, $nama, $alamat, $angkatan);
}
//Fungsi hapusData menghapus data mahasiswa dari array $dataMahasiswa berdasarkan indeks yang diberikan.
function hapusData($index) {
global $dataMahasiswa;
array_splice($dataMahasiswa, $index, 1);
}
//Fungsi editData mengedit data mahasiswa yang ada di dalam array $dataMahasiswa
//Data yang akan diubah meliputi nim, nama, alamat, dan angkatan.
function editData($nim_Edit, $nama_edit, $alamat_edit, 
$angkatan_edit) {
global $dataMahasiswa;
foreach ($dataMahasiswa as $index => &$mahasiswa) {
if ($mahasiswa[0] == $nim_Edit) {
$mahasiswa[1] = $nama_edit;
$mahasiswa[2] = $alamat_edit;
$mahasiswa[3] = $angkatan_edit;
return;
}
}
}
//Menentukan mode edit diaktifkan berdasarkan parameter action .
//isset digunakan untuk memeriksa apakah suatu elemen dalam array telah diatur sebelum mengaksesnya
$editMode = isset($_GET['action']) && $_GET['action'] == 'edit';
//Jika form tambah data mahasiswa disubmit, 
//fungsi tambahData dipanggil dengan data yang diambil dari form.
if (isset($_POST['submit'])) {
tambahData($_POST['nim'], $_POST['nama'], $_POST['alamat'], 
$_POST['angkatan']);
}
//Jika ada parameter action di URL dengan nilai delete, 
//fungsi hapusData dipanggil dengan indeks yang diambil dari URL.
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
hapusData($_GET['index']);
}
//Jika form edit data mahasiswa disubmit, fungsi editData dipanggil dengan data yang diambil dari form, 
//dan editMode diatur ke false setelah penyimpanan perubahan.
if (isset($_POST['edit'])) {
editData($_POST['nim_edit'], $_POST['nama_edit'], 
$_POST['alamat_edit'], $_POST['angkatan_edit']);
$editMode = false; 
// Set editMode ke false setelah menyimpan perubahan

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #C4E4FF;
            border-radius: 50px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #FFD0EC;
        }
        table, th, td {
            border: 4px solid #fff;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #FB88B4;
        }
        .action-links a {
            margin-right: 5px;
            text-decoration: none;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        input[type="text"] {
            width: 50%;
            padding: 10px;
            margin-bottom: 9px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 50%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #ffffff;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <table>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Action</th>
            </tr>
            <?php foreach ($dataMahasiswa as $index => $mahasiswa): ?>
                <tr>
                    <td><?= $mahasiswa[0] ?></td>
                    <td><?= $mahasiswa[1] ?></td>
                    <td><?= $mahasiswa[2] ?></td>
                    <td><?= $mahasiswa[3] ?></td>
                    <td class="action-links">
                        <a href="?action=edit&index=<?= $index ?>">Edit</a>
                        <a href="?action=delete&index=<?= $index ?>">Delete</a>
                    </td>
                </tr>
                <?php if ($editMode && isset($_GET['index']) && $_GET['index'] == $index): ?>
                    <tr>
                        <td colspan="5">
                            <form method="post" action="">
                                <input type="hidden" name="index_to_edit" value="<?= $index ?>">
                                <input type="text" name="nim_edit" value="<?= $mahasiswa[0] ?>" placeholder="NIM" required><br>
                                <input type="text" name="nama_edit" value="<?= $mahasiswa[1] ?>" placeholder="Nama" required><br>
                                <input type="text" name="alamat_edit" value="<?= $mahasiswa[2] ?>" placeholder="Alamat" required><br>
                                <input type="text" name="angkatan_edit" value="<?= $mahasiswa[3] ?>" placeholder="Angkatan" required><br>
                                <input type="submit" name="edit" value="Simpan">
                            </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
        <h3>Tambah Data Mahasiswa</h3>
        <form method="post" action="">
            <input type="text" name="nim" placeholder="NIM" required><br>
            <input type="text" name="nama" placeholder="Nama" required><br>
            <input type="text" name="alamat" placeholder="Alamat" required><br>
            <input type="text" name="angkatan" placeholder="Angkatan" required><br>
            <input type="submit" name="submit" value="Tambah">
        </form>
        <center><a href="logout.php" class="logout-link">Logout</a></center>
    </div>
</body>
</html>

