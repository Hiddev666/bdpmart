<?php
session_start();
include("config/database-connection.php");

$id = $_GET['id'];
$kode_barang = $_GET['kode_barang'];
$kode_invoice = $_SESSION['invoice_id'];


$querySearchCurrentJumlahBeli = mysqli_query($conn, "select transaksi.id, barang.kode_barang, barang.nama_barang, barang.harga_barang, COUNT(barang.nama_barang) as jumlah_beli from barang inner join transaksi on barang.kode_barang = transaksi.kode_barang inner join invoice on transaksi.kode_invoice = invoice.id where invoice.id=$kode_invoice GROUP BY barang.kode_barang order by transaksi.id desc;");
$querySearchCurrentJumlahBeliArr = mysqli_fetch_array($querySearchCurrentJumlahBeli);
$jumlah_beli = $querySearchCurrentJumlahBeliArr['jumlah_beli'];

$querySearchQty = "SELECT * FROM barang where kode_barang='$kode_barang'";
$querySearchQtyExecute = mysqli_query($conn, $querySearchQty);
$querySearchQtyArr = mysqli_fetch_array($querySearchQtyExecute);    
$currentQty = $querySearchQtyArr['quantity'] + $jumlah_beli;

$query2 = "UPDATE barang set quantity='$currentQty' where kode_barang='$kode_barang'";
$query2Execute = mysqli_query($conn, $query2);

$query = "DELETE FROM transaksi where kode_barang='$kode_barang' and kode_invoice=$kode_invoice";
$sql = mysqli_query($conn, $query);

header("location: invoice-view.php")

?>