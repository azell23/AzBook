<?php

include ('koneksi.php');
session_start();
if(isset($_GET['id'])){

  $user_id = $_GET['id'];
  $del_flage= 1;

$statement =mysqli_query($koneksi,"UPDATE status SET del_flage='$del_flage' WHERE id ='$user_id' ") ;

if ($statement) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $koneksi->error;
}
 
header("Location:index.php");
}
?>