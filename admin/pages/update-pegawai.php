<?php

$username = $_GET['username'];
$userQuery = mysqli_query($conn, "SELECT * FROM users WHERE username='$username';");
$user = mysqli_fetch_array($userQuery);
?>

<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Ubah Pegawai</h3>
        <form method="POST" action="pages/control/updatePegawai.php">
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                </div>
                <div class="col">
                    <label for="username" class="form-label">username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['password'] ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="<?= $user['username'] ?>">
                </div>
                <div class="col">
                    <label for="role" class="form-label">role Barang</label>
                    <select name="role" id="role" class="form-select">
                        <option value="<?= $user['role'] ?>"><?= $user['role'] ?></option>
                        <option value="kasir">Kasir</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary" name="currentusername" value="<?= $username?>">Ubah</button>
            </div>
        </form>
        <a href="index.php?pegawaiaction=read" class="mt-2">
            <button class="btn btn-warning">Cancel</button>
        </a>
    </div>
</div>