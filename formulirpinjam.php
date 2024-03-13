<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <title>Hello, world!</title>
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

  <div class="container">
    <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-6">
        <h2>Formulir Peminjaman Barang</h2>
        <form method="post" action="proses_peminjaman.php" id="form_peminjaman" onsubmit="return cekJumlah()">
          <label for="kode_barang">Pilih ID Barang:</label>
          <select class="form-control" name="kode_barang" id="kode_barang" onchange="getBarangDetails()">
            <?php
            require_once('database.php');
            $result = getAllBarang();
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["kode_brg"] . "'>" . $row["id"] . "</option>";
              }
            } else {
              echo "<option value=''>Tidak ada barang tersedia</option>";
            }
            ?>
          </select>
          <div class="form-group">
            <label for="kode_brg">Kode Barang:</label>
            <input type="text" class="form-control" id="kode_brg" name="kode_brg" readonly>
          </div>
          <div class="form-group">
            <label for="nama_brg">Nama Barang:</label>
            <input type="text" class="form-control" id="nama_brg" name="nama_brg" readonly>
          </div>
          <div class="form-group">
            <label for="kategori">Kategori:</label>
            <input type="text" class="form-control" id="kategori" name="kategori" readonly>
          </div>
          <div class="form-group">
            <label for="merk">Merk:</label>
            <input type="text" class="form-control" id="merk" name="merk" readonly>
          </div>
          <div class="form-group">
            <label for="jumlah_tersedia">Jumlah Tersedia:</label>
            <input type="text" class="form-control" id="jumlah_tersedia" name="jumlah_tersedia" readonly>
          </div>
          <div class="form-group">
            <label for="login">ID Peminjam:</label>
            <input type="number" class="form-control" id="login" name="login" required>
          </div>
          <div class="form-group">
            <label for="no_identitas">Nomor Identitas:</label>
            <input type="number" class="form-control" id="no_identitas" name="no_identitas" required>
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" class="form-control" id="jumlah" min="1" name="jumlah" required>
          </div>
          <div class="form-group">
            <label for="keperluan">Keperluan:</label>
            <input type="text" class="form-control" id="keperluan" name="keperluan" required>
          </div>
          <button type="submit" class="btn btn-primary" value='pinjam'>Pinjam</button>
        </form>
      </div>
    </div>

    <script src="database.js"></script>
    <script>
      function getBarangDetails() {
        var kode_barang = document.getElementById("kode_barang").value;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "detailbarang.php?kode_barang=" + kode_barang, true);
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            var barang = JSON.parse(xhr.responseText);
            document.getElementById("kode_brg").value = barang.kode_brg;
            document.getElementById("nama_brg").value = barang.nama_brg;
            document.getElementById("kategori").value = barang.kategori;
            document.getElementById("merk").value = barang.merk;
            document.getElementById("jumlah_tersedia").value = barang.jumlah;
          }
        };
        xhr.send();
      }
    </script>
    <script>
      function cekJumlah() {
        var jumlah_tersedia = parseInt(document.getElementById("jumlah_tersedia").value);
        var jumlah_dipinjam = parseInt(document.getElementById("jumlah").value);

        if (jumlah_dipinjam <= 0) {
          alert("Jumlah yang dipinjam harus lebih dari 0.");
          return false;
        }

        if (jumlah_dipinjam > jumlah_tersedia) {
          alert("Jumlah yang dipinjam melebihi jumlah yang tersedia.");
          return false;
        }

        return true;
      }
    </script>
</body>

</html>