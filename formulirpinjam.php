<?php
require_once('database.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <title>Peminjaman</title>
</head>

<body>
<?php
  session_start();
  if ($_SESSION['status'] <> "login") {
    header("location:login.php?msg=belum_login");
  } else {
    require('navbar.php');
  }
?>
<div class="container">
    <h2>Formulir Peminjaman</h2>

    <form id="formPeminjaman" action="proses_peminjaman.php" method="post">
        <div class="form-group">
            <label for="idBarang">Pilih ID Barang:</label>
            <select class="form-control" id="idBarang" name="id_barang" onchange="tampilkanInfoBarang(this)">
                <!-- Pilihan ID barang akan diisi dari database atau sumber data lainnya -->
                <option value="B001">B001</option>
                <option value="B002">B002</option>
                <!-- Tambahkan pilihan ID barang lain sesuai kebutuhan -->
            </select>
        </div>
        <div class="form-group">
            <label for="kodeBrg">Kode Barang:</label>
            <input type="text" class="form-control" id="kodeBrg" name="kode_brg" readonly>
        </div>
        <div class="form-group">
            <label for="namaBrg">Nama Barang:</label>
            <input type="text" class="form-control" id="namaBrg" name="nama_brg" readonly>
        </div>
        <div class="form-group">
            <label for="merk">Merk:</label>
            <input type="text" class="form-control" id="merk" name="merk" readonly>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" max="100" required>
        </div>
        <div class="form-group">
            <label for="keperluan">Keperluan:</label>
            <textarea class="form-control" id="keperluan" name="keperluan" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Pinjam</button>
    </form>
</div> 

    <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
    <script>
        function tampilkanInfoBarang(selectElement) {
            // Dapatkan nilai ID barang yang dipilih
            var selectedIdBarang = selectElement.value;

          
            if (selectedIdBarang === 'B001') {
                document.getElementById('kodeBrg').value = 'KB001';
                document.getElementById('namaBrg').value = 'Barang A';
                document.getElementById('merk').value = 'Merk A';
            } else if (selectedIdBarang === 'B002') {
                document.getElementById('kodeBrg').value = 'KB002';
                document.getElementById('namaBrg').value = 'Barang B';
                document.getElementById('merk').value = 'Merk B';
            }
        }
    </script>

</body>

</html>
