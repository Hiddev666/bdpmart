
<?php

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

$height = 80;
foreach( $rowsTable as $row){ 
    $height += 5;
}

$pdf = new FPDF('P', 'mm', array(80, $height));

$pdf->SetMargins(2,6,2);
$pdf->AddPage();

$pdf->SetFont('Courier','B',8);
$pdf->Cell(70, 5, '', 'T', 1);
$pdf->SetFont('Courier','B',17);
$pdf->Cell(70, 5, 'Struk Belanja', 0, 1);

$pdf->Image('rpl-logo-grayscale.png', 80, 10, -350);

$pdf->SetFont('Courier','',8);
$pdf->Cell(70, 5, 'Market Day Creative Products XII RPL', 0, 1);
$pdf->Cell(70, 3, '', 0, 1);

$pdf->SetFont('Courier','',8);
$pdf->Cell(18, 5, 'Struk No :', 0, 0);
$pdf->Cell(18, 5, $kode_invoice, 0, 1);
$pdf->Cell(70, 0, '----------------------------------------', 0, 1);

$pdf->SetFont('Courier','B',8);
$pdf->Cell(30, 5, 'Nama Barang', 0, 0);
$pdf->Cell(4, 5, 'Jml', 0, 0, 'C');
$pdf->Cell(17, 5, 'Harga', 0, 0, 'C');
$pdf->Cell(17, 5, 'Total', 0, 1, 'C');
$pdf->SetFont('Courier','',8);
foreach($rowsTable as $row) {
    $pdf->Cell(30, 5, $row['nama_barang'], 0, 0);
    $pdf->Cell(4, 5, $row['jumlah_beli'], 0, 0, 'C');
    $pdf->Cell(17, 5, "Rp " . number_format($row['harga_barang'],0,',','.'), 0, 0,);
    $total = $row['harga_barang'] * $row['jumlah_beli'];
    $pdf->Cell(17, 5, "Rp " . number_format($total,0,',','.'), 0, 1);
}

$pdf->Cell(100, 2, '----------------------------------------', 0, 1);
$pdf->SetFont('Courier','B',8);
$pdf->Cell(28, 5, '', 0, 0);
$pdf->Cell(24, 5, 'Total Belanja', 0, 0);
$pdf->SetFont('Courier','',8);
$pdf->Cell(17, 5, $totalBelanja, 0, 1);

$pdf->Cell(28, 5, '', 0, 0);
$pdf->SetFont('Courier','B',8);
$pdf->Cell(24, 5, 'Tunai', 0, 0);
$pdf->SetFont('Courier','',8);
$pdf->Cell(17, 5, $tunai, 0, 1);

$pdf->Cell(28, 5, '', 0, 0, 'C');
$pdf->SetFont('Courier','B',8);
$pdf->Cell(24, 5, 'Kembalian', 0, 0);
$pdf->SetFont('Courier','',8);
$pdf->Cell(17, 5, $kembalian, 0, 1);

$pdf->SetFont('Courier','B',8);
$pdf->Cell(70, 5, '', 'B', 1);



$pdf->Output(); 

?>
<body>
<script>
    console.log("hello");
</script>
</body>