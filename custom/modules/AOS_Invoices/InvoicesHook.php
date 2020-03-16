<?php
class InvoicesHook{
	function BeforeSaveCustomFunction($bean, $event, $arguments){
		if(!$bean->fetched_row){
			$bean->amount_balance = $bean->total_amount;
		}
		if(!$bean->due_dates_c){
			$bean->due_dates_c = $bean->invoice_date;
		}else if($bean->fetched_row['invoice_date'] != $bean->invoice_date){
			$bean->due_dates_c = $bean->invoice_date;
		}
		
	}
	
	function addToRouting($bean, $event, $arguments){
		/* $bean->addr_status_c = 'verified' ;
		$bean->approval_status_c = 'Processed' ;
		$bean->invoice_date = 'CURRENTDATE' ;
		$bean->fyn_routes_aos_invoices_1fyn_routes_ida = 'Routing ID' ; */
		
		global $db;
		$date1 = new DateTime("now");
		$date2 = new DateTime($bean->invoice_date);
		$today = $date1->format('Y-m-d');
		$inv_date = $date2->format('Y-m-d');
		if($bean->addr_status_c == 'verified' 
		   && $bean->approval_status_c == 'Processed' 
		   && !$bean->fyn_routes_aos_invoices_1fyn_routes_ida 
		   && $inv_date == $today)
		{
		
			$routsql = "SELECT id from fyn_routes where DATE(date_entered)= CURDATE() AND (invoice_due_date IS NULL OR invoice_due_date ='')";
			$result = $db->query($routsql);
			$row = $db->fetchByAssoc($result); 
			$rout_id = $row['id'] ;
			if($rout_id ){
				$rel_name = 'fyn_routes_aos_invoices_1';
				$bean->load_relationship($rel_name);
				$bean->fyn_routes_aos_invoices_1->add($rout_id);
				
				$updateInvoice = "update aos_invoices_cstm set approval_status_c = 'OnVehicle' where id_c = '". $bean->id ."'";
				$db->query($updateInvoice);
			}
		}
	}
	function RecordActivity($bean, $event, $arguments){
		//$module,$related_id,$account_id,$name,$msg
		if(!$bean->fetched_row){
			$module = 'AOS_Invoices';
			$related_id = $bean->id;
			$account_id = $bean->billing_account_id;
			$name = 'New';
			$msg = 'New Invoice Created';
			CreateTimeLineActivity($module,$related_id,$account_id,$name,$msg);
		}
	}
}

?>