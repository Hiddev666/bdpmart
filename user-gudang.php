<?php
     include("config/database-connection.php");
 
         $rows = mysqli_query($conn, "SELECT * FROM users order by id asc;");

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
                    <h5 class="card-title"><?php echo $row['name']?></h5>
                </div>
            <p class="card-text m-0">Username : <?php echo $row['username']?></p>
            <p class="card-text m-0">Role : <?php echo $row['role']?></p>
          </div>
        </div>
        </div>
        <?php $i++;}?> 
    </div>
</table>
<p class="text-center">© Market Day Creative Products XII RPL SMKN 1 Muara Enim 2023</p>
</div>