<?php

$kode = $_GET['kodebarang'];
$barangQuery = mysqli_query($conn, "SELECT * FROM barang WHERE kode_barang='$kode';");
$barang = mysqli_fetch_array($barangQuery);
?>

<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Ubah Buku</h3>
        <form method="POST" action="pages/control/updateBarang.php">
        <div class="row">
                <div class="col">
                    <label for="kode" class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="<?= $barang['kode_barang']?>">
                </div>
                <div class="col">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama_barang']?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="harga" class="form-label">Harga Barang</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $barang['harga_barang']?>">
                </div>
                <div class="col">
                    <label for="stok" class="form-label">Stok Barang</label>
                    <input type="text" class="form-control" id="stok" name="stok" value="<?= $barang['quantity']?>">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary" name="currentkode" value="<?= $kode?>">Ubah</button>
            </div>
        </form>
        <a href="index.php?barangaction=read" class="mt-2">
            <button class="btn btn-warning">Cancel</button>
        </a>
    </div>
</div>