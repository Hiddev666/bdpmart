<?php
session_start();
if(!isset($_SESSION['name'])) {
  header("Location: login.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERPEEL CASHIER</title>
    <link rel="stylesheet" href="node_modules/aos/dist/aos.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body onload="table()">

  <?php
    include("config/database-connection.php");
?>


    <script>
        function table() {
            const xhttp = new XMLHttpRequest()
            xhttp.onload = function() {
                document.getElementById("table").innerHTML = this.responseText;
            }
            xhttp.open("GET", "pembeli-table.php")
            xhttp.send()
        }

        setInterval(() => {
            table()
        }, 1);
    </script>

<?php

if($_SESSION['invoice_id'] != 0) {
?>

<div class="container d-flex w-100 align-items-center">
          <div class="container mt-5 w-50 d-flex">
              <div class="d-flex align-items-center">
                <img src="bdp-logo.png" alt="" width="120px">
              </div>
              <div class="w-100 d-flex align-items-center">
                <h1 class="ms-4">BISNIS DARING DAN PEMASARAN</h1>
              </div>
          </div>
</div>

<div id="table">
  
  
  <?php } else {?>    

    <div class="container bg-danger" style="margin-top: 10%;">
          <div class="container w-100 h-100 d-flex justify-content-center" data-aos="zoom-out" data-aos-duration="1000">
              <div class="d-flex align-items-center">
                <img src="rpl-logo.jpg" alt="" width="200px">
              </div>
            </div>
            <h1 class="text-center mt-4" data-aos="flip-up" data-aos-duration="500">ERPEEL CASHIER</h1>
            <div class="container w-75">
              <p class="text-center" data-aos="flip-up" data-aos-duration="500">Aplikasi sistem kasir dengan berbagai fitur diantaranya Realtime Database, Manual Input, Wireless Barcode Scanner, Hitung Uang Kembalian Otomatis, Multi Invoice & Invoice Generator. Dibuat oleh Wahid dan Tim dengan rancangan database dan sistem kalkulasi dan data managemen yang cukup baik.</p>
            </div>
</div>

<?php }?>    
</div>

<script src="node_modules/aos/dist/aos.js"></script>
    <script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>