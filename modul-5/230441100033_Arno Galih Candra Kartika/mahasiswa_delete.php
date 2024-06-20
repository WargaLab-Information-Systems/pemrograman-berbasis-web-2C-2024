<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$nim = $_GET['nim'];
foreach ($_SESSION['mahasiswa'] as $key => $mhs) {
    if ($mhs['nim'] == $nim) {
        unset($_SESSION['mahasiswa'][$key]);
        break;
    }
}

// Reindex the array to ensure no gaps in keys
$_SESSION['mahasiswa'] = array_values($_SESSION['mahasiswa']);

header('Location: mahasiswa.php');
?>
