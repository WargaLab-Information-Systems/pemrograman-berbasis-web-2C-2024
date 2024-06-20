<?php
include "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM data_mahasiswa WHERE id='$id'";
    if (mysqli_query($connect, $query)) {
        header("Location: tabelmhs.php");
    } else {
        echo "Gagal menghapus data: " . mysqli_error($connect);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
