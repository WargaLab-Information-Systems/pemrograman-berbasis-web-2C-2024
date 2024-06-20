<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
     <style>
     a{
	float: right;
	background: #555;
     color: #fff;
	padding: 10px 15px;
	border-radius: 5px;
	margin-right: 10px;
	border: none;
	text-decoration: none;
     }
     a:hover{
     background-color: salmon;
     color: #fff;
     border-radius: 0.5rem;
     transition: 0.5s;
     }
     </style>
</head>
<body>
     <h1>Selamat Datang  <?php echo $_SESSION['name']; ?></h1>
     <a href="logout.php" >Logout</a>

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>