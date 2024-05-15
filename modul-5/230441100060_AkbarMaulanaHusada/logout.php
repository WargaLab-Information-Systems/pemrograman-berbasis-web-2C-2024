<?php
    session_start();
    for ($i=0; $i < count($_SESSION['user']); $i++) { 
        if ($_SESSION['user'][$i]['isLogin']) {
            $_SESSION['user'][$i]['isLogin'] = false;
        }
    }
    echo "<script>alert('Logout Berhasil...');</script>";
    header('Location: login.php');
?>