<?php
$layout_defs['AOS_Invoices']['subpanel_setup']['notes'] = array(
	'order' => 8,
	'sort_by' => 'date_entered',
	'sort_order' => 'desc',
	'module' => 'Notes',
	'refresh_page'=>1,
	'subpanel_name' => 'default',
	'get_subpanel_data' => 'notes',
	'title_key' => 'LBL_NOTES',
	'top_buttons' => array(
			array('widget_class' => 'SubPanelTopButtonQuickCreate'),
//			array('widget_class' => 'SubPanelTopSelectButton'),
 		),
);

?>
