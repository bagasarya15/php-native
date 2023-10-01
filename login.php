<?php
session_start();
require 'allfunctions.php';

//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if ( $key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;

    }

}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}



if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //Cek username
    if (mysqli_num_rows($result) === 1 ) {
        
        //Cek password 
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"]) ) {
            //Set session
            $_SESSION["login"] = true;

            //Cek remember me
            if (isset($_POST['remember'])) {
                //Buat cookie
                setcookie('id', $row['id'], time() + 60 );
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }
            header("location: index.php");
            exit;
        }
    }
    $error = true;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Halaman Login</title>
        <link rel="stylesheet" type="text/css" href="login.css">
        <link rel="icon" href="img/logo.png">
    </head>
        <body>
            <div class="content-login">
              <table align="center" cellspacing="0" cellpadding="0" width="70%" style="margin:auto; padding: 16px;">
              
                    <form action="" method="post">
                        <tr> 
                            <img id="logo" src="img/logo.png" width="20%" > 
                            <?php if (isset($error) ) : ?>
                                <p style="color:#fff;  font-style:italic;">username / password anda salah</p>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td style="color:#fff">
                                <label for="username">Username </label>
                                <input type="text" name="username" id="username" class="input" placeholder="Masukkan Username Anda!" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td style="color:#fff">
                                <label for="password">Password </label>
                                <input type="password" name="password" id="password" class="input" placeholder="Masukkan Password Anda!" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td style="color:#fff">
                                <label for="remember">Remember me</label>
                                <input type="checkbox" name="remember" id="remember">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" name="login">Login</button>
                                <p><a href="registrasi.php">Daftar Disini!</p></a>
                             </td>
                        </tr>
                    </form>
                </table>    
            </div>    
        </body>
</html>