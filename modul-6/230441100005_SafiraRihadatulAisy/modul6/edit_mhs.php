<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
  
    <?php 
    include 'koneksi.php'; // Pastikan file ini ada dan berisi informasi koneksi database Anda
    
    // Periksa apakah parameter 'id' telah diatur
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM mahasiswa WHERE id='$id'";// Persiapkan dan jalankan kueri SQL
        $que = mysqli_query($sambungan, $sql);
        
        if($que) {// Periksa apakah kueri berhasil dieksekusi
            if(mysqli_num_rows($que) > 0) { //Lakukan sesuatu jika terdapat baris data dalam hasil kueri
                $data = mysqli_fetch_array($que);
                $nama = $data['nama'];
                $nim = $data['nim'];
                $umur = $data['umur'];
                $jenis_kelamin = $data['jenis_kelamin'];
                $prodi = $data['prodi'];
                $jurusan = $data['jurusan'];
                $asal_kota = $data['asal_kota'];
            } else {
                echo "No data found with ID: $id";
                exit(); // Hentikan eksekusi lebih lanjut
            }
        } else {
            echo "Error: " . mysqli_error($sambungan);
            exit(); 
        }
    } else {
        echo "No ID specified";
        exit(); 
    }
    ?>
    
    <form action="ubah.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <p>
            Nama Mahasiswa : <br>
            <input type="text" name="nama" required value="<?php echo $nama; ?>">
        </p>   
        <p>
            NIM : <br>
            <input type="number" name="nim" required value="<?php echo $nim; ?>">
        </p>
        <p>
            Umur : <br>
            <input type="number" name="umur" required value="<?php echo $umur; ?>">
        </p>
        <p>
            Jenis Kelamin : <br>
            <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo ($jenis_kelamin == "Laki-laki") ? "checked" : ""; ?>>Laki-laki
            <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($jenis_kelamin == "Perempuan") ? "checked" : ""; ?>>Perempuan
        </p>
        <p>
            Prodi : <br>
            <input type="text" name="prodi" required value="<?php echo $prodi; ?>">
        </p>
        <p>
            Jurusan : <br>
            <input type="text" name="jurusan" required value="<?php echo $jurusan; ?>">
        </p>
        <p>
            Asal Kota : <br>
            <input type="text" name="asal_kota" required value="<?php echo $asal_kota; ?>">
        </p>
        <p>
            <input type="submit" value="SIMPAN">
        </p>
    </form>
</body>
</html>
