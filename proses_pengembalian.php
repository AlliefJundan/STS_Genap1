<?php
require_once('database.php');
$id = $_GET['id'];
$jumlah = $_GET['jumlah'];
$data = kembali('pengembalian', $id, );
$koneksi->query("UPDATE peminjaman SET tgl_kembali = NOW(), status = 'Dikembalikan' WHERE id = '$id'");

header("location:peminjaman.php");
?>