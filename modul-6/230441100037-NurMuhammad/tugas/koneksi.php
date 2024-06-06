<?php 
    session_start();
    $koneksi = mysqli_connect("localhost", "root", "", "db_latihan");

    if ($koneksi->connect_error) die("Koneksi gagal: " . $koneksi->connect_error);

    function setInputError($pesan) {
        $_SESSION['inputError'] = $pesan;
    }

    function inputError() {
        if(isset($_SESSION['inputError'])) {
            echo "
            <span>".$_SESSION['inputError']."</span>
            ";
            unset($_SESSION['inputError']);
        }
    }

    include 'crud/mahasiswa.php';
    include 'crud/fakultas.php';
    include 'crud/user.php';
?>