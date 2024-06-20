<?php 
session_start();

$users = array(
    array("id" => 1, "user_name" => "ariq ikbar hakim", "password" => md5("12345"), "name" => "Ariq Ikbar Hakim", "nim" => "230441100058")
);

if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['nim'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $nim = validate($_POST['nim']);

    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } else if(empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else if(empty($nim)) {
        header("Location: index.php?error=NIM is required");
        exit();
    } else {
        $pass = md5($pass);

        foreach ($users as $user) {
            if ($user['user_name'] === $uname && $user['password'] === $pass && $user['nim'] === $nim) {
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['id'] = $user['id'];
                header("Location: crud.php");
                exit();
            }
        }

        header("Location: index.php?error=Incorrect User name, password, or NIM");
        exit();
    }
    
} else {
    header("Location: index.php");
    exit();
}
?>
