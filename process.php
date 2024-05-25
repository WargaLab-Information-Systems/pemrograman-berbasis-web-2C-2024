<?php
session_start();


$list_user = [
    [
        'username' => 'lavelia',
        'password' => '755'
    ]
];


$user = [
    'username' => $_POST['username'],
    'password' => $_POST['password'],
];


$not_found = true;

foreach ($list_user as $key => $registered_user) {

    
    if ($registered_user['username'] == $user['username']) {
        $not_found = false; 

        if ($registered_user['password'] == $user['password']) {

            $_SESSION['login'] = true;
            $_SESSION['username'] =  $user['username'];

           
            header("Location: Home.php");
            exit(); 
        } else {
            $_SESSION['error'] = 'Password anda salah';
            break; 
        }
    }
}

// Jika user tidak ditemukan
if ($not_found) {
    $_SESSION['error'] = 'Username tidak ditemukan';
}

// Mengarahkan ke halaman login.php setelah mengatur pesan kesalahan
header("Location: login.php");
exit(); // Penting untuk memastikan tidak ada output sebelum header
?>