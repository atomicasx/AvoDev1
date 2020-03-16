<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#InvTable').DataTable();
} );
</script>
<?php
//getBalanceInvoices

global $db;
$account_id = $_REQUEST['account_id'];
// $sql = "SELECT id,name FROM aos_invoices WHERE deleted=0 AND status='Delivered' AND balance_amount > 0 AND billing_account_id='$account_id'";
$sql = "SELECT id,name,number,amount_balance,amount_received,total_amount FROM aos_invoices LEFT JOIN aos_invoices_cstm ON aos_invoices_cstm.id_c = aos_invoices.id  WHERE deleted=0 AND approval_status_c = 'Delivered' AND status IN('Unpaid','Partially Paid') AND billing_account_id='$account_id'";
// $sql = "SELECT id,name FROM aos_invoices WHERE deleted=1 AND balance_amount > 0 AND billing_account_id='$account_id'";
echo '<h2>Balance Invoices</h2>' ;
$result = $db->query($sql);
	// echo '<pre>';
	// print_r($result);
	// die();
$html = '<table id="InvTable" class="display" style="width:100%">
			<tr>
				<th>Number</th>
				<th>Invoices with Balance</th>
				<th>Total Amount</th>
				<th>Total Paid</th>
				<th>Balance</th>
			</tr>';
while($row = $db->fetchByAssoc($result)){
	
	$html .= '<tr><td>'.$row['number'].'</td>'; 
	$html .= '<td><a href="index.php?module=AOS_Invoices&action=DetailView&record="'.$row['id'].' target="_blank">'.$row['name'].'</a></td>'; 
	$html .= '<td>$'.round($row['total_amount'],2).'</td>';
	$html .= '<td>$'.round($row['amount_received'],2).'</td>';
	$html .= '<td>$'.round($row['amount_balance'],2).'</td>';
	$html .= '</tr>';
// round(4.96754,2)	
}
$html .= '</table>';	
/* $result = $db->query($sql);
while($row = $db->fecthByAssoc($result)){
	echo '<pre>';
	print_r($row);
	die();
} */

echo $html;

?>
