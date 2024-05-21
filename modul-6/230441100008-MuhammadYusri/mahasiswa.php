<?php
session_start();

//Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
$nama = $_SESSION["nama"];
$username = $_SESSION["username"];

include "service/database.php";

// Operasi CRUD
// Tambah data
if (isset($_POST['tambah'])) {
    $nim            = $_POST['nim'];
    $nama           = $_POST['nama'];
    $usia           = $_POST['usia'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $asal_kota      = $_POST['asal_kota'];
    $angkatan       = $_POST['angkatan'];
    $prodi          = $_POST ['prodi'];
    $jurusan        = $_POST['jurusan'];


    $cek_data = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $result_check = $db->query($cek_data);

    if ($result_check->num_rows > 0) { //num_rows adalah
        $pesan = "Data dengan NIM $nim sudah ada";
    } else {

        $sql = "INSERT INTO mahasiswa
        (nim, nama, usia, jenis_kelamin, asal_kota, angkatan, prodi, jurusan)
        VALUES 
        ('$nim', '$nama', '$usia', '$jenis_kelamin', '$asal_kota', '$angkatan', '$prodi', '$jurusan')";
    if ($db->query($sql) === TRUE) {
        $pesan = "Data berhasil ditambahkan";
    } else {
        $pesan = "Data gagal dimasukkan" . $sql . "<br>" . $db->error;
    }
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            
        }

        /* Navbar */
        nav {
            background-image: url(background-3.jpg);
            /* background-repeat: no-repeat; */
            background-size:100%;
            color: #fff;
            padding: 10px 96px;
            text-align: center;
            border-radius: 30px;

        }
        /* Body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            margin:2rem;
            /* background-image: url(bg.jpg) */

           
        }

        /* Heading */
        h1, h2 {
            text-align: center;
            margin-bottom: 10px;
            margin-top: 10px;
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

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            padding: 1px;
            
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            padding: 9px;
            

        }

        th {
            background-color: #ff105f;
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
            border-radius: 30px;
            background: linear-gradient(to right, #ff105f, #ffad06);

        }
        p {
            text-align: center;

        }

        a:hover {
            background-color: #45a049;
            
        }
        tr, td {
            text-align: center;
            font-weight: bold;

        }
            
    </style>
    
</head>

<body>
    
    <nav>
    <div class="navbar">
        <h1>Selamat Datang di Dashboard, <span class="user-name"><i><?php echo $nama; ?></i></span></h1>
        <div class="user-info">
        </div>
    </div>
    </nav>  
    <br>
    <h1>Data Mahasiswa</h1>
    <!-- Form tambah data -->
    <h2>Tambah Data</h2>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="usia">Usia:</label>
        <input type="text" id="usia" name="usia" required>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="jenis_kelamin">
            <option value="">Pilih jenis Kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="asal_kota">asal kota:</label>
        <input type="text" id="asal_kota" name="asal_kota" required>

        <label for="angkatan">Angkatan:</label>
        <input type="text" id="angkatan" name="angkatan" required>

        <label for="prodi">Prodi:</label>
        <input type="text" id="prodi" name="prodi" required>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required>

        <input type="submit" name="tambah" value="Tambah">
    </form>
    <p>
        <?php if (isset($pesan)) echo "<p>$pesan</p>"; ?>
    </p>

    <!-- Tabel data mahasiswa -->
    <br>
    <br>
    <h2>Daftar Mahasiswa</h2>
    <div>
        <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Jenis Kelamin</th>
            <th>asal kota</th>
            <th>Angkatan</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nim'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['usia'] . "</td>";
                echo "<td>" . $row['jenis_kelamin'] . "</td>";
                echo "<td>" . $row['asal_kota'] . "</td>";
                echo "<td>" . $row['angkatan'] . "</td>";
                echo "<td>" . $row['prodi'] . "</td>";
                echo "<td>" . $row['jurusan'] . "</td>";

                echo "<td><span><a href='?hapus=" . $row['id'] . "'>Hapus</a></span> ";
                echo "<span><a href='update.php?id=" . $row['id'] ."'>Update</a></span>  </td>"; // aksi update
                echo "</td>";

            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
    </div>
    

    <a href="logout.php">Logout</a>
</body>
</html>