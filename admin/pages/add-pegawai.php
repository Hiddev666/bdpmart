<?php

if(isset($_GET['notspecial'])) {
    header("Location: index.php");
}

?>

<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Tambah Pegawai</h3>
        <form method="POST" action="pages/control/storePegawai.php">
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="kasir">Kasir</option>
                        <option value="admin">Admin</option>
                        <option value="special">Special</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary" name="storebarang">Tambah</button>
            </div>
        </form>
        <a href="index.php?pegawaiaction=read" class="mt-2">
            <button class="btn btn-warning">Cancel</button>
        </a>
    </div>
</div>