<?php
ob_start();
//session_start();
// if(!empty($_SESSION['login'])){
//     header('location:./');
// }
//include 'koneksi.php'
?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description"
              content="">
        <meta name="author"
              content="">

        <title>Halaman Login Kasir - Aplikasi Kasir</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css"
              rel="stylesheet"
              type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
              rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css"
              rel="stylesheet">

    </head>

    <body class="bg-gradient-primary">

        <div class="container justify-content-center">
            <div class="row justify-content-center">
                <div class="col-xl-7 ">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900">Selamat Datang</h1>
                                            <small class="mb-4">Silahkan Login Menggunakan Akun Anda</small>
                                        </div>
                                        <form class="user"
                                              action="login2.php"
                                              method="post">
                                            <div class="form-group">
                                                <input type="text"
                                                       class="form-control form-control-user"
                                                       id="text"
                                                       aria-describedby="username"
                                                       name="username"
                                                       required
                                                       placeholder="Masukan Username Anda.....">
                                            </div>
                                            <div class="form-group">
                                                <input type="password"
                                                       class="form-control form-control-user"
                                                       id="password"
                                                       placeholder="Password"
                                                       name="password"
                                                       required>
                                            </div>

                                            <button type="submit"
                                                    name="login"
                                                    class="btn btn-primary btn-user btn-block">Login Kasir</button>
                                        </form>
                                        <hr>
                                        <a href="login.php"
                                           class="btn btn-success btn-block btn-user mt-2">Login Admin</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        </div>



        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

    </body>

</html>

<?php
if(isset($_POST['login'])){
    include 'koneksi.php';
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    include 'koneksi.php';
    $cek = mysqli_query($koneksi,"SELECT * FROM `user` WHERE username='$username'");
    if(mysqli_num_rows($cek)>0){
        $data = mysqli_fetch_array($cek);
        if(password_verify($password,$data['password'])){
            $_SESSION['login'] = 1;
            $_SESSION['id_petugas'] = $data['id_petugas'];
            $_SESSION['nama_petugas'] = $data['nama_petugas'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['telp'] = $data['telp'];
            $_SESSION['level'] = $data['level'];
            header('location:./kasir/index.php');
        }else{
            ?>
<script>
alert('Maaf Password Salah');
</script>
<?php
        }
    }else{
        ?>
<script>
alert('Username Tidak Terdaftar');
</script>
<?php
    }
}