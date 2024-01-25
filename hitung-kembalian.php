<?php
    include("config/database-connection.php");

session_start();

$tunai = (int)$_GET["tunai"];

$invoiceID = $_SESSION['invoice_id'];
$totalQuery = mysqli_query($conn, "select SUM(harga_barang) as total from barang inner join transaksi on barang.kode_barang = transaksi.kode_barang inner join invoice on transaksi.kode_invoice = invoice.id where invoice.id=$invoiceID;");
$total = (int)mysqli_fetch_array($totalQuery)["total"];

$kembalian = $tunai - $total;

$_SESSION["kembalian"] = "Rp " . number_format($kembalian,0,',','.');

header("location: invoice-view.php");


?>