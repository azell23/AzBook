<?php 
session_start();
include 'admin/koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/stylelogin.css">
    <title>Register Page</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Register</h2>
            <form method="POST" action="process/register_process.php" >
            <input type="text" placeholder="Username" id="username" name="username" class="form-input" required >
            <input type="text" placeholder="Email" id="email" name="email" class="form-input" required >
            <input type="password" placeholder="Password" id="password"  name="password" class="form-input" required >

            <button type="submit" name="register" class="btn btn-primary btn-block" id="submit">
										Register
			</button>
            <br>
            </form>
            
            <a href="login.php">Login</a>    
        </div>
        
        
    </div>
</body>
</html>

