<?php

    include('admin/koneksi.php');
    session_start();
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $nama_file = $_FILES['gambar']['name'];
        $ukuran_file = $_FILES['gambar']['size'];
        $tipe_file = $_FILES['gambar']['type'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $password = $_POST['password'];
        $path = "admin_image/".$nama_file;

        if($tipe_file == "image/jpg" || $tipe_file == "image/png"){
         if($ukuran_file <= 1000000){
             if(move_uploaded_file($tmp_file, $path)){
                $statement = mysqli_query($koneksi,"UPDATE admin SET password='$password',nama_gambar='$nama_file',ukuran='$ukuran_file',tipe='$tipe_file' ");
                if($statement){
                    $_SESSION['message'] = '<div class ="alert alert-success" role="alert"> Berhasil Mengubah Data Diri </div>' ;
                    echo "kntl";
                    header("location:profil_admin.php"); 
                }else{
                    $_SESSION['message'] = '<div class ="alert alert-danger" role="alert"> Gagal Mengubah Data </div>' ;
                    echo "kntl";
                    header("location:profil_admin.php"); 
                }
            }
        }
    }

        $statement2 = mysqli_query($koneksi,"UPDATE admin SET password='$password'");
        
        if($statement2){
           $_SESSION['message'] = '<div class ="alert alert-success" role="alert"> Berhasil Mengubah Data Diri </div>' ;
            echo "kntl";
            header("location:profil_admin.php");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert"> Gagal Mengubah Data </div>' ;
            echo "kntl";
            header("location:profil_admin.php"); 
        }



       
     

    




    }

?>