<!-- home.php -->
<?php
session_start();


function tambahMahasiswa($nama, $nim, $jurusan, $alamat) {
    $mahasiswa_baru = array(
        "nama" => $nama,
        "nim" => $nim,
        "jurusan" => $jurusan,
        "alamat" => $alamat
    );
    $_SESSION['mahasiswa'][] = $mahasiswa_baru;
}

function hapusMahasiswa($index) {
    unset($_SESSION['mahasiswa'][$index]);
}


if(!isset($_SESSION['login_user'])){
    header("location: home.php");
    die();
}

// Tambahkan data mahasiswa
if(isset($_POST['tambah'])){
    tambahMahasiswa($_POST['nama'], $_POST['nim'], $_POST['jurusan'], $_POST['alamat']);
}

// Edit data mahasiswa
if(isset($_POST['edit'])){
    $_SESSION['mahasiswa'][$_POST['index']]['nama'] = $_POST['nama'];
    $_SESSION['mahasiswa'][$_POST['index']]['nim'] = $_POST['nim'];
    $_SESSION['mahasiswa'][$_POST['index']]['jurusan'] = $_POST['jurusan'];
    $_SESSION['mahasiswa'][$_POST['index']]['alamat'] = $_POST['alamat'];
}

// Hapus data mahasiswa
if(isset($_POST['hapus'])){
    hapusMahasiswa($_POST['index']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home - Selamat Datang, <?php echo $_SESSION['login_user']; ?>!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-image: url(https://images.pexels.com/photos/162622/facebook-login-office-laptop-business-162622.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);
        }
        .container {
            width: 90%;
            margin: 20px auto;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(0, 0, 0, 0);
            box-shadow: 0 0 10px rgba(0, 0, 0, 5);
            text-align: left; 
        }
        h2 {
            text-align: center;
            color: #0400ff;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.3);
            border-radius: 10px;
        }
        th, td {
            border: 1px solid #ccc;
            text-align: left;
            padding: 28px;
            background-color: #f8f9fa;
            color: #333;
        }
        th {
            background-color: #0400ff;
            color: #fff;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #dee2e6;
        }
        tr:hover {
            background-color: #adb5bd;
            color: #0400ff;
        }
        .links-container{
            text-align: right;
            margin-top: 50px;
            display: flex; 
            justify-content: space-between; 
        }
        .logout-link {
            display: inline-block;
            text-align: right;
            margin-top: 20px;
            margin-right: 20px;
            text-decoration: none;
            vertical-align: middle;
            margin: 0 10px;
            color: #333;
        }
        .welcome-link {
            display: inline-block;
            text-align: left;
            margin-top: 20px;
            margin-left: 20px;
            text-decoration: none;
            vertical-align: middle;
            margin: 0 10px;
            color: #333;
        }
        .welcome-link a, .logout-link a {
            color: #0400ff;
            text-decoration: none;
        }
        .welcome-link a:hover, .logout-link a:hover {
            color: #ff0000;
        }
        .form-container input[type="text"],
        .form-container input[type="submit"] {
            padding: 15px;
            margin: 10px 5px;
            width: calc(100% - 22px);
            border: none;
            border-radius: 8px;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-size: 16px;
        }
        .form-container input[type="text"]:focus {
            outline: none;
        }
        .form-container input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #218838;
        }
        .delete-button, .edit-button {
            width: 100%;
            background-color: #0400ff;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 8px;
            margin-right: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
            cursor: pointer;
            border: none;
            font-size: 14px;
            margin-bottom: 5px;
        }
        input[name=tambah]{
            margin-left: 13px;
            width: 200px;
        }
        input[name=nama]{
            margin-left: 6px;
            width: 240px;
        }
        input[name=nim]{
            margin-left: 12px;
            width: 202px;
        }
        input[name=jurusan]{
            margin-left: 14px;
            width: 314px;
        }
        input[name=alamat]{
            margin-left: 12px;
            width: 286px;
        }
        .delete-button:hover, .edit-button:hover {
            background-color: #ff0000;
        }
    </style>
    <script>
        function toggleForm(index) {
            var form = document.getElementById('edit-form-' + index);
            form.style.display === 'none' ? form.style.display = 'table-row' : form.style.display = 'none';
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Selamat Datang, <?php echo $_SESSION['login_user']; ?>!</h2>
        <h3>Tambah Mahasiswa</h3>
        <form method="post" action="">
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="nim" placeholder="NIM" required>
            <input type="text" name="jurusan" placeholder="Jurusan" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="submit" name="tambah" value="Tambah">
        </form>
        <h3>Daftar Mahasiswa</h3>
        <table>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php if(isset($_SESSION['mahasiswa'])): ?>
                <?php foreach($_SESSION['mahasiswa'] as $index => $mahasiswa): ?>
                    <tr>
                        <td><?php echo $mahasiswa['nama']; ?></td>
                        <td><?php echo $mahasiswa['nim']; ?></td>
                        <td><?php echo $mahasiswa['jurusan']; ?></td>
                        <td><?php echo $mahasiswa['alamat']; ?></td>
                        <td>
                            <button class="edit-button" onclick="toggleForm(<?php echo $index; ?>)">Edit</button>
                            <form method="post" action="">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <input type="submit" name="hapus" value="Hapus" class="delete-button">
                            </form>
                        </td>
                    </tr>
                    <tr id="edit-form-<?php echo $index; ?>" style="display: none;">
                        <td colspan="5">
                            <form method="post" action="">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <input type="text" name="nama" value="<?php echo $mahasiswa['nama']; ?>" required>
                                <input type="text" name="nim" value="<?php echo $mahasiswa['nim']; ?>" required>
                                <input type="text" name="jurusan" value="<?php echo $mahasiswa['jurusan']; ?>" required>
                                <input type="text" name="alamat" value="<?php echo $mahasiswa['alamat']; ?>" required>
                                <input type="submit" name="edit" value="Simpan">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <p class="links-container">
            <span class="welcome-link"><a href="home.php">Halaman Home</a></span>
            <span class="logout-link"><a href="logout.php">Logout</a></span>
        </p>
    </div>
</body>
</html>
