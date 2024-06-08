<div class="w-25 position-fixed h-100 shadow-sm" style="background-color: white;">
    <div class="container p-3 ps-4 mt-3 d-flex align-items-center">
        <img src="../img/bdp-logo.png" alt="" width="40px">
        <div>
            <h5 class="m-0 ms-2">BDP MART</h5>
            <p class="m-0 ms-2">Point of Sale Application</p>
        </div>
    </div>
    <div class="container p-4">
        <div class="container p-3 mb-1 d-flex align-items-center rounded <?php 
            if(isset($_GET['barangaction'])) {
                echo "bg-warning";
            }
        ?>">
            <a href="index.php?barangaction=read" class="link-offset-2 link-underline link-underline-opacity-0 link-dark">
                <p class="m-0">Stok Barang</p>
            </a>
        </div>
        <div class="container p-3 mb-1 d-flex align-items-center rounded <?php 
            if(isset($_GET['pegawaiaction'])) {
                echo "bg-warning";
            }
        ?>">
            <a href="index.php?pegawaiaction=read" class="link-offset-2 link-underline link-underline-opacity-0 link-dark">
                <p class="m-0">Pegawai</p>
            </a>
        </div>
        <div class="container p-3 mb-1 d-flex align-items-center rounded ">
                <div class="nav-item dropdown-center d-flex align-items-center">
                    <img src="../user.svg" alt="" class="me-2" style="width: 25px">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <?= $_SESSION['name'] ?>
                    </a>
                    <ul class="dropdown-menu  mt-2">
                        <li class="d-flex align-items-center">
                            <img src="../logout.svg" alt="" class="ms-2" style="width: 30px">
                            <a class="dropdown-item dropdown-center" href="../logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
</div>