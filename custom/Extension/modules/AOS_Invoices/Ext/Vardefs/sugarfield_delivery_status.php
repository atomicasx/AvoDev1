<?php
//delivery_status
$dictionary['AOS_Invoices']['fields']['delivery_status'] = array(
	  'required' => false,
      'name' => 'delivery_status',
      'vname' => 'LBL_DELIVERY_STATUS',
      'type' => 'enum',
      'default' => '',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => 'delivery_status_list',
);
?>