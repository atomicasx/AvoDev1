<?php
//account_status
$dictionary['Account']['fields']['account_status'] = array(
	  'required' => false,
      'name' => 'account_status',
      'vname' => 'LBL_ACCOUNT_STATUS',
      'type' => 'enum',
      'default' => 'Active',
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
      'options' => 'account_status_list',
);
?>