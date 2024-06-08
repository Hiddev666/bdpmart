<?php
include "../../../config/database-connection.php";
session_start();
if (isset($_POST['kode'])) {

    if($_POST['kode'] == "" || $_POST['nama'] == "" || $_POST['harga'] == "" || $_POST['stok'] == "")  {
        $_SESSION['kodebarang'] = $_POST['kode'];
        $_SESSION['namabarang'] = $_POST['nama'];
        $_SESSION['hargabarang'] = $_POST['harga'];
        $_SESSION['stokbarang'] = $_POST['stok'];
        header("Location: ../../index.php?barangaction=tambah");
    }

    try {
        $stmt = $conn->prepare("INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga_barang`, `quantity`) VALUES (?, ?, ?, ?);");
        $stmt->bind_param("ssss", $kode, $nama, $harga, $stok);

        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $stmt->execute();

        header("Location: ../../index.php?pesan=storeberhasil");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `kode`, `nama`, `harga`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$stok');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
