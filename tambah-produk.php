<?php

if(isset($_POST['tambahproduk'])){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $quantity = $_POST['quantity'];

    $query = mysqli_query($conn, "INSERT INTO barang VALUES ('$kode', '$nama', '$harga', '$quantity');");
}

if(isset($_POST['ubahproduk'])){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $quantity = $_POST['quantity'];

    $query = mysqli_query($conn, "UPDATE barang SET nama_barang='$nama', harga_barang='$harga', quantity='$quantity' where kode_barang='$kode';");
}

if(isset($_POST['hapusproduk'])){
    $kode = $_POST['kode'];

    $query = mysqli_query($conn, "DELETE FROM barang WHERE kode_barang='$kode';");
}

?>

<h3 class="mt-4">Tambah Produk</h3>
<form class="mt-4" method="POST">
      <div class="mb-3">
        <div class="row">
            <div class="col">
                <div>
                    <label for="">Kode Barang</label>
                    <input type="text" class="form-control" name="kode">
                </div>
            </div>
            <div class="col">
                <div>
                    <label for="">Nama Barang</label>
                    <input type="text" class="form-control" name="nama">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <div>
                    <label for="">Harga Barang</label>
                    <input type="number" class="form-control" name="harga">
                </div>
            </div>
            <div class="col">
                <div>
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" name="quantity">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
            <input type="submit" class="btn btn-primary p-2 w-25" value="Tambah" name="tambahproduk">
                <input type="submit" class="btn btn-warning p-2 w-25" value="Ubah" name="ubahproduk">
                <input type="submit" class="btn btn-danger p-2 w-25" value="Hapus" name="hapusproduk">
            </div>
            <div class="col"></div>
        </div>
      </div>
</form>