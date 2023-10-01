<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'allfunctions.php';

//Ambil data di URL
$id_anggota = $_GET["id_anggota"];

// query data anggota berdasarkan id
$agt = query("SELECT * FROM anggota WHERE id_anggota = $id_anggota")[0];

//Cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"]) ) {

	// Cek data sudah berhasil diubah / belum
	if (ubah ($_POST) > 0) {
		
		echo "
			<script>
				alert ('Data Anggota Berhasil Diubah')
				document.location.href = 'dataanggota.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert ('Data Anggota Gagal Diubah!')
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
        <title>Halaman Ubah Data Anggota</title>
        <link rel="icon" href="img/logo.png">
        <link rel="stylesheet" type="text/css" href="defaultform.css">
    </head>
    <body>

    <div class="content-form">
            <table align="center" cellspacing="0" cellpadding="0" width="70%" style="margin:auto; padding: 16px;">
                <form action="" method="post">
                    <tr>
                        <h1>Ubah Data Anggota</h1>
                        <hr>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="id_anggota" value="<?= $agt["id_anggota"]; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nama"> Nama : </label> <br>
                            <input type="text" name="nama" id="nama" required value="<?= $agt["nama"]; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="jns_kel"> Jenis Kelamin : </label></br>
                            <input type="text" name="jns_kel" id="jns_kel"  required value=<?= $agt["jns_kel"]; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tgl_lahir"> Tanggal Lahir : </label></br>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" required value= <?= $agt["tgl_lahir"]; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="kontak"> Kontak : </label></br>
                            <input type="text" name="kontak" id="kontak"  required value= <?= $agt["kontak"]; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="alamat"> Alamat : </label></br>
                            <input type="text" name="alamat" id="alamat"  required value= <?= $agt["alamat"]; ?>>
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