<?php
    //require_once('include/MVC/View/views/view.list.php');
    class AOS_InvoicesViewinvoices extends ViewList {
        public function display() {
            global $sugar_config;
            global $db;
			
			$date = date('Y-m-d');
			$routeBeans =  BeanFactory::getBean("fyn_routes", $_REQUEST['route']);
			
			// $sql = "select * from aos_invoices inner join aos_invoices_cstm on aos_invoices.id = aos_invoices_cstm.id_c where aos_invoices.deleted = '0' and aos_invoices_cstm.addr_status_c = 'verified' and approval_status_c = 'Processed' and date(invoice_date) = '$date'";
			if($routeBeans->invoice_due_date){
				$inv_date = date('Y-m-d',strtotime($routeBeans->invoice_due_date));
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
			
            $res = $db->query($sql);
			
            $numRows = $res->num_rows;
            ?>
            <form name="frmInvoices" method="POST" action="index.php?entryPoint=saveInvoiceRoute">
				<table class="table">
					<thead>
						<tr>
							<th>Select</th>
							<th>Num</th>
							<th>Title</th>
							<th>Customer</th>
							<th>Grand Total</th>
							<th>Payment Status</th>
							<th>Date Created</th>
							<th>Invoice Date</th>
							<th>Due Date</th>
						</tr>
					</thead>
					<?php
					if($numRows > 0) {
					?>
					<tbody>
						<?php
							while($row = $db->fetchByAssoc($res)) {
								$InvBeans =  BeanFactory::getBean("AOS_Invoices", $row['id']);
								/* echo '<pre>';
								print_r($InvBeans);
								die(); */
							?>
								<tr>
									<td><input type="checkbox" name="selectInvoice[]" value="<?php echo $row['id'];?>"></td>
									<td><?php echo $InvBeans->number;?></td>
									<td><?php echo $InvBeans->name;?></td>
									<td><?php echo $InvBeans->billing_account;?></td>
									<td><?php echo number_format($InvBeans->total_amount,2);?></td>
									<td><?php echo $InvBeans->status;?></td>
									<td><?php echo $InvBeans->date_entered;?></td>
									<td><?php echo $InvBeans->invoice_date;?></td>
									<td><?php echo $InvBeans->due_dates_c;?></td>
								</tr>
							<?php
							}
						?>
					</tbody>
				</table>
				<input type="hidden" name="routeId" value="<?php echo $_GET['route'];?>"> 
				<input type="submit" name="submit" value="Submit">
            </form>
                <?php
            }
    }
    
    }
?>