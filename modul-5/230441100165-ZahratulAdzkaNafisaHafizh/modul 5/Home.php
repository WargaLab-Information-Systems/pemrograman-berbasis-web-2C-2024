<?php
session_start();
if(!isset($_SESSION['username'])) {
// Jika blm memasukkan data login akan tetap mengarah ke halaman login
header("Location: login.php");
exit();
}
$username = $_SESSION['username']
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, 
initial-scale=1, shrink-to-fit=no">
<title>Home</title>
<style>
body {
font-family: Arial, sans-serif;
}
.container {
max-width: 400px;
margin: 0 auto;
padding: 20px;
margin-top: 50px;
}
.card {
margin-top: 20px;
border-radius: 5px;
box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
color : #A61F69;
background-color: #F8EDFF;
padding: 20px;
}
.text-center {
text-align: center;
}
a {
color: #007bff;
text-decoration: none;
}
a:hover {
text-decoration: underline;
}
</style>
</head>
<body>
    <div class="container">
    <div class="card">
    <div class="card-body">
    <?php
    // Tampilkan username yang telah disimpan 
    
    if(isset($username)){
    echo '<p>Selamat Datang ' . $username . 
    '(◕ᴗ◕✿)</p>';
    }
    ?>
    <a href="data_mahasiswa.php">selanjutnya >></a>
    <br>
    <a href="logout.php">logout</a>
    </div>
</div>
</div>
</body>
</html>