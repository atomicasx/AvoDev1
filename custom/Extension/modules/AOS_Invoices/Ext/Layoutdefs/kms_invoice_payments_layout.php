<?php
$layout_defs['AOS_Invoices']['subpanel_setup']['kms_invoice_payments'] = array(
'order' => 10,
'sort_by' => 'date_entered',
'sort_order' => 'desc',
'module' => 'kms_invoice_payments',
'refresh_page'=>1,
'subpanel_name' => 'default',
'get_subpanel_data' => 'kms_invoice_payments',
'title_key' => 'LBL_KMS_INVOICE_PAYMENTS',
'top_buttons' => array(
			array('widget_class' => 'SubPanelTopButtonQuickCreate'),
//			array('widget_class' => 'SubPanelTopSelectButton'),
 		),
);

?>
