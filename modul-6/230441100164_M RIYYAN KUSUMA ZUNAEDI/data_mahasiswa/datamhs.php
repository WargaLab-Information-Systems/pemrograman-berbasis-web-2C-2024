<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="data.css">
</head>
<body>

<style>
ul {
	position: fixed;
	left:0;
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	background-color: #333;
	width: 100%;
    top: 0;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
</ul>


<div class="content">
    <h2>DATA MAHASISWA</h2>
    <table border="1">
        <tr>
            <th>NO</th>
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
    <button><a href="logout.php">LOGOUT</a></button>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2024 Perusahaan Anda. Hak cipta dilindungi.</p>
</div>

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

</body>
</html>
