<?php
session_start();

if(!isset($_SESSION["role"])){
    header("Location: ../login.php");
}

include("../config/database-connection.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | BDP MART</title>
    <link href="../bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-color: #F8F9FD;">

    <!-- <?php
            include "sidebar.php";
            ?> -->

    <div class="d-flex w-100">
        <div class="w-25 bg-danger">
            <?php include "sidebar.php" ?>
        </div>


        <div class="w-75">
            <?php
            if (isset($_GET['barangaction'])) {

                if ($_GET['barangaction'] == "tambah") { ?>
                    <?php include "pages/add-barang.php" ?>
                <?php } elseif ($_GET['barangaction'] == "read") { ?>
                    <?php include "pages/barang.php" ?>
                <?php } elseif ($_GET['barangaction'] == "update") { ?>
                    <?php include "pages/update-barang.php" ?>
                <?php } ?>

            <?php } elseif (isset($_GET['pegawaiaction'])) {

                if ($_GET['pegawaiaction'] == "tambah") { ?>
                    <?php
                        if($_SESSION['role'] != "special") {
                            include "pages/add-pegawai.php?notspecial";
                        } else {
                            include "pages/add-pegawai.php";
                        }
                            ?>
                <?php } elseif ($_GET['pegawaiaction'] == "read") { ?>
                    <?php include "pages/pegawai.php" ?>
                <?php } elseif ($_GET['pegawaiaction'] == "update") { ?>
                    <?php include "pages/update-pegawai.php" ?>
                <?php } ?>

            <?php } else { ?>
                <?php include "pages/barang.php" ?>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>