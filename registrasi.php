<?php
require 'allfunctions.php';
    if (isset($_POST["register"])){
        
        if(registrasi($_POST) > 0){
            echo "<script>
                    alert('User baru berhasil ditambahkan!');
                 </script>";
        }else{
            echo mysqli_error($conn);
        }
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Halaman Registrasi</title>
        <link rel="stylesheet" type="text/css" href="registrasi.css">
        <link rel="icon" href="img/logo.png">
    </head>
        <body>
            <div class="content-regist">
              <table align="center" cellspacing="0" width="70%">
                    <form action="" method="post">
                        <tr> 
                            <img id="logo" src="img/logo.png" width="20%" > 
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
                                <label for="password2">Konfirmasi Password </label>
                                <input type="password" name="password2" id="password2" class="input" placeholder="Konfirmasi Password Anda!" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" name="register">Daftar</button>
                                <p><a href="login.php">Kembali Ke Halaman Login</p></a>
                             </td>
                        </tr>
                    </form>
                </table>    
            </div>    
        </body>
</html>