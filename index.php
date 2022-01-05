<?php
session_start();
    include('admin/koneksi.php');
    if(!$_SESSION['login_user']){
        header("location:login.php");
    }

$sqlFetchStatus = "SELECT * FROM status LEFT JOIN user ON status.user_id = id_user WHERE del_flage=0 ORDER BY status.created_at DESC  ";
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
    
    <link rel="stylesheet" href="style/style.css">
    <script src="https://kit.fontawesome.com/5696372c8c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    

</head>
<body>
    <?php include('include/nav.php')  ?>
    <div class="container">
        <? include('include/left-bar_index.php') ?>
        <!-------- main-sidebar------------- -->
        <div class="main_content">

            <div class="main-content">
                <div class="story-gallery ">
                    <div class="story story1">
                    </div>
                    <div class="story story2">
                        
                    </div>
                    <div class="story story3">
                       
                    </div>
                    <div class="story story4">
                        
                    </div>
                    <div class="story story5">
                       
                    </div>
                    
                </div>

            </div>
            <form action="index_proses.php" method="POST" >
                <div class="write-post-container">
                    <div class="user-profile">
                        <img src="images/propil.png" alt="">
                        <div>
                            <p><?php echo $_SESSION['username']; ?></p>
                        </div>
                    </div>
                    <input type="hidden" name="id_user" value="<?php echo $id; ?>">

                    <div class="post-input-container">
                        <div class="placepost">
                        <input type="text" name="content" id="content" placeholder="What do you think ?">
                        <button type="submit" name="submit" class="btn-post" style="margin-top: 0px; margin-left: 40px; background: blue; color: white; width: 70px;"  >Post</button>
                    
                    </div>
                        <div class="add-post-links">
                            <a href="#"><img src="images/live-video.png" >Live</a>
                            <a href="#"><img src="images/photo.png" >Photo/Video</a>
                            <a href="#"><img src="images/feeling.png" >Feling</a>
                        </div>
                </div>
                
            </form>
            </div>
                <div>
                    <?php if($resultStatus->num_rows > 0):?>
                        <?php while($row = $resultStatus->fetch_assoc()) : ?>
                            <div class='post-container'>
                            <div class='post-row'>
                                <div class='user-profile'>
                                    <img src='images/str2.png' alt=''>
                                    <div>
                                        <p><?= $row['username']; ?></p>
                                        
                                    </div>
                                </div>
                                <a href='#'><i class='fas fa-ellipsis-v'></i></small></a>
                            </div>
                              
                            <p class='post-text'><?= $row['content'];?></a></p>
                            <div class='post-row'>
                                <div class='activity-icons'>
                                    <div><img src='images/like-blue.png'></div>
                                    <div class='komen'><a href="detailPost.php?id=<?= $row['id_user']; ?>" style='text-decoration:none'><img src='images/comments.png'></a></div>
                                    <!-- <input type="text" value="<?php echo $row['id_user']; echo $row['id'];?>"> -->
                                    <div><img src='images/share.png'></div>
        
        
                                </div>
                            </div>
                        </div>   
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
        </div>
        <?php include('include/right-bar_index.php') ?>
</div>
<?php include('include/footer.php') ?>   
<script src="script.js"></script>   
 
</body>
</html>