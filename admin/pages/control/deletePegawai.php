<?php
include "../../../config/database-connection.php";

try {
    $stmt = $conn->prepare("DELETE FROM users WHERE username=?;");
    $stmt->bind_param("s", $username);

    $username = $_GET['username'];

    $stmt->execute();

    header("Location: ../../index.php?pegawaiaction=read&pesan=deleteberhasil");
} catch (Exception $e) {
    echo "" . $e->getMessage() . "";
}
