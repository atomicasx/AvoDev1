<?php
$qrcode = $_POST['qrcode'];
$productid = $_POST['productid'];
$invoiceid = $_POST['invoiceid'];
define('sugarEntry', TRUE); 
ini_set('max_execution_time', 0);
include_once('include/entryPoint.php');
global $db;
global $current_user;

// $accountbean = BeanFactory::getBean('Accounts', $accountid);
// $annaulrevenue = $accountbean->annual_revenue;
$sql = "select fyn_qr_code_boxes.name as qrname, fyn_qr_code_boxes_cstm.aos_invoices_id_c, fyn_qr_code_boxes.id, fyn_qr_code_boxes.name from "
        . "fyn_qr_code_boxes "
            . "inner join aos_products_fyn_qr_code_boxes_1_c on aos_products_fyn_qr_code_boxes_1_c.aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = fyn_qr_code_boxes.id"
        . " left join  fyn_qr_code_boxes_cstm on fyn_qr_code_boxes.id = fyn_qr_code_boxes_cstm.id_c "
        . " where fyn_qr_code_boxes.name='$qrcode' AND fyn_qr_code_boxes.deleted='0' and aos_products_fyn_qr_code_boxes_1_c.aos_products_fyn_qr_code_boxes_1aos_products_ida='$productid' and aos_products_fyn_qr_code_boxes_1_c.deleted='0'";
//echo $sql;
$result = $db->query($sql);
$num = $result->num_rows;


$sqlDriver = "select driver from route_invoice_driver where invoice = '$invoiceid'";
$resultDriver = $db->query($sqlDriver);
$rowDriver = $db->fetchByAssoc($resultDriver);

$driverId = $rowDriver['driver'];

//echo $sql;
if($num > 0) {
    while ($row = $db->fetchByAssoc($result)) {
        if($row['aos_invoices_id_c'] == ""){
            //$update = "update fyn_qr_code_boxes_cstm set aos_invoices_id_c = '$invoiceid' where id_c = '".$row['id']."'";
            
    
    $resDriverStock = $db->query("select prodr_product_driver_stock_cstm.id_c as driverid, prodr_product_driver_stock_cstm.stock_c as productDriverStock from prodr_product_driver_stock 
        inner join prodr_product_driver_stock_cstm on prodr_product_driver_stock.id = prodr_product_driver_stock_cstm.id_c 
        inner join users on users.id = prodr_product_driver_stock_cstm.user_id_c 
        inner join aos_products on aos_products.id = prodr_product_driver_stock_cstm.aos_products_id_c
        where aos_products.id='".$productid."' and prodr_product_driver_stock_cstm.user_id_c='$driverId'");
    $rowDriverStock = $db->fetchByAssoc($resDriverStock);
    $no_of_recordDriver = $resDriverStock->num_rows;
    
    if($no_of_recordDriver > 0 && $rowDriverStock['productDriverStock'] > 0)
    {
          $driverStock = (int) $rowDriverStock['productDriverStock'];
          $driverStock = $driverStock - 1;

          $updateProdDriverStock = "update prodr_product_driver_stock_cstm set stock_c = '".$driverStock."' where id_c ='".$rowDriverStock['driverid']."'";         
         
          $db->query($updateProdDriverStock);

          $updateWareHouseStock = "update aos_products_cstm set stockin_c = stockin_c-1, invoice_stock_c = invoice_stock_c-1 where id_c ='".$productid."'";
          $db->query($updateWareHouseStock);
          
    } else {
            $updateWareHouseStock = "update aos_products_cstm set stockin_c = stockin_c-1, invoice_stock_c = invoice_stock_c-1 where id_c ='".$productid."'";
          $db->query($updateWareHouseStock);
    }

            $sqlCheckQR = "select * from fyn_qr_code_boxes inner join fyn_qr_code_boxes_cstm on fyn_qr_code_boxes.id = fyn_qr_code_boxes_cstm.id_c where fyn_qr_code_boxes.id = '".$row['id']."'";

            $resultCheckQR = $db->query($sqlCheckQR);
            if ($resultCheckQR->num_rows>0){
                $updateCheckQR = "update fyn_qr_code_boxes_cstm set aos_invoices_id_c = '".$invoiceid."', user_id_c = '".$driverId."' where id_c = '".$row['id']."'";
                $db->query($updateCheckQR);
            } else {
                $insertCheckQR = "insert into fyn_qr_code_boxes_cstm (id_c, user_id_c, aos_invoices_id_c) VALUES ('".$row['id']."', '".$driverId."', '".$invoiceid."')";
                $db->query($insertCheckQR);
            }
            
            
            /*$updateSql = "update fyn_qr_code_boxes_cstm set user_id_c = '$driverId', aos_invoices_id_c = '$invoiceid' where id_c = '".$row['id']."'";
            echo $updateSql;
            $db->query($updateSql);*/
            //echo $update;
            //$db->query($update);
            echo "QR updated with invoice successfully for product";
        } else {
            echo "ALL QR Occupied ERROR : ALL QR Occupied for product";
        }
    }
} else {
    echo "ERROR : QR not updated with invoice successfully for product";
}
?>