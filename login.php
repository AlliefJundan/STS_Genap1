<?php
require_once('database.php');
session_start();

if (isset($_POST['masuk'])) {
  if (cek_login($_POST['username'], $_POST['password'])) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';
    if ($_SESSION['role'] == 'admin') {
      header("location:home.php");
    } else {
      header('location:homeuser.php');
    } 
  } else {
    header("location:login.php?msg=gagal");
  }
}
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


  <div class="container pt-5" align="center">
    <div class="row">
        <div class="col-md-4">
        </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h1 class="mb-0" align="center">PEMINJAMAN <span class="text-primary">LOGIN</span></h1>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" name="username" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Username">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                  placeholder="Password">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
              </div>
              <button type="submit" name="masuk" class="btn btn-primary btn-lg btn-block">LOGIN</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>