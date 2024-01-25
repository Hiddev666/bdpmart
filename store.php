<?php

include("config/database-connection.php");

$query = "INSERT INTO karyawan VALUES ('12345', '54321')";
$sql = mysqli_query($conn, $query);

if($sql) {
    echo "success";
}

?>