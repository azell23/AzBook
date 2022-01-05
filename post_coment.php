<?php

    session_start();
    include('admin/koneksi.php');
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $coment = $_POST['coment'];
        $created_at = date('Y-m-d H:i:s');
        $del_flage = 0;

        $statement = mysqli_query($koneksi,"INSERT INTO comment(content,created_at,del_flage)
        VALUES('$coment','$created_at','$del_flage')");

        if($statement){
            header("location:detailPost.php?id=".$id);
        }else{
            header("location:index.php?id=".$id);
        }
    }

?>