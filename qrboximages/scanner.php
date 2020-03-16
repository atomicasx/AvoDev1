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
	.centered{
		display: block;
		width: 60%;
		margin: auto;
	}
	.scanner{
		width:100%;
		height:400px;
		/*display:none;*/
	}
	</style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
	<script>
		$(document).ready(function(){
			//scan button
			var code;
			var invoiceid = "<?php echo $_GET['record']; ?>";
			let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            $('#butt').on('click',function(){
                alert($("input[name='selectProduct']:checked").val())
                
                //alert(productId);
                if ($("input[name='selectProduct']:checked").val()) {
                    var productId = $("input[name='selectProduct']:checked").val();
                    alert(productId);
                    $('#preview').css('display','');
                    //let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                    scanner.addListener('scan', function (content) {
                        code = content
                        console.log(code);
                        codetext = code.split('-')[0];
                        var avocadoclass = codetext.split('BX')[0];
                        var avocadoboxof = codetext.split('BX')[1];
                        $('#code').html(content);
                        $.ajax({
					        url: "checkAndAssignQr.php",
					        type: "POST",
					        data: {'qrcode':content,'productid':productId,'invoiceid':invoiceid},
					        success: function (response) {
					        	if(response)
					        	$('#code').html("Success! : "+response);
					        	else
					        	$('#code').html("error occured in db operations");
					        },
					        error: function(jqXHR, textStatus, errorThrown) {
					           $('#code').html(textStatus, errorThrown);
					        }
				    	});
                        $('#preview').css('display','none');
                        scanner.stop();
                    });
                    Instascan.Camera.getCameras().then(function (cameras) {
                        console.log(cameras);
                        console.log(cameras.length);
                    if(cameras.length > 1){
                        scanner.start(cameras[1]);
                    }
                    else if(cameras.length > 0){
                        scanner.start(cameras[0]);
                    }
                    else {
                        alert('No cameras found.');
                    }
                    }).catch(function (e) {
                    console.error(e);
                    });
                } else {
                    alert("Please select Product for scan.");
                    return false;
                }
            });

            $('#confirm').on('click',function(){         	
            	if(code == undefined){
            		$('#code').html("No scan found!!");
            	}
            	else{            		
            		//call a file here.
		        	if(code!="" && code!=undefined){
						$.ajax({
					        url: "insertqr.php",
					        type: "POST",
					        data: {'qrcode':code,'invoiceid':invoiceid},
					        success: function (response) {
					        	if(response)
					        	$('#code').html("Success!");
					        	else
					        	$('#code').html("error occured in db operations");
					        },
					        error: function(jqXHR, textStatus, errorThrown) {
					           $('#code').html(textStatus, errorThrown);
					        }
				    	});
					}
            	}
            });

            //cancel button 
             $('#cancel').on('click',function(){
             	scanner.stop();
             });
        }) ; 
	</script>
	<title>
		scan your QR
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
          GROUP BY p.name, pg.id  
          ORDER BY p.name ASC";
    $result = $db->query($sql);
    $num = $result->num_rows;
    echo "<h4>Product Scan </h4>";
    echo "<table border='1'><tr><th>Select Product</th><th>Product Name</th></tr>";
    if($num > 0) {
        while ($row = $db->fetchByAssoc($result)) {
            
            $select = "select * from aos_products_fyn_qr_code_boxes_1_c where aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$row['id']."'";            
            //$products[$row['name']] =  $products[$row['name']] + (int)$row['product_qty'];
            for($i = 1; $i <= (int)$row['product_qty']; $i++) {
                echo "<tr><td><input type='radio' name = 'selectProduct' value='".$row['product_id']."'></td><td>".$row['name']."</td></tr>";
            }
        }
    }
    echo "</table><br><br><br>";
                
                print_r($products);
    ?>
	<div class="centered">
            <input type="button" value="Scan" class="button" id="butt"/>
            <input type="button" value="Cancel" class="button" id="cancel"/>
            <input type="button" value="Confirm" class="button" id="confirm"/>
	</div>
	<table>
            <tr>
                <td id="codeName">Code is : </td>
                <td id="code">
                </td>
            </tr>
	</table>
	<div>
	  <video id="preview" class="scanner"></video>
	</div>
    
    
    
    
    
</body>
</html>