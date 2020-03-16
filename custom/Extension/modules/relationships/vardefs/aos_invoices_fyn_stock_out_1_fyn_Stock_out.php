<?php
// created: 2018-11-29 19:26:13
$dictionary["fyn_Stock_out"]["fields"]["aos_invoices_fyn_stock_out_1"] = array (
  'name' => 'aos_invoices_fyn_stock_out_1',
  'type' => 'link',
  'relationship' => 'aos_invoices_fyn_stock_out_1',
  'source' => 'non-db',
  'module' => 'AOS_Invoices',
  'bean_name' => 'AOS_Invoices',
  'vname' => 'LBL_AOS_INVOICES_FYN_STOCK_OUT_1_FROM_AOS_INVOICES_TITLE',
  'id_name' => 'aos_invoices_fyn_stock_out_1aos_invoices_ida',
);
$dictionary["fyn_Stock_out"]["fields"]["aos_invoices_fyn_stock_out_1_name"] = array (
  'name' => 'aos_invoices_fyn_stock_out_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_INVOICES_FYN_STOCK_OUT_1_FROM_AOS_INVOICES_TITLE',
  'save' => true,
  'id_name' => 'aos_invoices_fyn_stock_out_1aos_invoices_ida',
  'link' => 'aos_invoices_fyn_stock_out_1',
  'table' => 'aos_invoices',
  'module' => 'AOS_Invoices',
  'rname' => 'name',
);
$dictionary["fyn_Stock_out"]["fields"]["aos_invoices_fyn_stock_out_1aos_invoices_ida"] = array (
  'name' => 'aos_invoices_fyn_stock_out_1aos_invoices_ida',
  'type' => 'link',
  'relationship' => 'aos_invoices_fyn_stock_out_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AOS_INVOICES_FYN_STOCK_OUT_1_FROM_FYN_STOCK_OUT_TITLE',
);
