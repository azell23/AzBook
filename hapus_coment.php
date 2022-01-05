<?php

    session_start();
    include('admin/koneksi.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $del_flage = 1;
        $statement = mysqli_query($koneksi,"UPDATE comment SET del_flage='$del_flage' WHERE id=".$id);

        if($statement){
            header("location:detailPost.php?id=".$id);
        }else{
            header("location:index.php?id=".$id);
        }
    }


?>