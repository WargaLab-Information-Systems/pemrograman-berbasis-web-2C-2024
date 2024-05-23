<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h2>Data Mahasiswa</h2>
  
<a href="tambah_mhs.php">Tambah Baru</a>
  
<table border="1" width="600">
    <tr>
        <th>No.</th>
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
        $sql = "SELECT * FROM mahasiswa";
        $que = mysqli_query($sambungan, $sql); // eksekusi perintah $sql
        $no = 1;
        while ($data = mysqli_fetch_array($que)) {
            // deklarasi database
            $id = $data['id'];
            $nama = $data['nama'];
            $nim = $data['nim'];
            $umur = $data['umur'];
            $jenis_kelamin = $data['jenis_kelamin'];
            $prodi = $data['prodi'];
            $jurusan = $data['jurusan'];
            $asal_kota = $data['asal_kota'];
  
            echo "
                <tr>
                    <td align='center'>$no</td>
                    <td>$nama</td>
                    <td>$nim</td>
                    <td>$umur</td>
                    <td>$jenis_kelamin</td>
                    <td>$prodi</td>
                    <td>$jurusan</td>
                    <td>$asal_kota</td>
                    <td>
                        <a href='edit_mhs.php?id=$id'>Edit</a> |
                        <a href='delete_data.php?id=$id'>Hapus</a>
                    </td>
                </tr>
            ";
            $no++;
        }
    ?>
</table>
</body>
</html>
