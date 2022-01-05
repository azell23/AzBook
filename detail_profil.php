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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <section>
        <div class="container p-4">
            <div class="card shadow p-5">
                
                    <div class="row">
                        <div class="col-12 col-md-12 col-sm-12 mt-3">
                                <div class="card-title ">
                                    <h5><b>My Profile</b></h5>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h6 class="text-muted">Manage your profile information to control, protect and secure your account</h6>
                                        </div>
                                    </div>    
                                    <hr class="mt-3">
                                </div>
                                <form action="detail_profil_ubah.php"  enctype="multipart/form-data" method="POST">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-8 col-md-8">
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-3 col-md-3">
                                                        <label class="text-muted mb-2">Username</label>
                                                </div>
                                                    <div class="col-12 col-sm-9 col-md-9">
                                                        <input type="text" class="form-control" id ="username" name ="username" value="<?php echo  $_SESSION['username']; ?>" required>
                                                    </div>
                                                </div>    
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-3 col-md-3">
                                                        <label class="text-muted mb-2">Email</label>
                                                    </div>
                                                    <div class="col-12 col-sm-9 col-md-9">
                                                        <input type="text" class="form-control" id ="email" name ="email" value="<?php echo  $_SESSION['email']; ?>" required>
                                                    </div>
                                                </div>                                   
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-3 col-md-3">
                                                        <label class="text-muted mb-2">Password</label>
                                                    </div>
                                                    <div class="col-12 col-sm-9 col-md-9 ">
                                                        <input type="text" class="form-control" id ="password" name ="password" value="<?php echo $_SESSION['password']; ?>" required>
                                                        <input type="hidden" class="form-control" id ="id" name ="id" value="<?php echo $id; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="row mt-5 text-center">
                                                    <div class="col-12 col-sm-12 col-md-12 ">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Save" onclick="return confirm('Are you sure ?')">
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>  
                        
                    </div>
                
            </div>
        </div>
    </section>
    
</body>
</html>