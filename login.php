<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MODUL 5</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-md-4 offset-md-4">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-warning text-center" role="alert">
                    <?php echo $_SESSION['error']?>
                </div>
            <?php } ?>
                <div class="card">
                    <div class="cardtittle">
                        <h1>Login</h1>
                    </div>
                    <div class="card-body">
                        <form action="process.php" method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" class="custom-input" id="username" aria-describedby="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password: </label>
                                <input type="password" name="password" class="custom-input" id="password" placeholder="Kata Sandi">
                            </div>

                            <button type="submit" class="custom-button">Submit</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
</body>
</html>
