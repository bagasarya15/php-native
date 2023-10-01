<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'allfunctions.php';
//Cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"]) ) {

	// Cek data sudah berhasil ditambah / belum
	if (tambah ($_POST) > 0) {
		
		echo "
			<script>
				alert ('Data Anggota Berhasil Ditambah!')
				document.location.href = 'dataanggota.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert ('Data Anggota Gagal Ditambah!')
				document.location.href = 'dataanggota.php'
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Halaman Tambah Data Anggota</title>
        <link rel="icon" href="img/logo.png">
        <link rel="stylesheet" type="text/css" href="defaultform.css">
    </head>
    <body>
        <div class="content-form">
            <table align="center" cellspacing="0" cellpadding="0" width="70%" style="margin:auto; padding: 16px;">
                <form action="" method="post">
                    <tr> 
                        <h1>TAMBAH DATA ANGGOTA</h1>
                        <hr>
                    </tr>
                    <tr>
                        <td >
                            <label for="nama"> Nama : </label> <br>
                            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Anda!" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label for="jns_kel"> Jenis Kelamin : </label></br>
                            <input type="text" name="jns_kel" id="jns_kel" placeholder="Masukkan Jenis Kelamin Anda!" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label for="tgl_lahir"> Tanggal Lahir : </label></br>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" placeholder="Masukkan Tanggal Lahir Anda!" required autocomplete="off"> 
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label for="kontak"> Kontak : </label></br>
                            <input type="text" name="kontak" id="kontak" placeholder="Masukkan Kontak Anda!" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label for="alamat"> Alamat : </label></br>
                            <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat Anda!" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="submit">TAMBAH DATA</button>
                        </td>
                    </tr>
                </form>
            </table> 
        </div>
    </body>
</html>