<?php 
session_start();
include './admin/koneksi.php';

if(isset($_SESSION['login_user'])){
    header("location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/stylelogin.css">
    <title>Login Page</title>
</head>
<body>
    <form action="process/login_process.php" method="POST">

        <div class="container">
            <div class="card">
                <h2>Login</h2>
                
                <input type="text" placeholder="Username" id="username" name="username" class="form-input" required >
                <input type="password" placeholder="Password" id="password"  name="password" class="form-input" required >

                <input type="submit" name="login" class="btn btn-primary btn-block" id="submit" value="Login">
                <br>
                <br>
                <a href="register.php">Register</a>
            </div>
        </div>
    </form>
</body>
</html>

