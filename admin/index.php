<?php
session_start();
if (!$_SESSION["login"]) {
    header("Location: login.php");
}
?>
 
 <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark  bg-primary">
        <div class="container">
                <a class="navbar-brand" href="index.php">AZEL</a>
            <div class="collapse navbar-collapse navbar-right">
                <ul class="navbar-nav  ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../profil_admin.php">Profile</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php" >Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>
<div class="container pt-5">
    <div class="heading text-center pt-5">
        <h2>Admin Panel AZEL</h2>
    </div>
    
    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>User ID</th>
            <th>status</th>
            <th>Dibuat</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="SELECT * FROM status WHERE del_flage= 0 ";

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["user_id"];   ?></td>
                <td><?php echo $data["content"];   ?></td>
                <td><?php echo $data["created_at"];   ?></td>
                <td>
                    <a href="delete.php?id=<?= $data['id']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>

</div>

</body>
</html>
