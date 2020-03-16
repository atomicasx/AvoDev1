<?php
//payment_type
$dictionary["AOS_Invoices"]["fields"]["payment_type"] = array (
	'required' => false,
	'name' => 'payment_type',
	'vname' => 'LBL_PAYMENT_TYPE',
	'type' => 'enum',
	'massupdate' => 0,
	'no_default' => false,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => true,
	'inline_edit' => true,
	'reportable' => true,
	'unified_search' => false,
	'merge_filter' => 'disabled',
	'len' => 100,
	'size' => '20',
	'options' => 'invoice_payment_type_dom',
	'studio' => 'visible',
	'dependency' => false,
);
?>