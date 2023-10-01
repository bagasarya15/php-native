<?php
// Koneksi untuk ke database
$conn = mysqli_connect("localhost","root","","webperpustakaan");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

//  Functions insert / tambah data anggota
    function tambah($data){
     // Ambil data dari tiap elemen form
        global $conn;
        $nama = htmlspecialchars ($data["nama"]);
        $jns_kel = htmlspecialchars ($data["jns_kel"]);
        $tgl_lahir = htmlspecialchars ($data["tgl_lahir"]);
        $kontak = htmlspecialchars ($data["kontak"]);
        $alamat = htmlspecialchars ($data["alamat"]);

    $query = "INSERT INTO anggota values ('','$nama','$jns_kel','$tgl_lahir','$kontak','$alamat')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    }

// Functions delete / hapus data anggota
    function hapus($id_anggota) {
        global $conn;
        mysqli_query ($conn, "DELETE FROM anggota WHERE id_anggota = $id_anggota");
        return mysqli_affected_rows($conn);
}


// Functions update / ubah data anggota
function ubah($data) {
    global $conn;
        $id_anggota = $data["id_anggota"];
        $nama = htmlspecialchars ($data["nama"]);
        $jns_kel = htmlspecialchars ($data["jns_kel"]);
        $tgl_lahir = htmlspecialchars ($data["tgl_lahir"]);
        $kontak = htmlspecialchars ($data["kontak"]);
        $alamat = htmlspecialchars ($data["alamat"]);

    $query = "UPDATE anggota SET  
                nama = '$nama',
                jns_kel = '$jns_kel',
                tgl_lahir = '$tgl_lahir',
                kontak = '$kontak',
                alamat = '$alamat'
                WHERE id_anggota = $id_anggota       
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Functions cari anggota
function cari ($keyword){
    $query = "SELECT * FROM anggota WHERE nama LIKE '%$keyword%'
    ";
    return query($query);
}


// Functions insert / tambah buku
function tambah2($data2) {
	global $conn;
	$judul = htmlspecialchars($data2["judul"]);
    $penulis = htmlspecialchars($data2["penulis"]);
	$penerbit = htmlspecialchars($data2["penerbit"]);
	$tahun_terbit = htmlspecialchars($data2["tahun_terbit"]);

	$query ="INSERT INTO buku VALUES ('', '$judul', '$penulis','$penerbit', '$tahun_terbit')";
	mysqli_query ($conn, $query);
	return mysqli_affected_rows($conn);
}

// Functions delete / hapus data buku
function hapus2($id_buku) {
	global $conn;
	mysqli_query ($conn, "DELETE FROM buku WHERE id_buku = $id_buku");
	return mysqli_affected_rows($conn);
}

//Functions update / ubah data buku
function ubah2($data2) {
	global $conn;
	$id_buku = $data2["id_buku"];
	$judul = htmlspecialchars($data2["judul"]);
    $penulis = htmlspecialchars($data2["penulis"]);
	$penerbit = htmlspecialchars($data2["penerbit"]);
	$tahun_terbit = htmlspecialchars($data2["tahun_terbit"]);

	$query ="UPDATE buku SET
				judul = '$judul',
                penulis = '$penulis',
				penerbit = '$penerbit',
				tahun_terbit = '$tahun_terbit'
				WHERE id_buku = '$id_buku'
				 ";
	mysqli_query ($conn, $query);
	return mysqli_affected_rows($conn);
}

// Functions cari buku
function cari2 ($keyword2){
    $query = "SELECT * FROM buku WHERE judul LIKE '%$keyword2%'
    ";
    return query($query);
}

// Fucntions insert / tambah peminjaman
function tambah3($data3) {
	global $conn;
	$nama_peminjam = htmlspecialchars($data3["nama_peminjam"]);
	$judul = htmlspecialchars($data3["judul"]);
	$tgl_pinjam = htmlspecialchars($data3["tgl_pinjam"]);
	$tgl_kembali = htmlspecialchars($data3["tgl_kembali"]);

	$query ="INSERT INTO peminjaman VALUES ('', '$nama_peminjam', '$judul', '$tgl_pinjam', '$tgl_kembali')";
	mysqli_query ($conn, $query);
	return mysqli_affected_rows($conn);
}

//Functions delete/ hapus Peminjaman
function delete3 ($id_peminjam) {
	global $conn;
	mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjam = $id_peminjam");
	return mysqli_affected_rows($conn);
}

//Functions Edit / ubah Peminjaman
function ubahPjm ($pjm) {
	global $conn;
	$id_peminjam = ($pjm["id_peminjam"]);
	$nama_peminjam = htmlspecialchars($pjm["nama_peminjam"]);
	$judul = htmlspecialchars($pjm["judul"]);
	$tgl_pinjam = htmlspecialchars($pjm["tgl_pinjam"]);
	$tgl_kembali = htmlspecialchars($pjm["tgl_kembali"]);

	$query ="UPDATE peminjaman SET
				nama_peminjam = '$nama_peminjam',
				judul = '$judul',
				tgl_pinjam = '$tgl_pinjam',
				tgl_kembali = '$tgl_kembali'
				WHERE id_peminjam = $id_peminjam
				";
	mysqli_query ($conn, $query);
	return mysqli_affected_rows($conn);
}

// Functions cari pinjam
function cari3 ($keyword3){
    $query = "SELECT * FROM peminjaman WHERE nama_peminjam LIKE '%$keyword3%' ";
    return query($query);
}

//Functions Registrasi
function registrasi($data){
    global $conn;
    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //Cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    
    if (mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Username sudah digunakan')
            </script>";
        return false;
    }


    //Cek konfirm password
    if ( $password !== $password2){
        echo "<script>
                alert('Konfirmasi passsword tidak sesuai')
              </script>";
            return false;
    }

    //Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //Tambah user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");

    return mysqli_affected_rows($conn);
}
?>