<?php
session_start();  //session adalah

//Cek apakah user sudah login
if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
    exit();
}

// Inisialisasi array mahasiswa jika belum ada di session
if (!isset($_SESSION['mahasiswa'])) {
    $_SESSION['mahasiswa'] = array();
}

// Ambil data mahasiswa dari session
    $mahasiswa = $_SESSION['mahasiswa'];
// Hapus data
if (isset($_GET['hapus'])) {
    $nimHapus = $_GET['hapus'];

    foreach ($mahasiswa as $key => $data) { //foreach adalah perulangan yang digunakan untuk array, key karena array seperti dictionary python jadi ada key dan value 
        if ($data['nim'] == $nimHapus) {
            unset($mahasiswa[$key]);
            unset($_SESSION['mahasiswa'][$key]);
            break;
        }}}

// Tambah data
if (isset($_POST['tambah'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    $data = array(
        'nim' => $nim,
        'nama' => $nama,
        'alamat' => $alamat,
        'angkatan' => $angkatan
    );

    $mahasiswa[] = $data;
    $_SESSION['mahasiswa'] = $mahasiswa; // Simpan data baru ke dalam session
    $pesan = "Data berhasil ditambahkan";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            margin:2rem;
        }

        /* Heading */
        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Form */
        form {
            max-width: 500px;
            margin: 0 auto 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Links */
        a {
            display: inline-block;
            margin-right: 10px;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <?php
    // print_r($_SESSION["mahasiswa"]);
    if (isset($pesan)) echo "<p>$pesan</p>"; ?>

    <!-- Form tambah data -->
    <h2>Tambah Data</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required>

        <label for="angkatan">Angkatan:</label>
        <input type="text" id="angkatan" name="angkatan" required>

        <input type="submit" name="tambah" value="Tambah">
    </form>

    <!-- Tabel data mahasiswa -->
    <h2>Daftar Mahasiswa</h2>
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Angkatan</th>
            <th>Aksi</th>
        </tr>
        <?php
            $i = 0;
            foreach ($mahasiswa as $row) { //foreach adalah perulangan khusus array
                echo "<tr>";
                echo "<td>" . $row['nim'] . "</td>"; //row adalah variabel yang dipakai untuk menampung data dari array mahasiswa
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['angkatan'] . "</td>";
                echo "<td><a href='?hapus=" . $row["nim"] . "'>Hapus</a></td>";
                echo "</tr>";
                $i++;
            }
            ?>
    </table>

    <a href="home.php">Kembali ke Halaman Home</a>
    <a href="logout.php">Logout</a>
</body>
</html>