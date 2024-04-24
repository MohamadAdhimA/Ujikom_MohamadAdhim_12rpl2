<?php include 'koneksi.php'; session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri | Mohamad Adhim Azzuhri</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
        background-image: linear-gradient(to right, #9370DB, #778899 );
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Login</h4>
                        <p class="card-title">Login Akun</p>
                        <?php
                            //ambil data yang dikirim oleh form
                            $submit=@$_POST['submit'];
                            if($submit=='Login'){
                                $username=$_POST['username'];
                                $password=$_POST['password'];
                                //cek apakah username dan password yang dimasukan ke dalam imput ada di database
                                $sql=mysqli_query($conn, "SELECT * FROM user WHERE Username='$username' AND Password='$password'");
                                $cek=mysqli_num_rows($sql);
                                if($cek!=0){
                                    //ambil data dari database untuk membuat session
                                    $sesi=mysqli_fetch_array($sql);
                                    echo 'Login berhasil!';
                                    $_SESSION['username']=$sesi['username'];
                                    $_SESSION['user_id']=$sesi['user_id'];
                                    $_SESSION['email']=$sesi['email'];
                                    $_SESSION['nama_lengkap']=$sesi['nama_lengkap'];
                                    echo '<meta http-equiv="refresh" content="0.8; url=./">';
                                }else{
                                    echo 'Login gagal!';
                                    echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
                                }
                            }
                        ?>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" require>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" require>
                            </div>
                            <input type="submit" value="Login" class="btn btn-success my-3" name="submit">
                            <p>Belum punya akun? <a href="daftar.php">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>