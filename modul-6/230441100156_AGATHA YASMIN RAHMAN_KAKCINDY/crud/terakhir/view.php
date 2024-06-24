<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>

<style>
    /* CSS untuk gaya tabel */
table {
    border-collapse: collapse;
    width: 100%;
    font-family: Arial, sans-serif;
}

/* CSS untuk header tabel */
th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
    padding: 10px;
    text-align: left;
}

/* CSS untuk sel data dalam tabel */
td {
    border: 1px solid #ddd;
    padding: 10px;
}

/* CSS untuk baris ganjil dalam tabel */
tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* CSS untuk tombol aksi */
.btn {
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 3px;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
}

</style>
<body>
    <h1>Data Mahasiswa</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Asal Kota</th>
            <th>Aksi</th>
        </tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "mahasiswa_db");
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM mahasiswa";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["nama"]."</td>";
                echo "<td>".$row["nim"]."</td>";
                echo "<td>".$row["umur"]."</td>";
                echo "<td>".$row["jenis_kelamin"]."</td>";
                echo "<td>".$row["prodi"]."</td>";
                echo "<td>".$row["jurusan"]."</td>";
                echo "<td>".$row["asal_kota"]."</td>";
                echo "<td><a href='edit.php?id=".$row["id"]."'>Edit</a> | <a href='delete.php?id=".$row["id"]."' onclick='return confirmDelete()'>Hapus</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Tidak ada data</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    <br>
    <a href="index.php">Tambah Data Mahasiswa</a>
</body>
</html>
