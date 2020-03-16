<html>
<head>
	<style>
	.button{
		padding: 10px;
		padding-left: 25px;
		padding-right: 25px;
		background-color: crimson;
		color: white;
		border:0;
	}
	.button:hover{
		color:grey;
		background-color: orange;
	}
	
	</style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>
		Driver Digital Signature
	</title>
</head>
<body>
        <?php
    define('sugarEntry', TRUE); 
    ini_set('max_execution_time', 0);
    error_reporting(E_ERROR);
    ini_set('display_errors', 1);
    include_once('include/entryPoint.php');
    global $db;
    global $current_user;
    $invoices = $_GET['record'];
    /* $sql = "SELECT p.name, pg.id, sum(CAST(pg.product_qty AS UNSIGNED)) as product_qty, pg.product_id as product_id, CAST(pc.balance_c AS UNSIGNED) as balance_c 
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
          GROUP BY p.name, pg.id  
          ORDER BY p.name ASC";
    $result = $db->query($sql);
    $num = $result->num_rows; */
    
	
	$sql2 = "SELECT FORMAT(i.total_amount,2) as InvAmt, FORMAT(IFNULL(p.amount_received,0.00),2) as recAmt 
				FROM aos_invoices i LEFT JOIN kms_invoice_payments p ON p.aos_invoices_id=i.id
				WHERE  i.deleted=0 AND p.deleted=0 AND i.id='$invoices'";
	$result2 = $db->query($sql2);
	$row = $db->fetchByAssoc($result2); //InvAmt, recAmt
	//Invoice Amt:$<?php echo $row['InvAmt'];| Paid Amt:$<?php echo $row['recAmt'];
	$paymentDetails = "Invoice Amt:$".$row['InvAmt']." | Paid Amt:$".$row['recAmt'];
	$credit = 0;
	if($row['InvAmt'] < $row['recAmt']){
		$credit = $row['recAmt'] - $row['InvAmt'];
		$creditDetails = "Credit Amount : $".$credit;
	}
    ?>
    <style>
            #signature{
                width: 400px; height: 300px;
                border: 1px solid black;
            }
        </style>
        <h3>Driver Digital Signature : </h3>
        <!-- Signature -->
        <div>
            <label>Driver Print Full Name : </label>
            <span><input type="text" id = "driver_print_name_c" name = "driver_print_name_c"></span>
        </div>
        <br>
        <div>
            <span>Please Confirm the Shipment Details below by Checking the check box.</span>
        </div>
        <br>
        <div>
            <span><input type="checkbox" id = "customer_not_onsite_c" name = "customer_not_onsite_c"> 
			Driver Confirms Customer is not On-Site to receive shipment.
        </div>
        <br>
		<div>
			<span><input type="checkbox" id = "confirm_location_c" name= "confirm_location_c"> 
			Driver Confirms location of Customer requested drop off location.
		</div>
		<div>
			<span><input type="checkbox" id = "picture_confirm_c" name= "picture_confirm_c">
			Driver will take picture of shipment drop off.
		</div>
		<div>
			<span><input type="checkbox" id = "confirm_qr_scanned_c" name= "confirm_qr_scanned_c">
			Driver confirms QR Boxes has been scanned.
		</div>
		<br>
        <div id="signature" style=''>
            <canvas id="signature-pad" class="signature-pad" width="400px" height="300px"></canvas>
        </div>
        <br/>
        
        <input type='button' id='click' value='Submit Signature'><br/>
       
        <textarea style="display:none" name="output" id='output'></textarea><br/>
       
        <!-- Preview image -->
        

        <!-- Script -->
        <!-- <script src='jquery-3.0.0.js' type='text/javascript'></script> -->
        <script src="custom/modules/AOS_Invoices/js/signature_pad-master/js/signature_pad.js"></script>
    
        <script>
            $(document).ready(function() {
                var signaturePad = new SignaturePad(document.getElementById('signature-pad'));

                $('#click').click(function()
                {
                    var driver_print_name_c = $("#driver_print_name_c").val();
                    if(driver_print_name_c == "") {
                        alert("Please enter Driver Print Full Name!");
                        return false;
                    }
					if(!$('#customer_not_onsite_c').is(':checked')){
						alert('Please Confirm Customer Not Onsite');
						return false;
					}
                    if(!$('#confirm_location_c').is(':checked')){
						alert('Please Confirm Customer Drop Off location');
						return false;
					}
                    if(!$('#picture_confirm_c').is(':checked')){
						alert('Please Confirm Picture taken for Drop Off location');
						return false;
					}
                    if(!$('#confirm_qr_scanned_c').is(':checked')){
						alert('Please Confirm QR Boxes Has been Scanned');
						return false;
					}
                    var invoiceid = "<?php echo $_GET['record']; ?>";
                    var todata = signaturePad.isEmpty();
                    var data = signaturePad.toDataURL('image/png');
                    $('#output').val(data);

                    $("#sign_prev").show();
                    $("#sign_prev").attr("src",data);
                    //console.log(todata);
                    if(todata == true) { alert("Customer Signature should not be Blank!");return false;} else {
                    $.ajax({
					        url: "index.php?module=AOS_Invoices&action=saveDriverDigitalSign",
					        type: "POST",
					        data: {'driver_print_name_c':driver_print_name_c, 'digitalsign':data,'invoiceid':invoiceid},
					        success: function (response) {
					        	if(response) {
					        	window.opener.location.reload(true);
                                                        window.close();
                                                    }else {
					        	$('#code').html("error occured in db operations");
                                                }
					        },
					        error: function(jqXHR, textStatus, errorThrown) {
					           $('#code').html(textStatus, errorThrown);
					        }
				    	});
                                    }
                    // Send data to server instead...
                    //window.open(data);
                });
            })
        </script>
</body>
</html>