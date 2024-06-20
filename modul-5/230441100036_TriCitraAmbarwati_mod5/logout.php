<?php
session_start(); //mengaktifkan session
session_unset(); //menghapus variabel dari sesi dan sesi masih ada
session_destroy(); //menghancurkan semua data yang terkait dengan sesi saat ini
header("Location: login.php");
exit;
?>