<?php
class InvoicePaymentHook{
	function BeforeSaveFunction($bean, $event, $arguments){
		if($bean->aos_invoices_id){
			$invBean = BeanFactory::getBean('AOS_Invoices',$bean->aos_invoices_id);
			//billing_account
			$bean->customer_name = $invBean->billing_account;
			$bean->account_id = $invBean->billing_account_id;
		}
	}
	function UpdateInvoiceStatus($bean, $event, $arguments){
		$url = "index.php?module=kms_invoice_payments&action=DetailView&record=$bean->id";
		$module = "kms_invoice_payments";
		if($bean->aos_invoices_id && $bean->amount_received){			
			global $db;
			$sql1 = "SELECT SUM(amount_received) as amount_received FROM kms_invoice_payments WHERE deleted=0 AND aos_invoices_id='$bean->aos_invoices_id'";
			$result1 = $db->query($sql1);
			$row1 = $db->fetchByAssoc($result1);
			$amount_received = $row1['amount_received'];
			
			if($bean->amount_received < $bean->amount ){
				$sql = "UPDATE aos_invoices SET 
							amount_received='$amount_received', 
							amount_balance= (total_amount - $amount_received),
							payment_type='$bean->payment_type',
							status='Partially Paid' 
						WHERE id='$bean->aos_invoices_id'";
			}else{
				$sql = "UPDATE aos_invoices SET 
							amount_received='$amount_received',
							amount_balance= (total_amount - $amount_received),
							payment_type='$bean->payment_type',
							status='Paid' 
						WHERE id='$bean->aos_invoices_id'";
			}
			$db->query($sql,true);
			$url = "index.php?module=AOS_Invoices&action=DetailView&record=$bean->aos_invoices_id";
			$module = "AOS_Invoices";
		}
		//get all Users except Drivers
		$users = getAllUsersExceptDrivers();
		// CreateNotification($module,$user,$url,$msg);
		foreach($users as $user_id){
			$name = $bean->aos_invoices_name;
			$msg = "New Payment has been received!";
			CreateNotification($module,$user_id,$url,$name,$msg);
		}
	}
	function RecordActivity($bean, $event, $arguments){
		//$module,$related_id,$account_id,$name,$msg
		if(!$bean->fetched_row){
			$module = 'AOS_Invoices';
			$related_id = $bean->aos_invoices_id;
			$account_id = $bean->account_id;
			$name = 'New';
			$msg = 'Added New Payment';
			CreateTimeLineActivity($module,$related_id,$account_id,$name,$msg);
		}
	}
}

?>