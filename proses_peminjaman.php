<?php
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_barang = $_POST['id_barang'];
    $jumlah_pinjam = $_POST['jumlah'];
    $keperluan = $_POST['keperluan'];
    header('Location: peminjaman.php');
    exit;
} else {
    header('Location: peminjaman.php');
    exit;
}
?>
