<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'allfunctions.php'; 
$buku = query("SELECT * FROM buku");

// tombol cari ditekan
if (isset ($_POST["cari2"])) {
    $buku = cari2 ($_POST ["keyword2"]);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Halaman Data Buku</title>
        <link rel="stylesheet" type="text/css" href="data.css">
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

    <!-- Table Buku -->
    
    <div class="content-data">
    <br><h1>Daftar Buku</h1></br>
       <!--Index untuk buku -->
        <a href="tambahbuku.php">Tambah Buku</a>
        <br></br>
        <!-- Untuk Input Cari Data Buku -->
    <form action="" method="post">
        <input type="text" name="keyword2" id="keyword2" size="40" placeholder="Masukkan keywoard pencarian buku" autofocus autocomplete="off">
        <button type="submit" name="cari2">Cari</button>
    </form>
        </br>
        <table align="center" border="3" cellpadding="10" cellspacing="0" width="900px">
                <tr>
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>     
                </tr>
    <?php $i = 1; ?>
    <?php foreach ($buku as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                    <div class="btn-ubah">
                        <a href="ubahbuku.php?id_buku=<?= $row["id_buku"]; ?>">Ubah</a> | 
                        <a id="btnhapus" href="hapusbuku.php?id_buku=<?= $row["id_buku"]; ?>" onclick = "return confirm('yakin ingin menghapus?')">Hapus</a>
                    </div>
                    </td>
                    <td><?= $row["judul"]; ?></td>
                    <td><?= $row["penulis"]; ?></td>
                    <td><?= $row["penerbit"]; ?></td>
                    <td><?= $row["tahun_terbit"]; ?></td>
                    
                </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
        </table> 
    </div>
    </body>
</html>