<?php
session_start();
session_destroy();
// Ini mengirimkan header HTTP mentah ke browser. Header Location memberi tahu browser untuk mengalihkan ke URL yang ditentukan
//Setelah baris ini, browser akan menavigasi ke halaman login.php.
header("Location: login.php");
?>