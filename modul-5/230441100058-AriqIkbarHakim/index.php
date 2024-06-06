<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <style>
body {
    background: #1690A7;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
}
*{
    font-family: sans-serif;
    box-sizing: border-box;
}
form {
    width: 500px;
    border: 2px solid #ccc;
    padding: 30px;
    background: #fff;
    border-radius: 15px;
}

h2 {
    text-align: center;
    margin-bottom: 40px;
}

input {
    display: block;
    border: 2px solid #ccc;
    width: 95%;
    padding: 10px;
    margin: 10px auto;
    border-radius: 5px;
}
label {
    color: #888;
    font-size: 18px;
    padding: 10px;
}

button {
    float: right;
    background: #555;
    padding: 10px 15px;
    color: #fff;
    border-radius: 0.5rem;
    margin-right: 10px;
    border: none;
}
button:hover{
    border-radius: 1rem;
    background: salmon;
    color: white;
    transition: 0.5s;
    cursor: pointer;
}
.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

h1 {
    text-align: center;
    color: #fff;
}

.ca {
    font-size: 14px;
    margin-left:11px ;
    display: inline-block;
    padding: 10px;
    text-decoration: none;
    color: white;
    background: #555;
    border-radius: 0.5rem;
}
.ca:hover {
    text-decoration: none;
    border-radius: 1rem;
    background: salmon;
    color:white;
    transition: 0.5s;
} 
    </style>
</head>
<body>
     <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>
        
         <label>NIM</label>
        <input type="text" name="nim" placeholder="NIM"><br>

        <button type="submit">Login</button>
     </form>
</body>
</html>
