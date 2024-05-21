<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include "service/database.php";

// Update data jika form disubmit
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $asal_kota = $_POST['asal_kota'];
    $angkatan = $_POST['angkatan'];
    $prodi = $_POST ['prodi'];
    $jurusan = $_POST['jurusan'];


    $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', asal_kota='$asal_kota', angkatan='$angkatan',prodi='$prodi',jurusan='$jurusan' WHERE id=$id";

    if ($db->query($sql) === TRUE) {
        $pesan = "Data berhasil diupdate";
        header("Location: mahasiswa.php");
        exit();
    } else {
        $pesan = "Error: " . $sql . "<br>" . $db->error;
    }
}

// Ambil data yang akan diupdate
$id = $_GET['id'];
$sql = "SELECT * FROM mahasiswa WHERE id=$id";
$result = $db->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Mahasiswa</title>
    <style>
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
            margin: 2rem;
        }
        
        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        /* Heading */
        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
        text-align: center;
        color: red;
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
        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 30px;
        }
        /* Style untuk option placeholder */
            #jenis_kelamin option[value="pilihan"] {
            color: #999; /* Warna abu-abu yang lebih pudar */
}


        form input[type="text"],
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 30px;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
            background: linear-gradient(to right, #ff105f, #ffad06);
        }

        form input[type="submit"]:hover { //hover adalah
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
            text-align: center;
            padding: 9px;
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
    <h1>Update Data Mahasiswa</h1>
    <?php if (isset($pesan)) echo "<p>$pesan</p>"; ?>

    <!-- Form update data -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php echo $row['nim']; ?>" required>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>

        <label for="usia">Usia:</label>
        <input type="text" id="usia" name="usia" value="<?php echo $row['usia']; ?>" required>

        <!-- jenis kelamin -->

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="jenis_kelamin">
            <option value="pilihan">Pilih jenis Kelamin</option>
            <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?>>Laki-laki</option>
            <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?>>Perempuan</option>
        </select>

        <label for="asal_kota">asal kota:</label>
        <input type="text" id="asal_kota" name="asal_kota" value="<?php echo $row['asal_kota']; ?>" required>

        <label for="angkatan">Angkatan:</label>
        <input type="text" id="angkatan" name="angkatan" value="<?php echo $row['angkatan']; ?>" required>

        <label for="prodi">Prodi:</label>
        <input type="text" id="prodi" name="prodi" value="<?php echo $row['prodi']; ?>" required>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo $row['jurusan']; ?>" required>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>