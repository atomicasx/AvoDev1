<?php
// created: 2018-11-30 20:37:44
$dictionary["fyn_Stock_In"]["fields"]["fyn_qr_code_pallette_fyn_stock_in_1"] = array (
  'name' => 'fyn_qr_code_pallette_fyn_stock_in_1',
  'type' => 'link',
  'relationship' => 'fyn_qr_code_pallette_fyn_stock_in_1',
  'source' => 'non-db',
  'module' => 'fyn_QR_CODE_PALLETTE',
  'bean_name' => 'fyn_QR_CODE_PALLETTE',
  'vname' => 'LBL_FYN_QR_CODE_PALLETTE_FYN_STOCK_IN_1_FROM_FYN_QR_CODE_PALLETTE_TITLE',
  'id_name' => 'fyn_qr_code_pallette_fyn_stock_in_1fyn_qr_code_pallette_ida',
);
$dictionary["fyn_Stock_In"]["fields"]["fyn_qr_code_pallette_fyn_stock_in_1_name"] = array (
  'name' => 'fyn_qr_code_pallette_fyn_stock_in_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FYN_QR_CODE_PALLETTE_FYN_STOCK_IN_1_FROM_FYN_QR_CODE_PALLETTE_TITLE',
  'save' => true,
  'id_name' => 'fyn_qr_code_pallette_fyn_stock_in_1fyn_qr_code_pallette_ida',
  'link' => 'fyn_qr_code_pallette_fyn_stock_in_1',
  'table' => 'fyn_qr_code_pallette',
  'module' => 'fyn_QR_CODE_PALLETTE',
  'rname' => 'name',
);
$dictionary["fyn_Stock_In"]["fields"]["fyn_qr_code_pallette_fyn_stock_in_1fyn_qr_code_pallette_ida"] = array (
  'name' => 'fyn_qr_code_pallette_fyn_stock_in_1fyn_qr_code_pallette_ida',
  'type' => 'link',
  'relationship' => 'fyn_qr_code_pallette_fyn_stock_in_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FYN_QR_CODE_PALLETTE_FYN_STOCK_IN_1_FROM_FYN_STOCK_IN_TITLE',
);
