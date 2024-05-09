<?php
session_start();

//Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include "service/database2.php";

// Operasi CRD
// Tambah data
if (isset($_POST['tambah'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    $sql = "INSERT INTO mahasiswa (nim, nama, alamat, angkatan) VALUES ('$nim', '$nama', '$alamat', '$angkatan')";

    if ($db->query($sql) === TRUE) {
        $pesan = "Data berhasil ditambahkan";
    } else {
        $pesan = "Error: " . $sql . "<br>" . $db->error;
    }
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $sql = "DELETE FROM mahasiswa WHERE id=$id";

    if ($db->query($sql) === TRUE) {
        $pesan = "Data berhasil dihapus";
    } else {
        $pesan = "Error: " . $sql . "<br>" . $db->error;
    }
}

// Tampilkan data
$sql = "SELECT * FROM mahasiswa";
$result = $db->query($sql);
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
    <?php if (isset($pesan)) echo "<p>$pesan</p>"; ?>

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
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nim'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['angkatan'] . "</td>";
                echo "<td><a href='?hapus=" . $row['id'] . "'>Hapus</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
        }
        ?>
    </table>

    <a href="home.php">Kembali ke Halaman Home</a>
    <a href="logout.php">Logout</a>
</body>
</html>