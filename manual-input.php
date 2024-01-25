<?php
    session_start();
    include("config/database-connection.php");

    $decode = $_GET['decode'];
    $invoiceID = $_GET['invoiceid'];
    $jumlah_beli = 1;
    if($_GET['jumlah_beli'] != "") {
        $jumlah_beli = $_GET['jumlah_beli'];
    }

    $i = 1;
    for($i; $i <= $jumlah_beli; $i++) {
        $query = "INSERT INTO transaksi (kode_barang, kode_invoice) VALUES ('$decode', '$invoiceID')";
        $sql = mysqli_query($conn, $query);
        
        $querySearchQty = "SELECT * FROM barang where kode_barang='$decode'";
        $querySearchQtyExecute = mysqli_query($conn, $querySearchQty);
        $querySearchQtyArr = mysqli_fetch_array($querySearchQtyExecute);    
        $currentQty = $querySearchQtyArr['quantity'] - 1;
    
        $query2 = "UPDATE barang set quantity='$currentQty' where kode_barang='$decode'";
        $query2Execute = mysqli_query($conn, $query2);
        
    }

    header("location: invoice-view.php");    
?>