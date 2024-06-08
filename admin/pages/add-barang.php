<?php

session_start();

?>

<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Tambah Buku</h3>
        <form method="POST" action="pages/control/storeBarang.php">
            <div class="row">
                <div class="col">
                    <?php
                        $kodelast = "";
                        if(isset($_SESSION['kodebarang'])){
                            $kodelast = $_SESSION['kodebarang'];
                        }
                    ?>
                    <label for="kode" class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="<?= $kodelast?>">
                </div>
                <div class="col">
                <?php
                        $namalast = "";
                        if(isset($_SESSION['namabarang'])){
                            $namalast = $_SESSION['namabarang'];
                        }
                    ?>
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $namalast?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                <?php
                        $hargalast = "";
                        if(isset($_SESSION['hargabarang'])){
                            $hargalast = $_SESSION['hargabarang'];
                        }
                    ?>
                    <label for="harga" class="form-label">Harga Barang</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $hargalast?>">
                </div>
                <div class="col">
                <?php
                        $stoklast = "";
                        if(isset($_SESSION['stokbarang'])){
                            $stoklast = $_SESSION['stokbarang'];
                        }
                    ?>
                    <label for="stok" class="form-label">Stok Barang</label>
                    <input type="text" class="form-control" id="stok" name="stok" value="<?= $stoklast?>">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary" name="storebarang">Tambah</button>
            </div>
        </form>
        <a href="index.php?barangaction=read" class="mt-2">
            <button class="btn btn-warning">Cancel</button>
        </a>
    </div>
</div>