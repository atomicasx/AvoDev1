<?php
$digitalsign = $_POST['digitalsign'];
$invoiceid = $_POST['invoiceid'];
$print_name_c = $_POST['print_name_c'];
$payment_confirm_c = $_POST['payment_confirm_c'];
$sig_type = $_POST['sig_type'];
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
if($sig_type == 'confirm'){
$sql = "update aos_invoices_cstm set signature_c = '$digitalsign', print_name_c = '$print_name_c', payment_confirm_c = '$payment_confirm_c', approval_status_c='Delivered' where id_c = '$invoiceid'";
$result = $db->query($sql);
}else if($sig_type == 'cancel'){
	$sql = "update aos_invoices_cstm set signature_c = '$digitalsign', print_name_c = '$print_name_c', approval_status_c='Canceled' where id_c = '$invoiceid'";
	$result = $db->query($sql);
}else{
	echo 0;
}
if($result)
{
    echo 1;
    
}
else {
    echo 0;
}
?>