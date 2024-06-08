<?php
include "../../../config/database-connection.php";

if (isset($_POST['currentkode'])) {

    try {
        $stmt = $conn->prepare("UPDATE barang SET kode_barang=?, nama_barang=?, harga_barang=?, quantity=? WHERE kode_barang=?;");
        $stmt->bind_param("sssss", $kode, $nama, $harga, $stok, $currentkode);

        $currentkode = $_POST['currentkode'];
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $stmt->execute();
        
        header("Location: ../../index.php?pesan=updateberhasil");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `kode`, `nama`, `penerbit`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$tahunterbit');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
