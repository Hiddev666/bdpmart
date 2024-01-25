

<?php session_start();
    include("config/database-connection.php");
    $rows = mysqli_query($conn, "SELECT * FROM invoice order by id desc;");


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERPEEL CASHIER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    

  <div class="container mt-5">
    <form action="" method="POST">
        <button class="btn btn-primary" type="submit" name="submit">New Invoice +</button>
    </form>
  </div>

  <div class="container mt-3">
    <form action="" method="POST" class="d-flex">
    <select name="invoice" id="invoice" class="form-select w-25">
      <option selected>Select Invoice ID</option>
        <?php foreach($rows as $row) {?>
          <option value="<?php echo $row['id']?>"><?php echo $row['id']?></option>
          <?php }?>
      </select>
      <button class="btn btn-primary ms-2" type="submit" name="submit">Select</button>
    </form>
  </div>

  <?php
    if(isset($_POST['submit'])) {

    include("config/database-connection.php");
        if(isset($_POST['invoice'])) {
            $invoiceSelected = $_POST['invoice'];
            $_SESSION['invoiceid'] = $invoiceSelected;
        } else {
            $query = "INSERT INTO invoice (total) VALUES (0);";
            $sql = mysqli_query($conn, $query);
    
    
            $_SESSION['invoiceid'] = mysqli_insert_id($conn);            
        }

        header("location: scanner.php");
    }
    ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>