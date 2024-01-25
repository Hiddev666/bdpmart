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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body onload="table()">

  <?php
    include("config/database-connection.php");
    include("print-popup.php");

  $rows = mysqli_query($conn, "SELECT * FROM invoice order by id desc;");

  if(isset($_POST['submit'])) {
    // $_SESSION['invoice_id'] = $_POST['invoice'];
  }

  if(isset($_GET['manual_input'])) {
    $decode = $_GET['kodebarang'];
    $jumlah_beli = $_GET['jumlahbeli'];
    $invoiceid = $_SESSION['invoice_id'];

    header("location: manual-input.php?decode=$decode&invoiceid=$invoiceid&jumlah_beli=$jumlah_beli");
  }

  if(isset($_GET["tunai"])) {
    $tunai = (int)$_GET["tunai"];
    $_SESSION["tunai"] = $tunai;
    $totalbelanja = $_SESSION["totalbelanja"];

    header("location: hitung-kembalian.php?tunai=$tunai");
  }

?>


    <script>
        function table() {
            const xhttp = new XMLHttpRequest()
            xhttp.onload = function() {
                document.getElementById("table").innerHTML = this.responseText;
            }
            xhttp.open("GET", "invoice-table.php")
            xhttp.send()
        }

        setInterval(() => {
            table()
        }, 1000);
    </script>

        <div class="container d-flex justify-content-end mt-4">
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

        <div class="container d-flex w-100 align-items-center mt-5 mb-5">
          <div class="container w-50 d-flex">
              <div class="d-flex align-items-center">
                <img src="bdp-logo.png" alt="" width="120px">
              </div>
              <div class="w-100 d-flex align-items-center">
                <div  class="ms-3">
                  <h2 class="m-0">BISNIS DARING DAN PEMASARAN</h2>
                  <p class="m-0">Point Of Sale Application</p>
                </div>
              </div>
          </div>

          <div class="d-flex rounded align-items-center">
            <div class="ms-5">
              <img src="keyboard-svgrepo-com.svg" alt="" width="100px">
            </div>
            <div class="ms-5">
              <form action="" method="GET" class="ms-auto">
                <h5>Manual Input</h5>
                <div class="row">
                  <div class="col">
                    <?php 
                    
                    $lastKodeBarang = "";
                    if(isset($_SESSION['last_kodebarang'])) {
                      $lastKodeBarang = $_SESSION['last_kodebarang'];
                    }

                    ?>
                    <input type="text" class="form-control" placeholder="Kode Barang" name="kodebarang" autofocus>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Jumlah Beli" name="jumlahbeli">
                  </div>
                  <div class="col">
                    <input type="submit" class="btn btn-warning" name="manual_input" value="Input +">
                  </div>
                </div>
              </form>
              <p class="m-0 mt-3">Kembalian</p>
              <form action="" method="GET">
                    <div class="row">
                      <div class="col">
                        <input type="number" class="form-control" placeholder="Tunai" name="tunai">
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="Kembalian" name="kembalian" value="<?php echo $_SESSION['kembalian']?>" disabled>
                      </div>
                      <div class="col">
                        <input type="submit" class="btn btn-warning" name="manual_input" value="Hitung">
                      </div>
                    </div>
              </form>
            </div>
          </div>
        </div>

    <div id="table">

    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>