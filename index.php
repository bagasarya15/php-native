<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'allfunctions.php'; 
$anggota = query("SELECT * FROM anggota");
$buku = query("SELECT * FROM buku");
$peminjaman = query("SELECT * FROM peminjaman");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Halaman Dashboard</title>
        <link rel="stylesheet" type="text/css" href="index.css">
        <link rel="icon" href="img/logo.png">
    </head>
    <body>
    <!-- Header Area Start -->
       <header>
           <div class="left_area">
               <h3> E-<span>PERPUS</span> </h3>
           </div> 
    <!-- Header Area End -->
    <!-- Sidebar Start -->
        <div class="sidebar">
            <center>
                <img src="img/profile2.jpg" class="profile_image" alt="">
                <h4>Bagas Arya Pradipta</h4>
            </center>
            <a href="index.php"><img src="img/desktop.svg" width="7%"  style="filter:invert(1);" ><span> Dashboard </span></a>
            <a href="dataanggota.php"><img src="img/anggota.svg" width="7%" style="filter:invert(1);" ><span> Data Anggota </span></a>
            <a href="databuku.php"><img src="img/book.svg" width="7%"  style="filter:invert(1);" ><span> Data Buku</span></a>
            <a href="datapinjam.php"><img src="img/list.svg" width="7%"  style="filter:invert(1);" ><span> Data Peminjaman </span></a>
            <a href="logout.php"><img src="img/logout.svg" width="7%"  style="filter:invert(1);" ><span> Logout </span></a>
        </div>
        </header>
    <!-- Sidebar End -->
        <div class="content-data">
        <br><h1>Dashboard</h1></br>
            <div class="index">  
                <img src="img/desktop.svg" width="30%"  style="filter:invert(1);">
                <p><a href="index.php">Dashboard</a></p>
            </div>
            <div class="anggota">
                <?php
                    $query = "SELECT id_anggota FROM anggota ORDER BY id_anggota";
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($query_run);
                    echo '<p id="row"> '.$row.'</p>';
                ?>
                 <img src="img/anggota.svg" width="30%"  style="filter:invert(1);">
                 <p><a href="dataanggota.php"> Data Anggota</a></p>
            </div>
            <div class="buku">
                <?php
                    $query = "SELECT id_buku FROM buku ORDER BY id_buku";
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($query_run);
                    echo '<p id="row"> '.$row.'</p>';
                ?>
                <img src="img/book.svg" width="25%"  style="filter:invert(1);">
                <p><a href="databuku.php"> Data Buku</a></p>
                
            </div>
            <div class="pinjam">
                <?php
                    $query = "SELECT id_peminjam FROM peminjaman ORDER BY id_peminjam";
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($query_run);
                    echo '<p id="row"> '.$row.'</p>';
                ?>
                <img src="img/list.svg" width="24%"  style="filter:invert(1);">
                <p><a href="datapinjam.php">Peminjaman</a></p>
               
            </div>
            </div>                               
        </div>                        
    </body>
</html>