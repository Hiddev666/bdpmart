<?php
include "../../../config/database-connection.php";

if (isset($_POST['currentusername'])) {

    try {
        $stmt = $conn->prepare("UPDATE users SET username=?, password=?, name=?, role=? WHERE username=?;");
        $stmt->bind_param("sssss", $username, $password, $name, $role, $currentusername);

        $currentusername = $_POST['currentusername'];
        $role = $_POST['role'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];

        $stmt->execute();
        
        header("Location: ../../index.php?pegawaiaction=read&pesan=updateberhasil");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `kode`, `nama`, `penerbit`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$tahunterbit');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
