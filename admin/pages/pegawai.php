<?php
session_start();
include("../config/database-connection.php");

$pegawaiQuery = mysqli_query($conn, "SELECT * FROM users;");
?>

<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Pegawai</h3>

        <?php

        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'storeberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menambahkan barang</div>";
            } else if ($_GET['pesan'] == 'updateberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil mengubah barang</div>";
            } else if ($_GET['pesan'] == 'deleteberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menghapus barang</div>";
            } else if ($_GET['pesan'] == 'notspecial') {
                echo "<div class='alert alert-danger' role='alert'>Anda tidak memiliki hak akses untuk halaman ini!</div>";
            }
        }

        ?>

        <div class="mt-3">
            <?php

            if ($_SESSION['role'] != "special") {
                $add = "?pegawaiaction=read&pesan=notspecial";
            } else {
                $add = "?pegawaiaction=tambah";
            }

            ?>
            <a href="<?= $add ?>">
                <button class="btn btn-primary">Tambah Pegawai +</button>
            </a>
        </div>

        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col" class="text-center">Role</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($pegawaiQuery as $pegawai) { ?>
                    <tr>
                        <th scope="row"><?= $pegawai['name'] ?></th>
                        <td><?= $pegawai['username'] ?></td>
                        <td class="text-center"><?= $pegawai['role'] ?></td>
                        <td class="text-center">
                            <?php

                            if ($_SESSION['role'] != "special") {
                                $edit = "?pegawaiaction=read&pesan=notspecial";
                                $delete = "?pegawaiaction=read&pesan=notspecial";
                            } else {
                                $pegawaiusername = $pegawai["username"];
                                $edit = "?pegawaiaction=update&username=$pegawaiusername";
                                $delete = "pages/control/deletePegawai.php?username=$pegawaiusername";
                            }
                            
                            ?>
                            <a href="<?= $edit?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="<?= $delete?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>