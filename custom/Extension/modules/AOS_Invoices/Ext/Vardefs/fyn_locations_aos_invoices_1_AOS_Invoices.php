<?php
// created: 2018-12-01 15:02:29
$dictionary["AOS_Invoices"]["fields"]["fyn_locations_aos_invoices_1"] = array (
  'name' => 'fyn_locations_aos_invoices_1',
  'type' => 'link',
  'relationship' => 'fyn_locations_aos_invoices_1',
  'source' => 'non-db',
  'module' => 'fyn_locations',
  'bean_name' => 'fyn_locations',
  'vname' => 'LBL_FYN_LOCATIONS_AOS_INVOICES_1_FROM_FYN_LOCATIONS_TITLE',
  'id_name' => 'fyn_locations_aos_invoices_1fyn_locations_ida',
);
$dictionary["AOS_Invoices"]["fields"]["fyn_locations_aos_invoices_1_name"] = array (
  'name' => 'fyn_locations_aos_invoices_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FYN_LOCATIONS_AOS_INVOICES_1_FROM_FYN_LOCATIONS_TITLE',
  'save' => true,
  'id_name' => 'fyn_locations_aos_invoices_1fyn_locations_ida',
  'link' => 'fyn_locations_aos_invoices_1',
  'table' => 'fyn_locations',
  'module' => 'fyn_locations',
  'rname' => 'name',
);
$dictionary["AOS_Invoices"]["fields"]["fyn_locations_aos_invoices_1fyn_locations_ida"] = array (
  'name' => 'fyn_locations_aos_invoices_1fyn_locations_ida',
  'type' => 'link',
  'relationship' => 'fyn_locations_aos_invoices_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FYN_LOCATIONS_AOS_INVOICES_1_FROM_AOS_INVOICES_TITLE',
);
