<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'allfunctions.php';

$id_buku = $_GET["id_buku"];

if (hapus2($id_buku) > 0) {
	echo "
		<script>
			alert('Data Buku Berhasil Dihapus!')
			document.location.href = 'databuku.php'
		</script>
	";
} else {
	echo "
		<script>
			alert('Data Buku Gagal Dihapus!')
			document.location.href = 'databuku.php'
		</script>
	";
}
?>