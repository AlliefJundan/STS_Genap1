<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sts";
$koneksi = mysqli_connect($host, $user, $pass, $dbname) or die("Gagal terhubung dengan database " . mysqli_error($koneksi));

function tampildata($tablename)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, "SELECT peminjaman.id, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, peminjaman.no_identitas, barang.kode_brg, barang.nama_brg, peminjaman.jumlah, peminjaman.keperluan, peminjaman.status, peminjaman.id_login FROM peminjaman INNER JOIN barang on peminjaman.kode_barang = barang.kode_brg ORDER BY id ASC");
    $rows = [];
    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
    }
    return $rows;
}

function editdatabarang($tablename, $id)
{
    global $koneksi;
    $query =  "SELECT * from $tablename where id = $id";
    $hasil = $koneksi->query($query);

    if ($hasil->num_rows > 0) {
        return $hasil->fetch_assoc();
    } else {
        return null;
    }
}


function delete($tablename, $id)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, "DELETE from $tablename where id='$id'");
    return $hasil;
}

function cek_login($username, $password)
{
    global $koneksi;
    $uname = $username;
    $upass = $password;

    $hasil = mysqli_query($koneksi, "select * from user where username='$uname' and password=$upass");
    $cek = mysqli_num_rows($hasil);
    if ($cek > 0) {
        $query = mysqli_fetch_array($hasil);
        $_SESSION['id'] = $query['id'];
        $_SESSION['username'] = $query['username'];
        $_SESSION['role'] = $query['role'];
        return true;
    } else {
        return false;
    }
}

function tampildata1($tablename)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, "select * from $tablename");
    $rows = [];
    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambahbarang($kode_brg, $nama_brg, $kategori, $merk, $jumlah) {
    global $koneksi;
    $query = "INSERT INTO barang (kode_brg, nama_brg, kategori, merk, jumlah) VALUES ('$kode_brg', '$nama_brg', '$kategori', '$merk', $jumlah)";

    if ($koneksi->query($query) === TRUE) {
        return "Barang berhasil ditambahkan.";
    } else {
        return "Error: " . $query . "<br>" . $koneksi->error;
    }
}



?>