<?php

    session_start();
    include('admin/koneksi.php');
    if(!$_SESSION['login_user']){
        header("location:login.php");
    }
    $get_id = $_GET['id'];
    // $sqlFetchStatus = "SELECT * FROM status LEFT JOIN user ON status.user_id = id_user WHERE del_flage=0 AND id=".$_GET['id'];
    // while($rowstatus = mysqli_fetch_array($sqlFetchStatus)){
    //     $status = $rowstatus['content'];
    // }
    $statement = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user=".$_GET['id']);
    while($row = mysqli_fetch_array($statement)){
        $nama = $row['username'];
        $created_at = $row['created_at'];
    }
    $statement_coment = mysqli_query($koneksi,"SELECT * FROM comment WHERE del_flage= 0");
   


?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AZEL</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="https://kit.fontawesome.com/5696372c8c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    

</head>
<body>
    <?php include('include/nav.php') ?>
    <div class="container">
        <?php include('include/left-bar_index.php') ?>
        <!-------- main-sidebar------------- -->
            <div class="post-container">
                <div class="post-row">
                    <div class="user-profile">
                        <img src="images/str2.png" alt="">
                        <div>
                            <p><?= $nama; ?></p>
                            <span><?= $created_at; ?></span>
                        </div>
                    </div>
                    <a href="#"><i class="fas fa-ellipsis-v"></i></small></a>
                </div>
                  
                <p class="post-text"></a></p>
                    <img src="images/post1.png" class="post-img" >

                    <div class="post-row">
                        <div class="activity-icons">
                            <div><img src="images/like-blue.png"></div>
                            <div><img src="images/comments.png"></div>
                            <div><img src="images/share.png"></div>


                        </div>
 
                    </div>
                    <hr class="garis-bawah">
                    <div class="komen-row">
                        
                        <div class="user-profile">
                            <div class="online">
                            <img src="images/propil.png" >
                            </div>
                            <div class="write">                                
                                   <form action="post_coment.php" method="POST">
                                        <input type="text"   name="coment">
                                        <input type="hidden" name="id"  value="<?php echo $get_id; ?>">
                                        <input type="submit" name="submit" style="background-color: blue; color: white; margin-bottom: 0px; margin-left: 100px;" value="Coment">                                
                            </div>
                        </div>
                        
                        <br>
                       <?php  while($row_coment = mysqli_fetch_array($statement_coment)): ?>
                            <div class="user-profile">
                            <img src="images/str2.png" alt="">
                            <div class="search-book">
                                <div>
                                    <p><?= $_SESSION['username']; ?></p>
                                    <span><?= $row_coment['content']; ?></span>
                                </div>
                               
                                
                            </div>
                        </div>
                        <div class="ketkomen">
                            <div><?= $row_coment['created_at']; ?></div>
                            <div class="suka" >Suka </div>
                            <a href="hapus_coment.php">Hapus</a>       
                        </div>

                        <?php endwhile; ?>
                        </form>
                        
                        
                        <br>

                        <!-- <div class="user-profile">
                            <img src="images/str4.png" alt="">
                            <div class="search-book">
                                <div>
                                    <p>Ansellma</p>
                                    <span>Ajakin laaa</span>
                                </div>
                               
                                
                            </div>
                        </div>
                        <div class="ketkomen">
                            <div>Just Now </div>
                            <div class="suka" >Suka </div>
                            <div class="suka" >Balas </div>         
                        </div> -->
                        <br>
                        <!-- <div class="user-profile">
                            <img src="images/str3.png" alt="">
                            <div class="search-book">
                                <div>
                                    <p>Nurul</p>
                                    <span>Nice</span>
                                </div>
                               
                                
                            </div>
                        </div>-->

                    </div> 
                    
                   
         
            </div>
            <?php include('include/right-bar_index.php') ?>
</div>
<?php include('include/footer.php') ?> 
<script src="script.js"></script>   
 
</body>
</html>