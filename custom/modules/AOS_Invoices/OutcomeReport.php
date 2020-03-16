<?php
/* 
Total Invoices for the "date" 
Total Sales Amount
Total Collected Amount
Total Uncollected Amount 
 */

global $db, $current_user;
if(!$current_user->is_admin){
	die('You do not have Access to This Area. Please Contact Administrator!');
}
$type = 'today';

if(isset($_REQUEST['filter']) && $_REQUEST['filter']){
	$type = $_REQUEST['filter'];
}
$OutcomeReport = array();

$lable = array(
	'today' => 'Current Date Outcome Report',
	'month' => 'Current Month Outcome Report',
	'year' => 'Current Year Outcome Report',
	'last30days' => 'Last 30 Days Outcome Report',
	'date' => '',
);

if($type == 'today'){
	$CurrentDate = array(
		'Total Invoices' => 0,
		'Total Sales Amount' => 0.00,
		'Total Collected Amount' => 0.00,
		'Total Uncollected Amount' => 0.00,
	);
	$sql_i = "SELECT count(*) total_invoices,FORMAT(SUM(IFNULL(total_amount,0)),2) total_sale_amount 
			FROM aos_invoices WHERE deleted=0 AND invoice_date = CURDATE() HAVING count(*) > 0";
	$result_i = $db->query($sql_i);
	if($result_i->num_rows > 0){
		$row_i = $db->fetchByAssoc($result_i);
		$CurrentDate['Total Invoices'] = $row_i['total_invoices'];
		$CurrentDate['Total Sales Amount'] = $row_i['total_sale_amount'];
	}
	$sql_p = "SELECT SUM(IFNULL(amount_received,0)) Collected, 
				SUM(IFNULL(amount,0)-IFNULL(amount_received,0)) Uncollected  
				FROM kms_invoice_payments 
				WHERE deleted=0 AND date_recieved = CURDATE()
				HAVING count(*) > 0";
	$result_p = $db->query($sql_p);

	if($result_p->num_rows > 0){
		$row_p = $db->fetchByAssoc($result_p);
		$CurrentDate['Total Collected Amount'] = $row_p['Collected'];
		$CurrentDate['Total Uncollected Amount'] = $row_p['Uncollected'];
	}
	$OutcomeReport = $CurrentDate;
}
if($type == 'month'){
	$CurrentMonth = array(
		'Total Invoices' => 0,
		'Total Sales Amount' => 0.00,
		'Total Collected Amount' => 0.00,
		'Total Uncollected Amount' => 0.00,
	);
	$sql_i = "SELECT count(*) total_invoices,FORMAT(SUM(IFNULL(total_amount,0)),2) total_sale_amount 
				FROM aos_invoices WHERE deleted=0 AND year(invoice_date) = year(CURDATE()) 
				AND month(invoice_date) = month(CURDATE()) HAVING count(*) > 0";
	$result_i = $db->query($sql_i);
	if($result_i->num_rows > 0){
		$row_i = $db->fetchByAssoc($result_i);
		$CurrentMonth['Total Invoices'] = $row_i['total_invoices'];
		$CurrentMonth['Total Sales Amount'] = $row_i['total_sale_amount'];
	}
	$sql_p = "SELECT SUM(amount_received) Collected, SUM(amount-amount_received) Uncollected  
				FROM kms_invoice_payments WHERE deleted=0 AND year(date_recieved) = year(CURDATE())
				AND month(date_recieved) = month(CURDATE()) 
				HAVING count(*) > 0";
	$result_p = $db->query($sql_p);
	if($result_p->num_rows > 0){
		$row_p = $db->fetchByAssoc($result_p);
		$CurrentMonth['Total Collected Amount'] = $row_p['Collected'];
		$CurrentMonth['Total Uncollected Amount'] = $row_p['Uncollected'];
	}
	$OutcomeReport = $CurrentMonth;
}
if($type == 'last30days'){
	$Last30Days = array(
		'Total Invoices' => 0,
		'Total Sales Amount' => 0.00,
		'Total Collected Amount' => 0.00,
		'Total Uncollected Amount' => 0.00,
	);
	$sql_i = "SELECT count(*) total_invoices,FORMAT(SUM(IFNULL(total_amount,0)),2) total_sale_amount 
				FROM aos_invoices WHERE deleted=0 AND  invoice_date >= DATE_SUB(CURDATE(),INTERVAL 30 DAY) AND invoice_date <= CURDATE() HAVING count(*) > 0";
	$result_i = $db->query($sql_i);
	// $row_i = $db->fetchByAssoc($result_i);
	if($result_i->num_rows > 0){
		$row_i = $db->fetchByAssoc($result_i);
		$Last30Days['Total Invoices'] = $row_i['total_invoices'];
		$Last30Days['Total Sales Amount'] = $row_i['total_sale_amount'];
	}
	$sql_p = "SELECT SUM(amount_received) Collected, SUM(amount-amount_received) Uncollected  
				FROM kms_invoice_payments WHERE deleted=0 AND  date_recieved >= DATE_SUB(CURDATE(),INTERVAL 30 DAY) AND date_recieved<=CURDATE()
				HAVING count(*) > 0";
	$result_p = $db->query($sql_p);

	if($result_p->num_rows > 0){
		$row_p = $db->fetchByAssoc($result_p);
		$Last30Days['Total Collected Amount'] = $row_p['Collected'];
		$Last30Days['Total Uncollected Amount'] = $row_p['Uncollected'];
	}
	$OutcomeReport = $Last30Days;
}
if($type == 'year'){
	$CurrentYear = array(
		'Total Invoices' => 0,
		'Total Sales Amount' => 0.00,
		'Total Collected Amount' => 0.00,
		'Total Uncollected Amount' => 0.00,
	);
	$sql_i = "SELECT count(*) total_invoices,FORMAT(SUM(IFNULL(total_amount,0)),2) total_sale_amount 
				FROM aos_invoices WHERE deleted=0 AND year(invoice_date) = year(CURDATE()) HAVING count(*) > 0";
	$result_i = $db->query($sql_i);
	// $row_i = $db->fetchByAssoc($result_i);
	if($result_i->num_rows > 0){
		$row_i = $db->fetchByAssoc($result_i);
		$CurrentYear['Total Invoices'] = $row_i['total_invoices'];
		$CurrentYear['Total Sales Amount'] = $row_i['total_sale_amount'];
	}

	$sql_p = "SELECT SUM(amount_received) Collected, SUM(amount-amount_received) Uncollected  
				FROM kms_invoice_payments WHERE deleted=0 AND year(date_recieved) = year(CURDATE())
				HAVING count(*) > 0";
	$result_p = $db->query($sql_p);
	// $row_p = $db->fetchByAssoc($result_p);
	if($result_p->num_rows > 0){
		$row_p = $db->fetchByAssoc($result_p);
		$CurrentYear['Total Collected Amount'] = $row_p['Collected'];
		$CurrentYear['Total Uncollected Amount'] = $row_p['Uncollected'];
	}
	$OutcomeReport = $CurrentYear;
}
if($type == 'date'){
	$start_date = $_REQUEST['start_date'];
	$end_date = $_REQUEST['end_date'];
	$DateRange = array(
		'Total Invoices' => 0,
		'Total Sales Amount' => 0.00,
		'Total Collected Amount' => 0.00,
		'Total Uncollected Amount' => 0.00,
	);
	$sql_i = "SELECT count(*) total_invoices,FORMAT(SUM(IFNULL(total_amount,0)),2) total_sale_amount 
				FROM aos_invoices WHERE deleted=0 AND DATE(invoice_date) >= '$start_date' AND DATE(invoice_date) <= '$end_date' HAVING count(*) > 0";
	$result_i = $db->query($sql_i);
	// $row_i = $db->fetchByAssoc($result_i);
	if($result_i->num_rows > 0){
		$row_i = $db->fetchByAssoc($result_i);
		$DateRange['Total Invoices'] = $row_i['total_invoices'];
		$DateRange['Total Sales Amount'] = $row_i['total_sale_amount'];
	}

	$sql_p = "SELECT SUM(amount_received) Collected, SUM(amount-amount_received) Uncollected  
				FROM kms_invoice_payments WHERE deleted=0 AND DATE(date_recieved) >= '$start_date' AND DATE(date_recieved) <= '$end_date'
				HAVING count(*) > 0";
	$result_p = $db->query($sql_p);
	// $row_p = $db->fetchByAssoc($result_p);
	if($result_p->num_rows > 0){
		$row_p = $db->fetchByAssoc($result_p);
		$DateRange['Total Collected Amount'] = $row_p['Collected'];
		$DateRange['Total Uncollected Amount'] = $row_p['Uncollected'];
	}
	$OutcomeReport = $DateRange;
	$lable['date'] = 'Outcome Between : '.$start_date . ' AND ' . $end_date;
}

