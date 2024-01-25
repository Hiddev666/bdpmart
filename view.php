<?php
    session_start();
    include("config/database-connection.php");

    $decode = $_GET['decode'];
    $invoiceID = $_GET['invoiceid'];

    $queryCheck = mysqli_query($conn, "SELECT * FROM barang where kode_barang='$decode';");
    if(mysqli_num_rows($queryCheck) == 0) {
        echo "<h1 style='text-align: center;'>Barang Tidak Terdaftar Di Database!</h1>";
    } else {
            $query = "INSERT INTO transaksi (kode_barang, kode_invoice) VALUES ('$decode', '$invoiceID')";
            $sql = mysqli_query($conn, $query);
            
            $querySearchQty = "SELECT * FROM barang where kode_barang='$decode'";
            $querySearchQtyExecute = mysqli_query($conn, $querySearchQty);
            $querySearchQtyArr = mysqli_fetch_array($querySearchQtyExecute);    
            $currentQty = $querySearchQtyArr['quantity'] - 1;
        
            $query2 = "UPDATE barang set quantity='$currentQty' where kode_barang='$decode'";
            $query2Execute = mysqli_query($conn, $query2);
            
            header("location: scanner.php");    
    }
?>