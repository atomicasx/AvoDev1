<?php
  
define('sugarEntry', TRUE); 
ini_set('max_execution_time', 0);
error_reporting(E_ERROR);
ini_set('display_errors', 1);
include_once('include/entryPoint.php');
global $db;
global $current_user;
$invoices = explode(",", $_POST[$_POST['driverForReport']]);

$invoices = implode("','", $invoices);


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
                //echo $sql;exit;
                $products = [];
                while ($row = $db->fetchByAssoc($result)) {
                  $products[$row['name']] =  $products[$row['name']] + (int)$row['product_qty'];

                }
                //echo $sql;
                //echo "<br>";
               //print_r($_REQUEST);exit;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Product Report</title>
    <style>


        .sometext{
      display:inline;
      height: 10%;
      width:100%;
      text-align: center;
      /*padding:3%;*/
      }

      .sawtable{
      display:block;
      height: 40%;
      width:100%;
      /*padding:3%;*/
      margin-top: 10%;
      text-align: center;
      }

      .segment{
      display:block;
      height: 10%;
      width:100%;
      padding:3%;
      }
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        display:inline;
        position:relative;
        height: 50%;
        float: left;
        width: 100%;
      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
        height:auto;
        margin-top: 10px;
        background-color: #FFEE77;
        /*padding: 10px;*/
        /*overflow: scroll;*/
      }
    </style>    
  </head>
  <body>
        <button id="printbtn" onclick="document.getElementById('printbtn').style.display='none';window.print();">Print this page</button>
      <div class="sometext">
        <p>
            
            <h1 style="align:center">Product Report for <?php echo $_REQUEST['driverNameForReport'];?> <br> Generated by : <b><u> <?php echo $_REQUEST['userName'];?> </u></b> on <b><u> <?php echo date("d/m/Y h:i:sa"); ?> </u></b> 
        </p>
      </div>
      <div>
        
        <table class=""  style="text-align:center;width:100%;" border="2">
          <tr>
            <th> Product Name </th>
            <th> Total QTY  </th>            
          </tr>
          <?php
            if(count($products) > 0) {
                foreach($products as $key => $product) {
                  ?>
                  <tr>
                        <td><?php echo $key;?></td>
                        <td><?php echo $product;?></td>
                  </tr>
                  <?php
                }
            }
          ?>

        </table>
      </div>
      <!-- <div class="segment"> -->
    
    
  </body>
</html>