<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container mt-3 mb-3">
  <h1>ERPEEL CASHIER</h1>
  <input type="text" id="test" class="form-control" onchange="testAudio()">
  <input type="text" id="invoiceid" class="form-control" disabled value="<?php echo $_SESSION['invoiceid']?>">
</div>

<div id="reader" width="600px"></div>

<div class="container-fluid">
  <a href="scanner-home.php"><button class="btn btn-warning w-100">Back</button></a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>

  showTorchButtonIfSupported = true

  function testAudio() {
    let audio = new Audio('store-scanner-beep-90395.mp3')
    audio.play()
    alert("asdasd")
  }

  let i = 1

    function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
    let audio = new Audio('store-scanner-beep-90395.mp3')    
    audio.play()
    document.getElementById('test').value = `Decoded : ${decodedText} \n`
    let invoiceid =document.getElementById('invoiceid').value

    // $.ajax({
    //         type: "POST",
    //         url: "store.php",
    //         data: {
    //              json: JSON.stringify(obj)
    //         },
    //         success: function (response) {
    //             //service.php response
    //             console.log(response);
    //         }
    //     });

    i++
    window.location = `view.php?decode=${decodedText}&invoiceid=${invoiceid}`
}

function testSend() {
  window.location = `view.php?decode=B001`
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250}, showTorchButtonIfSupported: true },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
</body>
</html> 