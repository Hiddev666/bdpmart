<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERPEEL CASHIER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body onload="table()">

  <?php
    include("config/database-connection.php");
  session_start();

  $rows = mysqli_query($conn, "SELECT * FROM invoice order by id desc;");

  if(isset($_POST['submit'])) {
    $_SESSION['invoice_id'] = $_POST['invoice'];
  }

  if(isset($_GET['btnsearch'])) {
  }

  if(isset($_GET['manual_input'])) {
    $decode = $_GET['kodebarang'];
    $jumlah_beli = $_GET['jumlahbeli'];
    $invoiceid = $_SESSION['invoice_id'];

    header("location: manual-input.php?decode=$decode&invoiceid=$invoiceid&jumlah_beli=$jumlah_beli");
  }

?>


    <script>
        function table() {
            const xhttp = new XMLHttpRequest()
            xhttp.onload = function() {
                document.getElementById("table").innerHTML = this.responseText;
            }
            xhttp.open("GET", "gudang-table.php")
            xhttp.send()
        }

        setInterval(() => {
            table()
        }, 1000);
    </script>


<div class="container d-flex w-100 align-items-center">
          <div class="container mt-5 w-100 d-flex">
              <div class="d-flex align-items-center">
                <img src="bdp-logo.png" alt="" width="120px">
              </div>
              <div class="w-100 d-flex align-items-center">
                <div>
                  <h1 class="m-0 ms-3">BISNIS DARING DAN PEMASARAN</h1>
                  <p class="m-0 ms-3">Point Of Sale Application</p>
                </div>
              </div>
          </div>

          <div class="w-50 d-flex  align-items-center justify-content-end">
          <div class="nav-item dropdown-center d-flex align-items-center">
        <img src="user.svg" alt="" class="me-2" style="width: 30px">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?= $_SESSION['name']?>
        </a>
        <ul class="dropdown-menu  mt-2">
          <li class="d-flex align-items-center">
              <img src="logout.svg" alt="" class="ms-2" style="width: 30px">
              <a class="dropdown-item dropdown-center" href="logout.php">Logout</a>
            </li>
          </ul>
      </div>
          </div>
        </div>
        <div class="container card p-4 w-100 mt-5">
  <div class="d-flex w-100 gap-3">
    <a href="?tambah=produk" class="w-25">
      <button class="btn btn-warning w-100">Tambah Produk</button>
    </a>
    <a href="?tambah=user" class="w-25">
      <button class="btn btn-warning w-100">Tambah User</button>
    </a>
  </div>
  <div class="container mt-3">
    <?php 
    $tambah = $_GET['tambah'];
    include "tambah-$tambah.php"
    ?>
  </div>
</div>
<?php 

if($_GET['tambah'] == "produk") {?>
<div id="table">

</div>
<?php } else {?>
  <?php include "user-gudang.php"?>
  <?php }?>


    

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>