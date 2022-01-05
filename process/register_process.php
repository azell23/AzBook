<?php 
session_start();
require '../admin/koneksi.php';

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$encrypt=sha1($password);
$created_at = date('Y-m-d H:i:s');

$sql= "INSERT INTO user(username, email, password,created_at)VALUES('$username', '$email', '$encrypt','$created_at')";

if ($koneksi->query($sql)) {
  $msg = "Register Berhasil, Silahkan Login";
} else {
  $msg = "Register Gagal";
}
  
  mysqli_close($koneksi);
  
header("location: ../login.php?msg= " .$msg) 

?>