<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="data.css">
</head>
<body>

    <nav>
        <div class="navbar">
            <a href="datamhs.php">Home</a>
            <a href="tambah.php">Tambah Mahasiswa</a>
            <a href="index.php">Logout</a>
        </div>
    </nav>
<div class="container">
    <h2>DATA MAHASISWA</h2>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Umur</th>
            <th>Jenis kelamin</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Asal kota</th>
            <th>Aksi</th>
        </tr>
        <?php 
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi,"select * from mahasiswa");
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['Nama']; ?></td>
                <td><?php echo $d['NIM']; ?></td>
                <td><?php echo $d['Umur']; ?></td>
                <td><?php echo $d['Jenis_Kelamin']; ?></td>
                <td><?php echo $d['Prodi']; ?></td>
                <td><?php echo $d['Jurusan']; ?></td>
                <td><?php echo $d['Asal_kota']; ?></td>
                <td>
                    <button onclick="editFunction(<?php echo $d['id']; ?>)">EDIT</button>
                    <button onclick="hapusFunction(<?php echo $d['id']; ?>)">HAPUS</button>
                </td>
            </tr>
            <?php 
        }
        ?>
    </table><br>
    <button onclick="tambahFunction()">TAMBAH DATA MAHASISWA</button>
    <button ><a href="logout.php">LOGOUT</button>

    <script>
        function editFunction(id) {
            window.location.href = "edit.php?id=" + id;
        }

        function hapusFunction(id) {
            window.location.href = "hapus.php?id=" + id;
        }

        function tambahFunction() {
            window.location.href = "tambah.php";
        }
    </script>
</div>
<footer>
    <p>&copy; 21, Mei 2024. Evrilla Steviano Tumanggor</p>
</footer>
</body>
</html>
