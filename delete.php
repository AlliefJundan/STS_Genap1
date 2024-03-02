<?php
require_once('database.php');
$id = $_GET['id'];
$data = delete('barang', $id);
if ($data) {
    header("location:barang.php");
}
?>