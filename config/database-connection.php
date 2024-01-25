<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "bdp_pos";

$conn = mysqli_connect($server, $username, $password, $db_name);


if(!$conn) {
    echo "Gagal";
}


?>