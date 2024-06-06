<?php
    if (isset($_POST['cariMahasiswa'])) {
        $keywordM = $_POST['keywordM'];
    }
    
    $queryM = "SELECT * FROM mahasiswa 
    INNER JOIN prodi ON prodi.id_prodi = mahasiswa.id_prodi
    INNER JOIN jurusan ON jurusan.id_jurusan = prodi.id_jurusan";
    
    if (!empty($keywordM)) {
        $queryM .= " WHERE
        mahasiswa.nim LIKE '%$keywordM%' OR 
        mahasiswa.nama LIKE '%$keywordM%' OR 
        mahasiswa.tgl_lahir LIKE '%$keywordM%' OR 
        mahasiswa.alamat LIKE '%$keywordM%' OR 
        mahasiswa.jenis_kelamin LIKE '%$keywordM%' OR 
        jurusan.nama_jurusan LIKE '%$keywordM%' OR 
        prodi.nama_prodi LIKE '%$keywordM%'";
    }
    
    $selectMahasiswa = mysqli_query($koneksi, $queryM);
    $totalMahasiswa = mysqli_num_rows($selectMahasiswa);

    function mahasiswaByNim($nim) {
        global $koneksi;
        $query = mysqli_query($koneksi,
        "SELECT * FROM mahasiswa 
        INNER JOIN prodi ON prodi.id_prodi = mahasiswa.id_prodi
        INNER JOIN jurusan ON jurusan.id_jurusan = prodi.id_jurusan
        INNER JOIN fakultas ON fakultas.id_fakultas = jurusan.id_fakultas
        WHERE nim = '$nim'
        ");
        
        return mysqli_fetch_array($query);
    }

    if(isset($_POST['TambahMahasiswa'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $id_prodi = $_POST['prodi'];
        $alamat = $_POST['alamat'];
        if(!empty($_FILES['foto']['name'])) {
            $rand = rand();
            $filename = $_FILES['foto']['name'];
            $foto = $rand.'_'.$filename;
        } else {
            $foto = "";
        }

        $query = mysqli_query($koneksi, 
        "INSERT INTO mahasiswa VALUES 
        ('$nim','$nama','$tgl_lahir','$jenis_kelamin','$id_prodi','$alamat','$foto')
        ");
        move_uploaded_file($_FILES['foto']['tmp_name'], './../img/'.$foto);

        header('Location: dashboard/index.php?mahasiswa');
    }

    if(isset($_POST['EditMahasiswa'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $id_prodi = $_POST['prodi'];
        $alamat = $_POST['alamat'];
        if(!empty($_FILES['foto']['name'])) {
            $foto = rand().'_'.$_FILES['foto']['name'];
        } else {
            $foto = "";
        }

        if(empty($foto)) {
            $query = mysqli_query($koneksi, 
            "UPDATE mahasiswa SET 
            nama='$nama',
            tgl_lahir='$tgl_lahir',
            jenis_kelamin='$jenis_kelamin',
            id_prodi='$id_prodi',
            alamat='$alamat'
            WHERE nim = '$nim'
            ");
        } else {
            $query = mysqli_query($koneksi, 
            "UPDATE mahasiswa SET 
            nama='$nama',
            tgl_lahir='$tgl_lahir',
            jenis_kelamin='$jenis_kelamin',
            id_prodi='$id_prodi',
            alamat='$alamat',
            foto='$foto'
            WHERE nim = '$nim'
            ");
            move_uploaded_file($_FILES['foto']['tmp_name'], './../img/'.$foto);
        }

        header('Location: dashboard/index.php?mahasiswa');        
    }
    
    if(isset($_POST['HapusMahasiswa'])) {
        $nim = $_POST['HapusMahasiswa'];
        mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = '$nim'");
        header('Location: dashboard/index.php?mahasiswa');
    }

    $nim = $nama = $tgl_lahir = $jenis_kelamin = 
    $id_fakultas = $fakultas = 
    $id_jurusan = $jurusan = 
    $id_prodi = $prodi = 
    $alamat = "";
    $btn = "Tambah";

    if(isset($_GET['nim'])) {
        $btn = "Edit";
        $data = mahasiswaByNim($_GET['nim']);
        $nim = $data['nim'];
        $nama = $data['nama'];
        $tgl_lahir = $data['tgl_lahir'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $id_fakultas = $data['id_fakultas'];
        $fakultas = $data['nama_fakultas'];
        $id_jurusan = $data['id_jurusan'];
        $jurusan = $data['nama_jurusan'];
        $id_prodi = $data['id_prodi'];
        $prodi = $data['nama_prodi'];
        $alamat = $data['alamat'];
    }
?>