<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM data_mahasiswa WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success mt-3'>Data berhasil dihapus.</div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: tabel.php");
?>
