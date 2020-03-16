<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
class kms_invoice_paymentsViewEdit extends ViewEdit
{
    public function __construct()
    {
        parent::__construct();
    }
     public function display()
    {
		
		if($_REQUEST['invoices_id']){
			$InvBean = BeanFactory::getBean('AOS_Invoices',$_REQUEST['invoices_id']);
			$this->bean->name = $InvBean->number;
			$this->bean->aos_invoices_name = $InvBean->name;
			$this->bean->aos_invoices_id = $InvBean->id;
			$this->bean->amount = $InvBean->total_amount;
			$this->ss->assign('IS_POPUP','1');
		}else{
			$this->ss->assign('IS_POPUP','0');
		}
        parent::display();
    }
}
?>