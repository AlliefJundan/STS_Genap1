<?php
include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id_barang = $_POST['id'];
    $kode_brg = $_POST['kode_brg'];
    $nama_brg = $_POST['nama_brg'];
    $kategori = $_POST['kategori'];
    $merk = $_POST['merk'];
    $jumlah = $_POST['jumlah'];

    $query = "UPDATE barang SET kode_brg='$kode_brg', nama_brg='$nama_brg', kategori='$kategori', merk='$merk', jumlah=$jumlah WHERE id=$id_barang";

    if ($koneksi->query($query) === TRUE) {
        echo "Barang berhasil diupdate. <a href='barang.php'>Kembali ke Daftar Barang</a>";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
} else {
    echo "Permintaan tidak valid.";
}

$koneksi->close();
?>