<?php
require_once('database.php');
$id = $_GET['id'];
$data = kembali('pengembalian', $id);
$koneksi->query("UPDATE peminjaman SET tgl_kembali = NOW(), status = 'Dikembalikan' WHERE id = '$id'");

header("location:peminjaman.php");
?>