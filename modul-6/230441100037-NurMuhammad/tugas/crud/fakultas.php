<?php
    $selectFakultas = mysqli_query($koneksi, 
    "SELECT fakultas.*, COUNT(jurusan.id_jurusan) AS jumlah_jurusan
    FROM fakultas
    LEFT JOIN jurusan ON jurusan.id_fakultas = fakultas.id_fakultas
    GROUP BY fakultas.id_fakultas
    ");
    $totalFakultas = mysqli_num_rows($selectFakultas);

    $selectJurusan = mysqli_query($koneksi, 
    "SELECT jurusan.*, COUNT(prodi.id_prodi) AS jumlah_prodi
    FROM jurusan
    LEFT JOIN prodi ON prodi.id_jurusan = jurusan.id_jurusan
    GROUP BY jurusan.id_jurusan
    ");

    $selectProdi = mysqli_query($koneksi, "SELECT * FROM prodi");

    function selectAllById($id) {    
        global $koneksi;
        $query = mysqli_query($koneksi, 
        "SELECT * FROM prodi
        LEFT JOIN jurusan ON jurusan.id_fakultas = fakultas.id_fakultas
        LEFT JOIN prodi ON prodi.id_jurusan = jurusan.id_jurusan
        WHERE id_fakultas = '$id' OR id_jurusan = '$id' OR id_prodi = '$id'
        ");

        return mysqli_fetch_array($query);
    }

    // Fakultas
    if (isset($_POST['TambahFakultas'])) {
        $nama_fakultas = $_POST['nama'];

        $query = mysqli_query($koneksi, "INSERT INTO fakultas VALUES ('', '$nama_fakultas')");
        header('Location: dashboard/index.php?fakultas');
    }
    if (isset($_POST['EditFakultas'])) {
        $id_fakultas = $_POST['EditFakultas'];
        $nama_fakultas = $_POST['nama'];

        $query = mysqli_query($koneksi, "UPDATE fakultas SET nama_fakultas = '$nama_fakultas' WHERE id_fakultas = '$id_fakultas'");
        header('Location: dashboard/index.php?fakultas');
    }
    if (isset($_POST['HapusFakultas'])) {
        $id_fakultas = $_POST['HapusFakultas'];

        $query = mysqli_query($koneksi, "DELETE FROM fakultas WHERE id_fakultas = '$id_fakultas'");
        header('Location: dashboard/index.php?fakultas');
    }

    // Jurusan
    if (isset($_POST['TambahJurusan'])) {
        $id_fakultas = $_POST['TambahJurusan'];
        $nama_jurusan = $_POST['nama'];
        // echo $id_fakultas;
        // echo $nama_jurusan;
        // exit;

        $query = mysqli_query($koneksi, "INSERT INTO jurusan VALUES ('', '$nama_jurusan','$id_fakultas')");
        header('Location: dashboard/index.php?fakultas');
    }
    if (isset($_POST['EditJurusan'])) {
        $id_jurusan = $_POST['EditJurusan'];
        $nama_jurusan = $_POST['nama'];

        $query = mysqli_query($koneksi, "UPDATE jurusan SET nama_jurusan = '$nama_jurusan' WHERE id_jurusan = '$id_jurusan'");
        header('Location: dashboard/index.php?fakultas');
    }
    if (isset($_POST['HapusJurusan'])) {
        $id_jurusan = $_POST['HapusJurusan'];

        $query = mysqli_query($koneksi, "DELETE FROM jurusan WHERE id_jurusan = '$id_jurusan'");
        header('Location: dashboard/index.php?fakultas');
    }

    // Prodi
    if (isset($_POST['TambahProdi'])) {
        $id_jurusan = $_POST['TambahProdi'];
        $nama_prodi = $_POST['nama'];

        $query = mysqli_query($koneksi, "INSERT INTO prodi VALUES ('', '$nama_prodi','$id_jurusan')");
        header('Location: dashboard/index.php?fakultas');
    }
    if (isset($_POST['EditProdi'])) {
        $id_prodi = $_POST['EditProdi'];
        $nama_prodi = $_POST['nama'];

        $query = mysqli_query($koneksi, "UPDATE prodi SET nama_prodi = '$nama_prodi' WHERE id_prodi = '$id_prodi'");
        header('Location: dashboard/index.php?fakultas');
    }
    if (isset($_POST['HapusProdi'])) {
        $id_prodi = $_POST['HapusProdi'];

        $query = mysqli_query($koneksi, "DELETE FROM prodi WHERE id_prodi = '$id_prodi'");
        header('Location: dashboard/index.php?fakultas');
    }
?>