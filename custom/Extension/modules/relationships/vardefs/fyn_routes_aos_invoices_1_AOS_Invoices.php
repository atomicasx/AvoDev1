<?php
// created: 2018-12-01 17:02:43
$dictionary["AOS_Invoices"]["fields"]["fyn_routes_aos_invoices_1"] = array (
  'name' => 'fyn_routes_aos_invoices_1',
  'type' => 'link',
  'relationship' => 'fyn_routes_aos_invoices_1',
  'source' => 'non-db',
  'module' => 'fyn_routes',
  'bean_name' => 'fyn_routes',
  'vname' => 'LBL_FYN_ROUTES_AOS_INVOICES_1_FROM_FYN_ROUTES_TITLE',
  'id_name' => 'fyn_routes_aos_invoices_1fyn_routes_ida',
);
$dictionary["AOS_Invoices"]["fields"]["fyn_routes_aos_invoices_1_name"] = array (
  'name' => 'fyn_routes_aos_invoices_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FYN_ROUTES_AOS_INVOICES_1_FROM_FYN_ROUTES_TITLE',
  'save' => true,
  'id_name' => 'fyn_routes_aos_invoices_1fyn_routes_ida',
  'link' => 'fyn_routes_aos_invoices_1',
  'table' => 'fyn_routes',
  'module' => 'fyn_routes',
  'rname' => 'name',
);
$dictionary["AOS_Invoices"]["fields"]["fyn_routes_aos_invoices_1fyn_routes_ida"] = array (
  'name' => 'fyn_routes_aos_invoices_1fyn_routes_ida',
  'type' => 'link',
  'relationship' => 'fyn_routes_aos_invoices_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FYN_ROUTES_AOS_INVOICES_1_FROM_AOS_INVOICES_TITLE',
);
