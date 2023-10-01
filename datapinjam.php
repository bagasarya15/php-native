<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'allfunctions.php'; 
$peminjaman = query("SELECT * FROM peminjaman");

// tombol cari ditekan
if (isset ($_POST["cari3"])) {
    $peminjaman = cari3 ($_POST ["keyword3"]);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Halaman Data Peminjaman</title>
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

    <!-- Table Peminjam -->
    
    <div class="content-data">
      <!-- Index untuk peminjaman -->
      <br><h1>Daftar Peminjam</h1></br>
            <a href="tambahpinjam.php">Tambah Peminjaman</a>
        <br></br>
        <!-- Untuk Input Cari Data Buku -->
    <form action="" method="post">
        <input type="text" name="keyword3" id="keyword3" size="40" placeholder="Masukkan keywoard pencarian nama peminjam" autofocus autocomplete="off">
        <button type="submit" name="cari3">Cari</button>
    </form>
        </br>
        <table align="center" border="3" cellpadding="10" cellspacing="0" width="900px">
                <tr>
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku Dipinjam</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian </th>     
                </tr>
    <?php $i = 1; ?>
    <?php foreach ($peminjaman as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                    <div class="btn-ubah">
                        <a href="ubahpinjam.php?id_peminjam=<?= $row["id_peminjam"]; ?>">Ubah</a> |  
                        <a id="btnhapus" href="hapuspinjam.php?id_peminjam=<?= $row["id_peminjam"]; ?>" onclick = "return confirm('yakin ingin menghapus?')">Hapus</a>
                    </div>
                    </td>
                    
                    <td><?= $row["nama_peminjam"]; ?></td>
                    <td><?= $row["judul"]; ?></td>
                    <td><?= $row["tgl_pinjam"]; ?></td>
                    <td><?= $row["tgl_kembali"]; ?></td>
                    
                </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
        </table>
    </div>
    </body>
</html>