<?php
/* Change to the correct path if you copy this example! */
require __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


session_start();
include("config/database-connection.php");
require('fpdf/fpdf.php');

$newInvoice = mysqli_query($conn, "INSERT INTO invoice VALUES (NULL, 0)");

$kode_invoice = $_SESSION['invoice_id'];
$rowsTable = mysqli_query($conn, "select transaksi.id, barang.kode_barang, barang.nama_barang, barang.harga_barang, COUNT(barang.nama_barang) as jumlah_beli from barang inner join transaksi on barang.kode_barang = transaksi.kode_barang inner join invoice on transaksi.kode_invoice = invoice.id where invoice.id=$kode_invoice GROUP BY barang.kode_barang order by transaksi.id desc ;");

$totalQuery = mysqli_query($conn, "select SUM(harga_barang) as total from barang inner join transaksi on barang.kode_barang = transaksi.kode_barang inner join invoice on transaksi.kode_invoice = invoice.id where invoice.id=$kode_invoice;");
$totalBelanja ="Rp " . number_format(mysqli_fetch_column($totalQuery),0,',','.');

$tunai = "Rp " . number_format($_SESSION['tunai'],0,',','.');
$kembalian = $_SESSION['kembalian'];

try {
    $connector = null;
    $connector = new WindowsPrintConnector("EPSON L120 Series");

    $printer = new Printer($connector);
    $printer -> text("         --BISNIS DARING DAN PEMASARAN--        \n");
    $printer -> text("             SMK NEGERI 1 MUARA ENIM           \n");
    $printer->feed();
    $printer -> text("Name                     Price   Qty  SubTotal  \n");
    $printer -> text("------------------------------------------------\n");
    foreach($rowsTable as $row) {
        $name = $row['nama_barang'];
        $namesubs = substr($name, 0, 23);
        if(strlen($namesubs) < 23) {
            $cut = 23 - strlen($namesubs);
            $realname =  $name . str_repeat(" ", $cut);
        }
        
        $price = $row['harga_barang'];
        $pricesubs = substr($price, 0, 6);
        if(strlen($pricesubs) < 6) {
            $cut = 6 - strlen($pricesubs);
            $realprice =  $price . str_repeat(" ", $cut);
        }
        
        $qty = $row['jumlah_beli'];
        $qtysubs = substr($qty, 0, 3);
        if(strlen($qtysubs) < 3) {
            $cut = 3 - strlen($qtysubs);
            $realqty =  $qty . str_repeat(" ", $cut);
        }
        
        $subtotal = $row['harga_barang'] * $row['jumlah_beli'];
        
        $printer -> text("$realname  $realprice  $realqty  $subtotal \n");
    }
    
    $printer -> text("------------------------------------------------\n");
    $printer -> text("                       Total        $totalBelanja  \n");
    $printer -> text("                       Tunai        $tunai  \n");
    $printer -> text("                       Kembalian    $kembalian  \n");
    $printer->feed();
    $printer -> text("                  TERIMA KASIH                  \n");
    $printer->feed();
    
    
    $printer -> cut();
    $printer -> close();
    
    header("Location: invoice-view.php");
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}