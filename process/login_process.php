<?php 
  session_start();
  include( '../admin/koneksi.php');

  if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    header("location:login_process.php".$username);
    $result= mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password= '$password' ");


    if ($result->num_rows > 0) {
      session_start();
        while($row = mysqli_fetch_array($result)){
          $_SESSION['id'] = $row['id_user'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['password'] = $row['password'];
          $_SESSION['login_user'] = true;
          header("location:../index.php?id=".$_SESSION['id']);
          echo "Login Berhasil";
        }  
      } 
 
  }

?>