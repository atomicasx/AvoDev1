<?php
class RoutesHook{
	function AssociateInvoices($bean, $event, $arguments){
		global $db;
		/* If Routing Record is new we will execte this function to add Invoices to Route */
		if(!$bean->fetched_row){
			if($bean->invoice_due_date){
				$inv_date = date('Y-m-d',strtotime($bean->invoice_due_date));
				$sql = "SELECT id FROM aos_invoices INNER JOIN aos_invoices_cstm 
					ON aos_invoices.id = aos_invoices_cstm.id_c 
					WHERE aos_invoices.deleted = '0' 
						AND aos_invoices_cstm.addr_status_c = 'verified' 
						AND aos_invoices_cstm.approval_status_c = 'Processed' 
						AND date(invoice_date) = '$inv_date'";
			}else{           
				$sql = "SELECT id FROM aos_invoices INNER JOIN aos_invoices_cstm 
					ON aos_invoices.id = aos_invoices_cstm.id_c 
					WHERE aos_invoices.deleted = '0' 
						AND aos_invoices_cstm.addr_status_c = 'verified' 
						AND aos_invoices_cstm.approval_status_c = 'Processed' 
						AND(date(invoice_date) = CURDATE() 
							OR date(invoice_date)= DATE_ADD(CURDATE(),INTERVAL 1 DAY) 
							OR (date(invoice_date) < CURDATE())
						)";
			}
			$result = $db->query($sql);
			$invoices = array();
			while($row = $db->fetchByAssoc($result)){
				$invoices[] = $row['id'];
			}

			foreach($invoices as $invoice_id){
				$rel_name = 'fyn_routes_aos_invoices_1';
				$bean->load_relationship($rel_name);
				$bean->fyn_routes_aos_invoices_1->add($invoice_id);
				
				$updateInvoice = "update aos_invoices_cstm set approval_status_c = 'OnVehicle' where id_c = '".$invoice_id."'";
				$db->query($updateInvoice);
			}
		}
	}
}

?>