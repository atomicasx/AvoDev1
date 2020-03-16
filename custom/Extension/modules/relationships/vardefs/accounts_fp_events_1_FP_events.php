<?php
// created: 2019-06-11 16:01:44
$dictionary["FP_events"]["fields"]["accounts_fp_events_1"] = array (
  'name' => 'accounts_fp_events_1',
  'type' => 'link',
  'relationship' => 'accounts_fp_events_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_ACCOUNTS_FP_EVENTS_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_fp_events_1accounts_ida',
);
$dictionary["FP_events"]["fields"]["accounts_fp_events_1_name"] = array (
  'name' => 'accounts_fp_events_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_FP_EVENTS_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_fp_events_1accounts_ida',
  'link' => 'accounts_fp_events_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["FP_events"]["fields"]["accounts_fp_events_1accounts_ida"] = array (
  'name' => 'accounts_fp_events_1accounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_fp_events_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_FP_EVENTS_1_FROM_FP_EVENTS_TITLE',
);
