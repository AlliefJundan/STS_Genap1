<?php
require_once('database.php');

$kode_barang = $_GET['kode_barang'];
$sql = "SELECT * FROM barang WHERE kode_brg = '$kode_barang'";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $barang = $result->fetch_assoc();
    echo json_encode($barang);
} else {
    echo json_encode(array("error" => "Barang tidak ditemukan"));
}
?>
