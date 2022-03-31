<?php
session_start();
require '../functions.php';

//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    echo "<script>
    alert('Logout Terlebih Dahulu');
    window.location.href = 'backend/index.php';
    </script>";
    exit;
}


if (isset($_POST["login"])) {

    $username = ($_POST["username"]);
    $password = ($_POST["password"]);

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // set session
            $_SESSION["login"] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['no_telp'] = $row['no_telp'];
            $_SESSION['gambar'] = $row['gambar'];
            $_SESSION['nama'] = $row['nama'];

            //cek remember me
            if (isset($_POST['remember'])) {
                //buat cookie

                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: backend/index.php");
        }
    }
    echo "<script>
        alert('Username atau Password Salah');
        window.location.href= 'login.php';
        </script>";
}



//Jika tombol Daftar Ditekan
if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('Daftar Berhasil! Silahkan Login');
        window.location.href = 'login.php';
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">

                <!-- Form Login -->
                <form action="" method="post" class="sign-in-form">
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" id="username" required="">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required="">
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me" name="remember" id="remember"> Remember me
                        </label>
                    </div>
                    <input type="submit" name="login" value="login" class="btn solid">
                    <!-- <a href="forgot-password.php" style="text-decoration: none; color:#111;"><p>Lupa Password?</p></a> -->
                </form>
                <!-- End Form Login -->


                <!--Form Daftar -->
                <form action="" method="post" class="sign-up-form" enctype="multipart/form-data">
                    <h2 class="title">Daftar</h2>
                    <div class="input-field">
                        <i class="fas fa-address-card"></i>
                        <input type="text" name="nama" placeholder="Nama Lengkap" required="" autocomplete="off">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" required="" autocomplete="off">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="text" name="no_telp" placeholder="Nomor telepon" required="" autocomplete="off">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required="">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password2" placeholder="Konfirmasi Password" required="">
                    </div>
                    <input type="submit" name="register" value="Daftar" class="btn solid">
                </form>
                <!-- End Form Daftar -->

            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <!-- <h3>Silahkan Login</h3> -->
                    <!-- <p>Silahkan Login untuk bisa bergabung bersama kami</p>
                    <button class="btn transparent" id="sign-up-btn">Daftar</button> -->
                    <a href="index.php" style="text-decoration:none; color:#fff;"><button class="btn transparent">Kembali</button></a>
                </div>
                <img src="../img/log.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Sudah Memiliki Akun?</h3>
                    <p>Silahkan Login</p>
                    <button class="btn transparent" id="sign-in-btn">Login</button>
                </div>
                <img src="img/register.svg" class="image" alt="">
            </div>
        </div>
    </div>

    <script src="assets/loginn.js"></script>
</body>

</html>