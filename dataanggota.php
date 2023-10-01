<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'allfunctions.php'; 
$anggota = query("SELECT * FROM anggota");

// tombol cari ditekan
if (isset ($_POST["cari"])) {
    $anggota = cari ($_POST ["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Halaman Data Anggota</title>
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
    <!-- Table Anggota -->
    
    <div class="content-data">
        <br><h1>Daftar Anggota</h1></br>
        <!-- Index untuk anggota -->
        <a href="tambahanggota.php ">Tambah Data Anggota</a>
        <br></br>
<!-- Untuk Input Cari Data Anggota -->
    <form action="" method="post">
        <input type="text" name="keyword" id="keyword" size="40" placeholder="Masukkan keywoard pencarian data anggota" autofocus autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
        </br>
        <table align="center" border="3" cellpadding="10" cellspacing="0" width="900px">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Kontak</th>
                <th>Alamat</th>
            </tr>
    <?php $i = 1; ?>
    <?php foreach( $anggota as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <div class="btn-ubah">   
                        <a href="ubahanggota.php?id_anggota=<?= $row["id_anggota"]; ?>">Ubah</a> |
                        <a id="btnhapus" href="hapusanggota.php?id_anggota=<?= $row["id_anggota"]; ?>" onclick = "return confirm('yakin   ingin menghapus?')">Hapus</a>
                    </div>
                </td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["jns_kel"]; ?></td>
                <td><?= $row["tgl_lahir"]; ?></td>
                <td><?= $row["kontak"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
            </tr>
    <?php $i++;?>
    <?php endforeach; ?>    
        </table> 
    </div>
    </body>
</html>