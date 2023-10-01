<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'allfunctions.php';
//Cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"]) ) {

	//Cek data buku berhasil ditambah / belum
	if (tambah2($_POST) > 0) {
		
		echo "
			<script>
				alert ('Data buku berhasil ditambah!')
				document.location.href = 'databuku.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert ('Data buku gagal ditambahkan!')
				document.location.href = 'databuku.php'
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tambah Buku</title>
        <link rel="stylesheet" type="text/css" href="defaultform.css">
        <link rel="icon" href="img/logo.png">
    </head>
    <body>
        <div class="content-form">
            <table align="center" cellspacing="0" cellpadding="0" width="70%" style="margin:auto; padding: 16px;">
                <form action="" method="post">
                    <tr> 
                        <h1>TAMBAH BUKU</h1>
                        <hr>
                    </tr>
                    <tr>
                        <td >
                            <label for ="judul">Judul: </label> <br>
                            <input type="text" name="judul" id="judul" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label for ="penulis">Penulis: </label> <br>
                            <input type="text" name="penulis" id="penulis" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label for ="penerbit">Penerbit: </label> <br>
                            <input type="text" name="penerbit" id="penerbit" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label for ="tahun_terbit">Tahun Terbit: </label> <br>
                            <input type="year" name="tahun_terbit" id="tahun_terbit" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="submit">Tambah Data</button> 
                        </td>
                    </tr>
                </form>
            </table> 
        </div>
    </body>
</html>