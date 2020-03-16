<?php
    //require_once('include/MVC/View/views/view.list.php');
    class AOS_InvoicesViewinvoices extends ViewList {
        public function display() {
            global $sugar_config;
            global $db;
            $date = date('Y-m-d');
            // $sql = "select * from aos_invoices inner join aos_invoices_cstm on aos_invoices.id = aos_invoices_cstm.id_c where aos_invoices.deleted = '0' and aos_invoices_cstm.addr_status_c = 'verified' and approval_status_c = 'Processed' and date(invoice_date) = '$date'";
            $sql = "select * from aos_invoices inner join aos_invoices_cstm on aos_invoices.id = aos_invoices_cstm.id_c where aos_invoices.deleted = '0' and aos_invoices_cstm.addr_status_c = 'verified' and approval_status_c = 'Processed'";

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
                    </tr>
                </thead>
            <?php
            if($numRows > 0) {
                ?>
                <tbody>
                    <?php
                while($row = $db->fetchByAssoc($res)) {
					$InvBeans =  BeanFactory::getBean("AOS_Invoices", $row['id']);
					echo '<pre>';
					print_r($InvBeans);
					die();
                    ?>
                    <tr>
                        <td><input type="checkbox" name="selectInvoice[]" value="<?php echo $row['id'];?>"></td>
                        <td><?php echo $row['number'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php
                            $getAccountBeans =  BeanFactory::getBean("Accounts", $row['billing_account_id']);

                            echo $getAccountBeans->name;                        

                        ?></td>
                        <td><?php echo $row['total_amount'];?></td>
                        <td><?php echo $row['status'];?></td>
                        <td><?php echo $row['date_entered'];?></td>
                        <td><?php echo $row['invoice_date'];?></td>
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