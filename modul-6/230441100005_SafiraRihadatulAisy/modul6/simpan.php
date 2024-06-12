<?php 
  
    include 'koneksi.php'; //mengambil/koneksi/
    $nama   = $_POST['nama'];
    $nim   = $_POST['nim'];
    $umur   = $_POST['umur'];
    $jenis_kelamin   = $_POST['jenis_kelamin'];
    $prodi   = $_POST['prodi'];
    $jurusan   = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];
  
      
    $sql = "INSERT INTO mahasiswa VALUES('', '$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi' , '$jurusan',  '$asal_kota')";
    $que = mysqli_query($sambungan, $sql);  //objek
    //peyimpanan
    if ($que) 
    {
        echo //adalah salah satu perintah atau statement
        "
            <script type='text/javascript'>
                alert('Data telah disimpan');
                window.location='data_mhs.php';
            </script>
        ";
    }
    else 
    {
        echo
        "
            <script type='text/javascript'>
                alert('Gagal disimpan');
                window.location='tambah_mhs.php';
            </script>
        ";
    }

  
?>