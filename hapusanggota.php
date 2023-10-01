<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'allfunctions.php';

$id_anggota = $_GET["id_anggota"];

if (hapus($id_anggota) > 0) {
	echo "
		<script>
			alert('Data Anggota Berhasil Dihapus!')
			document.location.href = 'dataanggota.php'
		</script>
	";
} else {
	echo "
		<script>
			alert('Data Anggota Gagal Dihapus!')
			document.location.href = 'dataanggota.php'
		</script>
	";
}
?>