<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'allfunctions.php';
//Cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"]) ) {
	

	// Cek apa data sudah berhasil ditambah
	if (tambah3 ($_POST) > 0) {
		
		echo "
			<script>
				alert ('Data peminjaman berhasil ditambah')
				document.location.href = 'datapinjam.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert ('Data peminjaman gagal ditambah')
				document.location.href = 'datapinjam.php'
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Halaman Tambah Peminjaman</title>
		<link rel="icon" href="img/logo.png">
		<link rel="stylesheet" type="text/css" href="defaultform.css">
	</head>
	<body>
	<div class="content-form">
            <table align="center" cellspacing="0" cellpadding="0" width="70%" style="margin:auto; padding: 16px;">
                <form action="" method="post">
                    <tr> 
						<h1>TAMBAH PEMINJAMAN</h1>
                        <hr>
                    </tr>
                    <tr>
                        <td>
							<label for ="nama_peminjam">Nama Peminjam: </label> <br>
							<input type="text" name="nama_peminjam" id="nama_peminjam" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td>
							<label for ="judul">Judul: </label> <br>
							<input type="text" name="judul" id="judul" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td>
							<label for ="tgl_pinjam">Tanggal Peminjaman: </label autocomplete="off"> <br>
							<input type="date" name="tgl_pinjam" id="tgl_pinjam">
                        </td>
                    </tr>
                    <tr>
                        <td>
							<label for ="tgl_kembali">Tanggal Pengembalian: </label> <br>
							<input type="date" name="tgl_kembali" id="tgl_kembali" autocomplete="off">
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