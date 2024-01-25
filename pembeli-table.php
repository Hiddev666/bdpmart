<?php
    session_start();
    include("config/database-connection.php");

    $invoiceID = $_SESSION['invoice_id'];

    $rows = mysqli_query($conn, "select transaksi.id, barang.kode_barang, barang.nama_barang, barang.harga_barang, COUNT(barang.nama_barang) as jumlah_beli from barang inner join transaksi on barang.kode_barang = transaksi.kode_barang inner join invoice on transaksi.kode_invoice = invoice.id where invoice.id=$invoiceID GROUP BY barang.kode_barang order by transaksi.id desc ;");
    $rowsLast = mysqli_query($conn, "select transaksi.id, barang.kode_barang, barang.nama_barang, barang.harga_barang, COUNT(barang.nama_barang) as jumlah_beli from barang inner join transaksi on barang.kode_barang = transaksi.kode_barang inner join invoice on transaksi.kode_invoice = invoice.id where invoice.id=$invoiceID GROUP BY barang.kode_barang order by transaksi.id asc ;");
    $totalQuery = mysqli_query($conn, "select SUM(harga_barang) as total from barang inner join transaksi on barang.kode_barang = transaksi.kode_barang inner join invoice on transaksi.kode_invoice = invoice.id where invoice.id=$invoiceID;");
    $total ="Rp " . number_format(mysqli_fetch_column($totalQuery),2,',','.');
?>



<div class="container mt-5">
  <table class="table table-striped caption-top table-responsive text-center table-borderless">
    <div class="d-flex">
      <h2>Total Belanja : <?php echo $total?></h2>
    </div>
    
  <thead>
  <tr>
    <th scope="col">No</th>
    <th scope="col" class="text-start">Kode Barang</th>
  <th scope="col" class="text-start">Nama Barang</th>
  <th scope="col">Harga Barang</th>
  <th scope="col">Jumlah Beli</th>
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
    </tr>
  <?php 
  $i++;}?>

</tbody>
</table>
<p class="text-center">© Market Day Creative Products XII RPL SMKN 1 Muara Enim 2023</p>
</div>