/* $OutcomeReport['CurrentDate'] = $CurrentDate;
$OutcomeReport['CurrentMonth'] = $CurrentMonth;
$OutcomeReport['Last30Days'] = $Last30Days;
$OutcomeReport['CurrentYear'] = $CurrentYear; */

/* echo '<pre>';
print_r($OutcomeReport);
die(); */

?>
<!--
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css
">
-->
<style>
.myheding {
	border-right:none !important;
	background:linear-gradient(to bottom, #777777 0%, #494949 100%) repeat scroll 0 0 transparent;
	color: #FFFFFF;
	text-align:left;
	height: 52px;
	padding-left: 10px; 
	text-align: left;
	font-size: large;
}
</style>
<script>
function ShowReport(type){
	if(type=='today'){
		location.href = 'index.php?module=AOS_Invoices&action=OutcomeReport&filter=today';
	}else if(type=='month'){
		location.href = 'index.php?module=AOS_Invoices&action=OutcomeReport&filter=month';
	}else if(type=='year'){
		location.href = 'index.php?module=AOS_Invoices&action=OutcomeReport&filter=year';
	}else if(type=='last30days'){
		location.href = 'index.php?module=AOS_Invoices&action=OutcomeReport&filter=last30days';
	}else if(type=='date'){
		var start_date = $('#start_date').val();
		var end_date = $('#end_date').val();
		if(start_date == '' || end_date == ''){
			alert('Please Select Start and Date');
		}else{
			location.href = 'index.php?module=AOS_Invoices&action=OutcomeReport&filter=date&start_date='+start_date+'&end_date='+end_date;
		}
	}
}
</script>
<div class="main">
	<div class="row myheding">
		<div class="col-md-12">
            <div class="card border-info mx-sm-1 p-3">
                <h3><?php echo $lable[$type]; ?></h3>
            </div>
        </div>
	</div>
	<div class="row">
		<div>Filters:</div >
		<div class="col-md-12" style="padding-top: 8px;display: flex;">
            <div>
                <input type="button" value="Today" onclick="ShowReport('today');">
            </div>
            <div>
                <input type="button" value="Current Month" onclick="ShowReport('month')">
            </div>
            <div>
                <input type="button" value="Last 30 Days" onclick="ShowReport('last30days')">
            </div>
            <div>
                <input type="button" value="Current Year" onclick="ShowReport('year')">
            </div>
            <div>
                Start Date: <input type="date" id="start_date" name="start_date"> End Date: <input type="date" id="end_date" name="end_date">
            </div>
			<div>
                <input type="button" value="Submit" onclick="ShowReport('date');">
            </div>
        </div>
	</div>
	<div class="row w-100">
        <div class="col-md-3">
            <div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-car" aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3"><h4>Total Invoices</h4></div>
                <div class="text-info text-center mt-2"><h1><?php echo $OutcomeReport['Total Invoices'];?></h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>Total Sales Amount</h4></div>
                <div class="text-success text-center mt-2"><h1>$<?php echo $OutcomeReport['Total Sales Amount'];?></h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-heart" aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3"><h4>Total Collected Amount</h4></div>
                <div class="text-danger text-center mt-2"><h1>$<?php echo $OutcomeReport['Total Collected Amount'];?></h1></div>
            </div>
        </div>
        <div class="col-md-3"> 
            <div class="card border-warning mx-sm-1 p-3">
                <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div>
                <div class="text-warning text-center mt-3"><h4>Total Uncollected Amount</h4></div>
                <div class="text-warning text-center mt-2"><h1>$<?php echo $OutcomeReport['Total Uncollected Amount'];?></h1></div>
            </div>
        </div>
     </div>
</div>