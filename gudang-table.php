<?php
     session_start();
     include("config/database-connection.php");
 
         $rows = mysqli_query($conn, "SELECT * FROM barang order by nama_barang asc;");
     $searchEmptyQuery  = mysqli_query($conn,'SELECT * FROM barang where quantity=0');

    // $total ="Rp " . number_format(mysqli_fetch_column($totalQuery),2,',','.');
?>

<div class="container mt-4">
  <table class="table table-striped caption-top table-responsive text-center table-borderless">
        
    <?php 
    
   
?>
      <div class="row d-flex flex-row justify-content-center">
    <?php 
      $i = 1;
      foreach ($rows as $row) {
    ?>
        <div class="col-4">
            <div class="card w-100 mt-3" style="width: 18rem;">
             <div class="card-body">
                <div class="d-flex align-items-center w-100">
                    <h5 class="card-title"><?php echo $row['nama_barang']?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary ms-auto"><?php echo $row['kode_barang']?></h6>
                </div>
            <p class="card-text m-0">Harga : <?php echo "<b>Rp " . number_format($row['harga_barang'],2,',','.') . "</b>"?></p>
            <p class="card-text m-0 text-end">Stock</p>
            <h5 class="card-title text-end fs-1"><?php echo $row['quantity']?></h5>
          </div>
        </div>
        </div>
        <?php $i++;}?> 
    </div>
</table>
<p class="text-center">© Market Day Creative Products XII RPL SMKN 1 Muara Enim 2023</p>
</div>