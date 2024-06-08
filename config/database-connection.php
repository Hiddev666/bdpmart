<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "bdp_mart";

$conn = mysqli_connect($server, $username, $password, $db_name);


if(!$conn) {
    echo "Gagal";
}


?>