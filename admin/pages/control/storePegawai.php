<?php
include "../../../config/database-connection.php";

if (isset($_POST['name'])) {

    try {
        $stmt = $conn->prepare("INSERT INTO `users` (`username`, `password`, `name`, `role`) VALUES (?, ?, ?, ?);");
        $stmt->bind_param("ssss", $username, $password, $name, $role);

        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $role = $_POST['role'];

        $stmt->execute();

        header("Location: ../../index.php?pegawaiaction=read&pesan=storeberhasil");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `kode`, `nama`, `harga`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$stok');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
