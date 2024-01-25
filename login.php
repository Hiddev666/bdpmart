<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | BISNIS DARING DAN PEMASARAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <?php
    include("config/database-connection.php");
    session_start();
    
    if(isset($_POST['username'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' and password='$password';");
        $queryArr = mysqli_fetch_array($query);
        if(mysqli_num_rows($query) != 0) {
            $_SESSION['name'] = $queryArr['name'];
            if($queryArr['role'] == "admin") {
                header("Location: gudang.php?tambah=produk");
            } else {
                header("Location: invoice-view.php");
            } 
            
        } else {
            
        };
    }

    
    ?>

  <div class="container d-flex mt-5">
    <img src="bdp-logo.png" alt="" width="70px">
  </div>

  <div style="width: 100%; height: 70vh; display: flex; justify-content-center; align-items: center;">
      <div class="container-fluid d-flex w-75">
        <div class="container w-50 d-flex justify-content-center align-items-center">
            <img src="login.svg" alt="">
        </div>
        <div class="container w-50 d-flex align-items-center">
            <div class="w-100">
                <h1 class="w-75 fw-bold m-0">BDP MART</h1>
                <p class="m-0">Point Of Sale Application</p>
                <form action="" method="POST" class="w-75 mt-4">
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-warning w-100" value="Login">
                    </div>
                </form>
            </div>
        </div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>