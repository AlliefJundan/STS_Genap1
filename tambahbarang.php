<?php
require_once('database.php');
$data = tambahbarang('barang');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>

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

    <?php
    session_start();
    if ($_SESSION['status'] <> "login") {
        header("location:login.php?msg=belum_login");
    } else {
        require('navbar.php');
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <form action="tambah.php" method="post"> 
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kode Barang</label>
                        <input class="form-control" id="exampleFormControlSelect1" nama="kode_barang" value="<?php echo "$kode[id]"; ?>">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"
            name="notes"><?php echo "$kode[barang]"; ?> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Barang</label>
                        <input type="hidden" class="form-control" id="exampleFormControlSelect1" nama="nama_barang" value="<?php echo "$nama[id]"; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori</label>
                        <input class="form-control" id="exampleFormControlSelect1" nama="kategori" value="<?php echo "$kategori[id]"; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Merk</label>
                        <input class="form-control" id="exampleFormControlSelect1" nama="merk" value="<?php echo "$merk[id]"; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Jumlah</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" max="2" name="jumlah" value="<?php echo "$jumlah[id]"; ?>">
                    </div>
                    <a type="button" class="btn btn-primary" href="tambah.php" name="proses">Tambahkan</a>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
    <h1> Edit Notes </h1>
    <?php while ($note = mysqli_fetch_array($data)): ?>
      <form action="update.php" method="post">
        <div class="form-group">
          <input type="hidden" name="id" value="<?php echo "$kode[barang]"; ?>">
          <label for="exampleFormControlTextarea1">Notes</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
            name="notes"></textarea>
        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="<?php echo "$nama[barang]"; ?>">
          <label for="exampleFormControlTextarea1">Notes</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
            name="notes"></textarea>
        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="<?php echo "$kategori[barang]"; ?>">
          <label for="exampleFormControlTextarea1">Notes</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
            name="notes"></textarea>
        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="<?php echo "$merk[barang]"; ?>">
          <label for="exampleFormControlTextarea1">Notes</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
            name="notes"></textarea>
        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="<?php echo "$jumlah[barang]"; ?>">
          <label for="exampleFormControlTextarea1">Notes</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
            name="notes"></textarea>
        </div>
        <input type="submit" value="Update">
      </form>
    <?php endwhile; ?>
  </div>
</body>

</html>