<?php 
session_start();
include 'koneksi.php';

if(isset($_SESSION['login'])){
    header("location:index.php");
}


if( isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result=mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' ");

        if(mysqli_num_rows($result) === 1){
           $row =  mysqli_fetch_assoc($result);
           if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['password'] = $row['password'];
               header("location: index.php");
               exit;
           }   
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/stylelogin.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Login</h2>
            <form method="post" action="" id="login">
            <input type="text" placeholder="Username" id="username" name="username" class="form-input" required >
            <input type="password" placeholder="Password" id="password"  name="password" class="form-input" required >

            <button type="submit" name="login" class="btn btn-primary btn-block" id="submit">
										Login
									</button>
            </form>
        </div>
    </div>
</body>
</html>

