<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'allfunctions.php';

//ambil data dari URL
$id_buku = $_GET ["id_buku"];

//query buku berdasarkan idbuku
$book = query("SELECT * FROM buku WHERE id_buku = $id_buku")[0];

//Cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"]) ) {

	// cek data buku berhasil diubah / belum
	if (ubah2 ($_POST) > 0) {
		
		echo "
			<script>
				alert ('Data Buku Berhasil Diubah')
				document.location.href = 'databuku.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert ('Data Buku Gagal Diubah')
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
	<title>Halaman Ubah Data Buku</title>
    <link rel="stylesheet" type="text/css" href="defaultform.css">
    <link rel="icon" href="img/logo.png">
</head>
<body>
<div class="content-form">
            <table align="center" cellspacing="0" cellpadding="0" width="70%" style="margin:auto; padding: 16px;">
                <form action="" method="post">
                    <tr>
                        <h1>Ubah Data Buku</h1>
                        <hr>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="id_buku" value="<?= $book["id_buku"]; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="judul"> Judul : </label> <br>
                            <input type="text" name="judul" id="judul" required value="<?= $book["judul"]; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="penulis"> Penulis : </label></br>
                            <input type="text" name="penulis" id="penulis" required value=<?= $book["penulis"]; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="penerbit"> Penerbit : </label></br>
                            <input type="text" name="penerbit" id="penerbit" required value= <?= $book["penerbit"]; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tahun_terbit"> Tahun Terbit : </label></br>
                            <input type="year" name="tahun_terbit" id="tahun_terbit" required value= <?= $book["tahun_terbit"]; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="submit">Ubah Data!</button>
                        </td>
                    </tr>
                </form>
            </table>
        </div>
</body>
</html>