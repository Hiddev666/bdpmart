<?php
    session_start();
    include("config/database-connection.php");

    $invoiceID = $_SESSION['invoice_id'];

    $invoiceQuery = mysqli_query($conn,"SELECT * FROM invoice order by id desc");
    $invoiceRows = mysqli_fetch_array($invoiceQuery);
    $invoiceID = $invoiceRows['id'];

  $_SESSION['invoice_id'] = $invoiceID;

    $rows = mysqli_query($conn, "select transaksi.id, barang.kode_barang, barang.nama_barang, barang.harga_barang, COUNT(barang.nama_barang) as jumlah_beli from barang inner join transaksi on barang.kode_barang = transaksi.kode_barang inner join invoice on transaksi.kode_invoice = invoice.id where invoice.id=$invoiceID GROUP BY barang.kode_barang order by transaksi.id desc ;");
    $rowsLast = mysqli_query($conn, "select transaksi.id, barang.kode_barang, barang.nama_barang, barang.harga_barang, COUNT(barang.nama_barang) as jumlah_beli from barang inner join transaksi on barang.kode_barang = transaksi.kode_barang inner join invoice on transaksi.kode_invoice = invoice.id where invoice.id=$invoiceID GROUP BY barang.kode_barang order by transaksi.id asc ;");
    $totalQuery = mysqli_query($conn, "select SUM(harga_barang) as total from barang inner join transaksi on barang.kode_barang = transaksi.kode_barang inner join invoice on transaksi.kode_invoice = invoice.id where invoice.id=$invoiceID;");
    $total ="Rp " . number_format(mysqli_fetch_column($totalQuery),2,',','.');
?>



<div class="container mt-5">
  <table class="table table-striped caption-top table-responsive text-center table-borderless">
    <div class="d-flex">
      <div>
        <h2>Total Belanja : <?php echo $total?></h2>
        <p class="m-0">Invoice ID = <?php echo $_SESSION['invoice_id']?></p>
      </div>
      <button class="btn btn-danger ms-auto" onclick="printOpen()"><img src="print-svgrepo-com.svg" width="40px" class="me-2">Print</button>
    </div>
    
  <thead>
  <tr>
    <th scope="col">No</th>
    <th scope="col" class="text-start">Kode Barang</th>
  <th scope="col" class="text-start">Nama Barang</th>
  <th scope="col">Harga Barang</th>
  <th scope="col">Jumlah Beli</th>
  <th scope="col">Action</th>
  </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php 
      $i = 1;
      foreach ($rows as $row) {
        $cancel = "cancel-transaction.php?id=" . $row['id'] . "&kode_barang=" . $row['kode_barang'];
        $cancelAll = "cancel-all-transaction.php?id=" . $row['id'] . "&kode_barang=" . $row['kode_barang'];
    ?>
    <tr>
      <td><?php echo $i?></td>
      <td class="text-start"><?php echo $row['kode_barang']?></td>
      <td class="text-start"><?php echo $row['nama_barang']?></td>
      <td><?php echo "Rp " . number_format($row['harga_barang'],2,',','.')?></td>
      <td><?php echo $row['jumlah_beli']?></td>
      <div class="bg-danger">
        <td><a href="<?php echo $cancel?>" class="btn btn-secondary">Cancel 1</a></td>
        <td><a href="<?php echo $cancelAll?>" class="btn btn-secondary">Cancel All</a></td>
      </div>
    </tr>
  <?php 
  $i++;}?>

  <?php 
  
  if(mysqli_num_rows($rowsLast) == 0) {

  } else {
    foreach ($rowsLast as $rowl) {
  
    }
  
    $_SESSION['last_kodebarang'] = $rowl['kode_barang'];
  }

  ?>

 
</tbody>
</table>
<p class="text-center">©2024 Bisnis Daring dan Pemasaran SMK Negeri 1 Muara Enim</p>
</div>