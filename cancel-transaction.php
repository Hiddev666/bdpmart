<?php

include("config/database-connection.php");

$id = $_GET['id'];
$kode_barang = $_GET['kode_barang'];

$query = "DELETE FROM transaksi where id=$id";
$sql = mysqli_query($conn, $query);

$querySearchQty = "SELECT * FROM barang where kode_barang='$kode_barang'";
$querySearchQtyExecute = mysqli_query($conn, $querySearchQty);
$querySearchQtyArr = mysqli_fetch_array($querySearchQtyExecute);    
$currentQty = $querySearchQtyArr['quantity'] + 1;
echo $currentQty;

$query2 = "UPDATE barang set quantity='$currentQty' where kode_barang='$kode_barang'";
$query2Execute = mysqli_query($conn, $query2);

header("location: invoice-view.php")

?>