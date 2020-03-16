<?php
$qrcode = $_POST['qrcode'];
$invoiceid = $_POST['invoiceid'];
$servername = "localhost";
$username = "root";
$password = "S2nZ@fyR7#";
$dbname = "avocado";
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conn = new mysqli($servername, $username, $password, $dbname);

// $accountbean = BeanFactory::getBean('Accounts', $accountid);
// $annaulrevenue = $accountbean->annual_revenue;
$sql = "select id,name from fyn_qr_code_boxes where name='$qrcode' AND deleted='0'";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
$qrboxid = $row['id'];
$qrboxname = $row['name'];
$sqluuid = "select UUID()";
$resuuid = $conn->query($sqluuid);
$rowuuid = $resuuid->fetch_assoc();
$uuid = $rowuuid['UUID()'];
$sqlvehstout = "insert into `vs_vehiclestockout` set id='$uuid', name=CONCAT('VST_OUT_',NOW()), date_entered=NOW(), date_modified=NOW(), destination='Order'";
if($resvehstout = $conn->query($sqlvehstout)){
	$sqlvehstoutcstm = "insert into `vs_vehiclestockout_cstm` set id_c='$uuid', do_not_delete_c='1', fyn_vehicle_id_c='bb277b35-a573-5f07-8587-5c08be2f387c'";
	$resvehstoutcstm = $conn->query($sqlvehstoutcstm);
	$sqlinvsubpanel = "insert into `aos_invoices_vs_vehiclestockout_1_c` set id=UUID(), date_modified=NOW(), deleted='0', aos_invoices_vs_vehiclestockout_1aos_invoices_ida='$invoiceid', aos_invoices_vs_vehiclestockout_1vs_vehiclestockout_idb='$uuid'";
	$resinvsubpanel = $conn->query($sqlinvsubpanel);
	echo '1';
}
else{
	echo '0';
}

?>