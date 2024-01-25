<style>
    .print-popup {
        position: fixed;
        visibility: hidden;
        display: flex;
        align-items: center;
        width: 100%;
        height: 80vh;
    }
    .ping {
        color: green;
    }
</style>
<div class="print-popup" id="printpopup">
    <div class="container card w-25 h-25 d-flex justify-content-center align-items-center">
        <h3>Yakin ingin cetak struk?</h3>
        <div class="d-flex gap-3 w-75 mt-3">
            <button class="btn btn-danger w-50" onclick="printClose()">Batal</button>
            <a href="test-print.php" class="w-50">
                <button class="btn btn-success w-100">Oke</button>
            </a>
        </div>
</div>
</div>

<script>

    let popup = document.getElementById("printpopup")

    function printClose() {
        popup.style.visibility = "hidden";
    }

    function printOpen() {
        popup.style.visibility = "visible";
    }
</script>