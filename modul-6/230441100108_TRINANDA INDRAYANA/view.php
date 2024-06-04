<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>

<style>

    table {
        border-collapse: collapse;
        width: 100%;
        font-family: Arial, sans-serif;
        background-color: #aed9e0;
    }
      body {
        background-color: #7FB3D5; 
    }

    
    th {
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
        padding: 10px;
        text-align: left;
    }


    td {
        border: 1px solid #ddd;
        padding: 10px;
    }

   
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    
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
    <center><h1>Data Mahasiswa</h1></center>
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
                

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>Tidak ada data</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    <br>
    <center><a href="tambah.php" class="btn btn-primary">Tambah Data Mahasiswa</a></center>
</body>
</html>
