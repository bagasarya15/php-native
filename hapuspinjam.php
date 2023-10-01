<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'allfunctions.php';

$id_peminjam = $_GET["id_peminjam"];

if (delete3 ($id_peminjam) > 0 ) {
    echo "
    <script>
        alert ('Data peminjaman berhasil dihapus')
        document.location.href = 'datapinjam.php'
    </script>
";
} else {
    echo "
    <script>
        alert ('Data Peminjaman gagal dihapus')
        document.location.href = 'datapinjam.php'
    </script>
";
}
?>