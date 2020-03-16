
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QR Scanner Demo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body><?php
    define('sugarEntry', TRUE); 
    ini_set('max_execution_time', 0);
    error_reporting(E_ERROR);
    ini_set('display_errors', 1);
    include_once('include/entryPoint.php');
    global $db;
    global $current_user;
    $invoices = $_GET['record'];
    
    $sqlQRName = "select fyn_qr_code_boxes.name as qrname, fyn_qr_code_boxes_cstm.aos_invoices_id_c, fyn_qr_code_boxes.id, fyn_qr_code_boxes.name, aos_products_fyn_qr_code_boxes_1_c.aos_products_fyn_qr_code_boxes_1aos_products_ida as product_id from "
        . "fyn_qr_code_boxes "
            . "inner join aos_products_fyn_qr_code_boxes_1_c on aos_products_fyn_qr_code_boxes_1_c.aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = fyn_qr_code_boxes.id"
        . " left join  fyn_qr_code_boxes_cstm on fyn_qr_code_boxes.id = fyn_qr_code_boxes_cstm.id_c "
        . " where fyn_qr_code_boxes.deleted='0' and fyn_qr_code_boxes_cstm.aos_invoices_id_c = '$invoices' and aos_products_fyn_qr_code_boxes_1_c.deleted='0'";

$resultQRName = $db->query($sqlQRName);

$productQrData = [];
while($rowQRName = $db->fetchByAssoc($resultQRName))
{
    $productQrData[$rowQRName['product_id']][] = $rowQRName['qrname'];
}
    //print_r($productQrData);
    $sql = "SELECT p.name, pg.id, sum(CAST(pg.product_qty AS UNSIGNED)) as product_qty, pg.product_id as product_id, CAST(pc.balance_c AS UNSIGNED) as balance_c 
          FROM aos_products_quotes pg 
              Inner JOIN aos_products p
                on p.id = pg.product_id
              INNER JOIN aos_products_cstm pc 
                on p.id=pc.id_c 
              LEFT JOIN aos_line_item_groups lig 
                ON pg.group_id = lig.id  
          WHERE pg.parent_type = 'AOS_Invoices' 
                AND pg.parent_id in ('".$invoices."') 
                AND pg.deleted = 0
          GROUP BY pg.product_id  
          ORDER BY p.name ASC";
    $result = $db->query($sql);
    $num = $result->num_rows;
    echo "<h4>Product Scan </h4>";
    echo "<table border='1'><tr><th>Select Product</th><th>Product Name</th><th>QR Code</th></tr>";
    if($num > 0) {
        
        while ($row = $db->fetchByAssoc($result)) {
            //echo "Here i am in to ".$row['product_qty'];
            $select = "select * from aos_products_fyn_qr_code_boxes_1_c where aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$row['id']."'";            
            //$products[$row['name']] =  $products[$row['name']] + (int)$row['product_qty'];
            for($i = 1,$j=0; $i <= (int)$row['product_qty']; $i++,$j++) {
                
            //echo " kk ";   
                echo "<tr><td>";
                if($productQrData[$row['product_id']][$j]=="") { echo "<input type='radio' name = 'selectProduct' value='".$row['product_id']."'>";
                }
                echo "</td><td>".$row['name']."</td><td>".$productQrData[$row['product_id']][$j]."</td></tr>";
            }
            
        }
    }
    echo "</table><br><br><br>";
                
                print_r($products);
    ?>
<style>
    canvas {
        display: none;
    }
    hr {
        margin-top: 32px;
    }
    input[type="file"] {
        display: block;
        margin-bottom: 16px;
    }
    div {
        margin-bottom: 16px;
    }
</style>
<h1>Scan from WebCam:</h1>
<div>
    <b>Device has camera: </b>
    <span id="cam-has-camera"></span>
    <br>
    <video muted playsinline id="qr-video"></video>
</div>
<div>
    <!--<select id="inversion-mode-select">
        <option value="original">Scan original (dark QR code on bright background)</option>
        <option value="invert">Scan with inverted colors (bright QR code on dark background)</option>
        <option value="both">Scan both</option>
    </select>-->
    <br>
</div>
<b>Detected QR code: </b>
<span id="cam-qr-result">None</span>
<br>
<b>Last detected at: </b>
<span id="cam-qr-result-timestamp"></span>

<script type="module">
    import QrScanner from "./qr-scanner.min.js";
    QrScanner.WORKER_PATH = './qr-scanner-worker.min.js';

    const video = document.getElementById('qr-video');
    const camHasCamera = document.getElementById('cam-has-camera');
    const camQrResult = document.getElementById('cam-qr-result');
    const camQrResultTimestamp = document.getElementById('cam-qr-result-timestamp');
    const fileSelector = document.getElementById('file-selector');
    const fileQrResult = document.getElementById('file-qr-result');

    function setResult(label, result) {
        if ($("input[name='selectProduct']:checked").val()) {
                var productId = $("input[name='selectProduct']:checked").val();
                var invoiceid = "<?php echo $_GET['record']; ?>";
                console.log(productId + " "+invoiceid);
                $.ajax({
					        url: "checkAndAssignQr.php",
					        type: "POST",
					        data: {'qrcode':result,'productid':productId,'invoiceid':invoiceid},
					        success: function (response) {
					        	if(response) {
					        	label.textContent = response;
                                                        camQrResultTimestamp.textContent = new Date().toString();
                                                        label.style.color = 'teal';
                                                        clearTimeout(label.highlightTimeout);
                                                        label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
                                                        //alert(response);
                                                         location.reload();
                                                    }else{
					        	label.textContent = "error occured in db operations";
                                                    }
					        },
					        error: function(jqXHR, textStatus, errorThrown) {
                                                    label.textContent = errorThrown;
					           //$('#code').html(textStatus, errorThrown);
					        }
				    	});
                
         } else {
            alert("Please select Product for scan.");
            return false;
        }
    }

    // ####### Web Cam Scanning #######

    QrScanner.hasCamera().then(hasCamera => camHasCamera.textContent = hasCamera);

    
    document.getElementById('scannow').addEventListener('click', event => {
        const scanner = new QrScanner(video, result => setResult(camQrResult, result));
        scanner.start();
        scanner.setInversionMode("both");
    });

   

</script>

<input type="button" name="scan" value="Scan" id="scannow">

</body>
</html>