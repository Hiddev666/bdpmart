<?php
session_start();
include("../config/database-connection.php");

$barangQuery = mysqli_query($conn, "SELECT * FROM barang order by date_recorded desc;");
?>

<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Stok Barang</h3>

        <?php

        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'storeberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menambahkan barang</div>";
            } else if ($_GET['pesan'] == 'updateberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil mengubah barang</div>";
            } else if ($_GET['pesan'] == 'deleteberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menghapus barang</div>";
            }
        }

        ?>

        <div class="mt-3">
            <a href="?barangaction=tambah">
                <button class="btn btn-primary">Tambah Barang +</button>
            </a>
        </div>

        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col" class="text-center">Harga Barang</th>
                    <th scope="col" class="text-center">Stok Barang</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($barangQuery as $barang) { ?>
                    <tr>
                        <th scope="row"><?= $barang['kode_barang'] ?></th>
                        <td><?= $barang['nama_barang'] ?></td>
                        <td class="text-center"><?= "Rp " . number_format($barang['harga_barang'], 0, ',', '.') ?></td>
                        <td class="text-center"><?= $barang['quantity'] ?></td>
                        <td class="text-center">
                            <a href="?barangaction=update&kodebarang=<?= $barang['kode_barang'] ?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="pages/control/deleteBarang.php?kodebarang=<?= $barang['kode_barang'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>