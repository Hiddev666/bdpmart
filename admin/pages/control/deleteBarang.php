<?php
include "../../../config/database-connection.php";

try {
    $stmt = $conn->prepare("DELETE FROM barang WHERE kode_barang=?;");
    $stmt->bind_param("s", $kode);

    $kode = $_GET['kodebarang'];

    $stmt->execute();

    header("Location: ../../index.php?pesan=deleteberhasil");
} catch (Exception $e) {
    echo "" . $e->getMessage() . "";
}
