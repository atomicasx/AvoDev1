<?php
$digitalsign = $_POST['digitalsign'];
$invoiceid = $_POST['invoiceid'];
$driver_print_name_c = $_POST['driver_print_name_c'];
define('sugarEntry', TRUE); 
    ini_set('max_execution_time', 0);
    error_reporting(E_ERROR);
    ini_set('display_errors', 1);
    include_once('include/entryPoint.php');
    global $db;
    global $current_user;

// $accountbean = BeanFactory::getBean('Accounts', $accountid);
// $annaulrevenue = $accountbean->annual_revenue;
// $sql = "update aos_invoices_cstm set signature_c = '$digitalsign', print_name_c = '$print_name_c' where id_c = '$invoiceid'";

$sql = "update aos_invoices_cstm set driver_signature_c = '$digitalsign', driver_print_name_c = '$driver_print_name_c' where id_c = '$invoiceid'";
$result = $db->query($sql);
if($result)
{
    echo 1;
    
}
else {
    echo 0;
}

?>