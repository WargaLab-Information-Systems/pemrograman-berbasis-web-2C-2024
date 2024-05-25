<?php
session_start();

if(empty($_SESSION['login'])){
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODUL 5</title>
    <link rel="stylesheet" href="home.css">

    
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="data.php">DATA</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <div class="kotak_login">
        <div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4  mt-5">
				<div class="card">
					<div class="card-title">
						<h1>Halaman Admin</h1>
					</div>
					<div class="card-body">
						<p>Hello <?php echo $_SESSION['username']?></p>
						<p>Kamu berhasil ke halaman admin.</p>
					</div>
				</div>
			</div>

		</div>
        </div>
	</div>
   
</body>
</html>
    
