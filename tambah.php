<?php
require_once('database.php');
$xkode = $_POST['kode_barang'];
$xnama = $_POST['nama_barang'];
$xkategori = $_POST['kategori'];
$xjumlah = $_POST['jumlah'];

$sql2 = tambahbarang('barang', $xkode, $xnama, $xkategori, $xjumlah);
if ($sql2) {
    header("location:barang.php");
}
?>