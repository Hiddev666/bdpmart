<?php

if(isset($_POST['tambahuser'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $name = $_POST['name'];

    $query = mysqli_query($conn, "INSERT INTO users VALUES (NULL, '$username', '$password', '$name', '$role');");
}

if(isset($_POST['ubahuser'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $name = $_POST['name'];

    $query = mysqli_query($conn, "UPDATE users SET password='$password', role='$role', name='$name' where username='$username';");
}

if(isset($_POST['hapususer'])){
    $username = $_POST['username'];

    $query = mysqli_query($conn, "DELETE FROM users WHERE username='$username';");
}

?>

<h3 class="mt-4">Tambah User</h3>
<form class="mt-4" method="POST">
      <div class="mb-3">
        <div class="row">
            <div class="col">
                <div>
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
            </div>
            <div class="col">
                <div>
                    <label for="">Password</label>
                    <input type="text" class="form-control" name="password">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <div>
                    <label for="">Role</label>
                    <select name="role" id="" class="form-select">
                        <option value="kasir">Kasir</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
            <div class="col">
            <div>
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <input type="submit" class="btn btn-primary p-2 w-25" value="Tambah" name="tambahuser">
                <input type="submit" class="btn btn-warning p-2 w-25" value="Ubah" name="ubahuser">
                <input type="submit" class="btn btn-danger p-2 w-25" value="Hapus" name="hapususer">
            </div>
            <div class="col"></div>
        </div>
      </div>
</form>