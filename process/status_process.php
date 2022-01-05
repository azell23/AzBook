<?php 
session_start();
require ('../admin/koneksi.php');

$content =$_POST['content'];
$username = $_SESSION['username'];


$sqluser = "SELECT id_user FROM user WHERE username = '$username'";
$resultUser = $koneksi->query($sqluser);
$user_id=$resultUser->fetch_assoc()['id_user'];

print_r($username);
return;

$sql= "INSERT INTO status(user_id, content)VALUES('$user_id', '$content')";

if ($koneksi->query($sql)) {
  $msg = "Status berhasil di update";
} else {
  $msg = "Gagal membuat status";
}
  
  mysqli_close($koneksi);
  
header("location: ../index.php?msg= " .$msg) 

?>