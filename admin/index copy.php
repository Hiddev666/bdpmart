<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERPEEL CASHIER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <?php
    session_start();
    include("../config/database-connection.php");

    $barangQuery = mysqli_query($conn, "SELECT * FROM barang order by nama_barang asc;");
    ?>

    <div class="container d-flex w-100 align-items-center">
        <div class="container mt-5 w-100 d-flex">
            <div class="d-flex align-items-center">
                <img src="../bdp-logo.png" alt="" width="120px">
            </div>
            <div class="w-100 d-flex align-items-center">
                <div>
                    <h1 class="m-0 ms-3">BISNIS DARING DAN PEMASARAN</h1>
                    <p class="m-0 ms-3">Point Of Sale Application</p>
                </div>
            </div>
        </div>

        <div class="w-50 d-flex  align-items-center justify-content-end">
            <div class="nav-item dropdown-center d-flex align-items-center">
                <img src="user.svg" alt="" class="me-2" style="width: 30px">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['name'] ?>
                </a>
                <ul class="dropdown-menu  mt-2">
                    <li class="d-flex align-items-center">
                        <img src="logout.svg" alt="" class="ms-2" style="width: 30px">
                        <a class="dropdown-item dropdown-center" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container card p-4 w-100 mt-5">
        <h2>Stok Barang</h2>
        <div class="d-flex w-100 gap-3">
            <a href="?tambah=produk">
                <button class="btn btn-primary w-100 p-2">Tambah +</button>
            </a>
        </div>
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">Kode</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Harga</th>
                    <th scope="col" class="text-center">Stok</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($barangQuery as $barang) { ?>
                    <tr>
                        <th scope="row"><?=$barang['kode_barang']?></th>
                        <td class="text-center"><?=$barang['nama_barang']?></td>
                        <td class="text-center"><?=$barang['harga_barang']?></td>
                        <td class="text-center"><?=$barang['quantity']?></td>
                        <td class="text-center">
                                <button class="btn btn-warning">Ubah</button>
                                <button class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>