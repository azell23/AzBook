<?php

    session_start();
    include('admin/koneksi.php');
    $statement = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user=".$_SESSION['id']);
    while($row = mysqli_fetch_array($statement)){
        $id = $row['id_user'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['email'] = $row['email'];
    }

    $sqlFetchStatus = "SELECT * FROM status LEFT JOIN user ON status.user_id = id_user WHERE del_flage=0  ORDER BY status.created_at DESC  ";
    $resultStatus =$koneksi->query($sqlFetchStatus);

    $statement = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user=".$_SESSION['id']);
    while($row = mysqli_fetch_array($statement)){
        $id = $row['id_user'];
    }


?>




<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AZEL</title>
    <link rel="stylesheet" href="style/styleprofile.css">
    <script src="https://kit.fontawesome.com/5696372c8c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    

</head>
<body style="background-color: #c2cef7;">
    <?php include("include/nav.php");?>
    <div class="banner">
        <img src="images/banner 1.png">
        <div class="pp">
        <img src="images/pp.png">
        </div>        
            <div class="Nama" style="margin-left: 680px;">
                <p><?php echo $_SESSION['username']; ?></p>
            </div>            
            <div class="Nama3" style="margin-left: 660px;">
                <a href="detail_profil.php" class="btn btn-primary">Edit Details</a>
            </div>    
            <div class="row justify-content-end">
                        <div class="col-md-4">
                             <?php
                            if(!empty($_SESSION['message'])){
                                echo $_SESSION['message'];
                                $_SESSION['message'] = null;
                            }
                            ?>
                        </div>
                    </div>
        
    </div>
    
    
     
    

    <div class="container">
        <?php include('include/left-bar_profile.php')?>    
        <!-------- main-sidebar------------- -->
        <div class="main_content">

            
            <div class="write-post-container">
                <div class="user-profile">
                    <img src="images/propil.png" alt="">
                    <div>
                        <p><?php echo $_SESSION['username']; ?></p>
                    </div>
                </div>

                <div class="post-input-container">
                    <div class="placepost">
                    <input type="text" placeholder="What do you think ?">
                    <button type="button" class="btn-post">Post</button>
                
            </div>
                    <div class="add-post-links">
                        <a href="#"><img src="images/live-video.png" >Live</a>
                        <a href="#"><img src="images/photo.png" >Photo/Video</a>
                        <a href="#"><img src="images/feeling.png" >Feling</a>
                    </div>
                </div>
                
            </div>
            <?php
                    if($resultStatus->num_rows > 0){
                        while($row = $resultStatus->fetch_assoc()){
                            

                            echo"<div class='post-container'>
                            <div class='post-row'>
                                <div class='user-profile'>
                                    <img src='images/str2.png' alt=''>
                                    <div>
                                        <p>$row[username]</p>
                                        
                                    </div>
                                </div>
                                <a href='#'><i class='fas fa-ellipsis-v'></i></small></a>
                            </div>
                              
                            <p class='post-text'>$row[content] </a></p>
                            <div class='post-row'>
                                <div class='activity-icons'>
                                    <div><img src='images/like-blue.png'></div>
                                    <div class='komen'><a href='detailPost.php' style='text-decoration:none'><img src='images/comments.png'></a></div>
                                    <div><img src='images/share.png'></div>
        
        
                                </div>
                            </div>
                        </div>";
                        }
                    } else{
                        echo"Tidak ada status";
                    }
                    ?>
            <!-- <div class="post-container">
                <div class="post-row">
                    <div class="user-profile">
                        <img src="images/propil.png" alt="">
                        <div>
                            <p><?php echo $_SESSION['username']; ?></p>
                            <span>5 minutes ago</span>
                        </div>
                    </div>
                    <a href="#"><i class="fas fa-ellipsis-v"></i></small></a>
                </div>
                  
                <p class="post-text">good things are ahead🦋 </a></p>
                    <img src="images/poss1.png" class="post-img" >

                    <div class="post-row">
                        <div class="activity-icons">
                            <div><img src="images/like-blue.png">20</div>
                            <div class="komen"><a href="detailPost.html" style="text-decoration:none"><img src="images/comments.png"></a>4</div>
                            <div><img src="images/share.png">3</div>


                        </div>
 
                    </div>
            </div> -->
            <!-- <div class="post-container">
                <div class="post-row">
                    <div class="user-profile">
                        <img src="images/propil.png" alt="">
                        <div>
                            <p><?php echo $_SESSION['username']; ?></p>
                            <span>10 minutes ago</span>
                        </div>
                    </div>
                    <a href="#"><i class="fas fa-ellipsis-v"></i></small></a>
                </div>
                  
                <p class="post-text">go where u feel the most alive✨ </a></p>
                    <img src="images/poss2.png" class="post-img" >

                    <div class="post-row">
                        <div class="activity-icons">
                            <div><img src="images/like-blue.png">15</div>
                            <div class="komen"><a href="detailPost.html" style="text-decoration:none"><img src="images/comments.png"></a>4</div>
                            <div><img src="images/share.png">7</div>


                        </div>
 
                    </div>
            </div> -->
            
        </div>
      <?php include('include/right-bar_profile.php') ?>
</div>
<?php include('include/footer.php') ?>
<script src="script.js"></script>   
 
</body>
</html>