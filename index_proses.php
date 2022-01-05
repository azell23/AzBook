<?php

    include('admin/koneksi.php');
    session_start();
    if(isset($_POST['submit'])){
        $id_user = $_POST['id_user'];
        echo $id_user;
        $content = $_POST['content'];
        $created_at = date('Y-m-d H:i:s');
        $del_flage = 0;

        $statement = mysqli_query($koneksi,"INSERT INTO status (user_id,content,created_at,del_flage) VALUES ('$id_user','$content','$created_at','$del_flage') ");

        if($statement){
            header("location:index.php");
        }else{
            header("location:index.php?=".$user_id);
        }
    }

?>