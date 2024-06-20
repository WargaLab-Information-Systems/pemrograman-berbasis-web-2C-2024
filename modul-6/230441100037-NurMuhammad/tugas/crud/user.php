<?php 
    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
        if(mysqli_num_rows($query) > 0 ) {
            $dataUser = mysqli_fetch_array($query);
            $_SESSION['user'] = $dataUser;
            header('Location: dashboard/index.php?home');
        } else {
            setInputError("Email atau Password salah");
            header('Location: login.php');
        }
    }
    if(isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");
        if(mysqli_num_rows($query) == 0 ) {
            $query = mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$username', '$email', '$password','','','petugas','')");
            header('Location: login.php');
        } else {
            setInputError("Email sudah ada");
            header('Location: login.php');
        }
    }
?>