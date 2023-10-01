<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'allfunctions.php';

//ambil data di url
$id_peminjam = $_GET["id_peminjam"];

// query data berdasarkan id_peminjam
$pjm = query ("SELECT * FROM peminjaman WHERE id_peminjam = $id_peminjam")[0];



//Cek apa tombol submit sudah ditekan
if (isset($_POST["submit"]) ) {
	

	// Cek data peminjaman berhasil diubah / tidak
	if (ubahPjm ($_POST) > 0) {
		
		echo "
			<script>
				alert ('Data peminjaman berhasil diubah')
				document.location.href = 'datapinjam.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert ('Data peminjaman gagal diubah')
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
	<title>Ubah Peminjaman</title>
	<link rel="icon" href="img/logo.png">
	<link rel="stylesheet" type="text/css" href="defaultform.css">
</head>
<body>
<div class="content-form">
            <table align="center" cellspacing="0" cellpadding="0" width="70%" style="margin:auto; padding: 16px;">
                <form action="" method="post">
                    <tr>
                        <h1>Ubah Data Peminjaman</h1>
                        <hr>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="id_peminjam" value="<?= $pjm["id_peminjam"]; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nama_peminjam"> Nama Peminjam : </label> <br>
                            <input type="text" name="nama_peminjam" id="nama_peminjam" required value="<?= $pjm["nama_peminjam"]; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="judul"> Judul : </label></br>
                            <input type="text" name="judul" id="judul" required value=<?= $pjm["judul"]; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tgl_pinjam"> Tanggal Peminjaman : </label></br>
                            <input type="date" name="tgl_pinjam" id="tgl_pinjam" required value= <?= $pjm["tgl_pinjam"]; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tgl_kembali"> Tanggal Pengembalian : </label></br>
                            <input type="date" name="tgl_kembali" id="tgl_kembali" required value= <?= $pjm["tgl_kembali"]; ?>>
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