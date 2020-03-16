<?php
global $db;
$invoice_id = $_REQUEST['invoice_id'];
$delivery_status = $_REQUEST['deliveryStatus'];
$sql = "UPDATE aos_invoices set delivery_status='$delivery_status' where deleted=0 AND id='$invoice_id'";
$result = $db->query($sql);
if($result)
{
    echo 1;    
}
else {
    echo 0;
}
?>