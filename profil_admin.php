<?php

    include('admin/koneksi.php');
    $statement = mysqli_query($koneksi,"SELECT * FROM admin ");
    while($row = mysqli_fetch_array($statement)){
        $id = $row['id'];
        $username = $row['username'];
        $_SESSION['password']= $row['password'];
        $nama_gambar = $row['nama_gambar'];
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>

    <<nav class="navbar fixed-top navbar-expand-lg navbar-dark  bg-primary">
        <div class="container">
                <a class="navbar-brand" href="admin/index.php">AZEL</a>
            <div class="collapse navbar-collapse navbar-right">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="">Profile</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="admin/logout.php" >Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>

    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row p-3">
                            <div class="col-md-3">
                                <p>Akun saya</p>
                            </div>
                            <div class="col-md-3 text-end">
                                <?php
                                    if(!empty($_SESSION['message'])){
                                        echo $_SESSION['message'];
                                        $_SESSION['message'] = null;
                                    }
                                ?>
                            </div>
                        </div>
                        <form action="profil_admin_proses.php" enctype="multipart/form-data" method="POST">
                            <div class="row mt-3 justify-content-center">
                                <div class="col-md-3 text-center">
                                </div>
                            </div>

                        
                            <div class="row mt-5 justify-content-center">
                                <div class="col-md-1">
                                <label for="">Username</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php echo $username; ?>" disabled>
                                </div>
                            </div>
                            <div class="row mt-3 justify-content-center">
                                <div class="col-md-1">
                                <label for="">Password</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="password" value="<?php echo $_SESSION['password']; ?>" required>
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-5">
                                <div class="col-md-1">
                                    <input type="submit" name= "submit" value="Save" class="btn btn-primary">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
        </div>
        </div>
    </section>
    
</body>
</html>

