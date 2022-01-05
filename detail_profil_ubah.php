<?php

    session_start();
    include('admin/koneksi.php');
    if(isset($_POST['submit'])){
        $id_user= $_POST['id'];
        $username =$_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $statement = mysqli_query($koneksi,"UPDATE user SET username='$username', email='$email',
        password='$password' WHERE id_user=".$id_user);

        if($statement){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert"> Berhasil Mengubah Data </div>' ;
            header("location:profile.php");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert"> Gagal Mengubah Data </div>' ;
            header("location:profile.php");
        }
    }


?>