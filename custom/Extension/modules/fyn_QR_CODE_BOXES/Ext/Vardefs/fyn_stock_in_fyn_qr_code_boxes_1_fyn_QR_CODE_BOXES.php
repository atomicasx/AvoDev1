<?php
// created: 2019-05-28 19:46:01
$dictionary["fyn_QR_CODE_BOXES"]["fields"]["fyn_stock_in_fyn_qr_code_boxes_1"] = array (
  'name' => 'fyn_stock_in_fyn_qr_code_boxes_1',
  'type' => 'link',
  'relationship' => 'fyn_stock_in_fyn_qr_code_boxes_1',
  'source' => 'non-db',
  'module' => 'fyn_Stock_In',
  'bean_name' => 'fyn_Stock_In',
  'vname' => 'LBL_FYN_STOCK_IN_FYN_QR_CODE_BOXES_1_FROM_FYN_STOCK_IN_TITLE',
  'id_name' => 'fyn_stock_in_fyn_qr_code_boxes_1fyn_stock_in_ida',
);
$dictionary["fyn_QR_CODE_BOXES"]["fields"]["fyn_stock_in_fyn_qr_code_boxes_1_name"] = array (
  'name' => 'fyn_stock_in_fyn_qr_code_boxes_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FYN_STOCK_IN_FYN_QR_CODE_BOXES_1_FROM_FYN_STOCK_IN_TITLE',
  'save' => true,
  'id_name' => 'fyn_stock_in_fyn_qr_code_boxes_1fyn_stock_in_ida',
  'link' => 'fyn_stock_in_fyn_qr_code_boxes_1',
  'table' => 'fyn_stock_in',
  'module' => 'fyn_Stock_In',
  'rname' => 'name',
);
$dictionary["fyn_QR_CODE_BOXES"]["fields"]["fyn_stock_in_fyn_qr_code_boxes_1fyn_stock_in_ida"] = array (
  'name' => 'fyn_stock_in_fyn_qr_code_boxes_1fyn_stock_in_ida',
  'type' => 'link',
  'relationship' => 'fyn_stock_in_fyn_qr_code_boxes_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FYN_STOCK_IN_FYN_QR_CODE_BOXES_1_FROM_FYN_QR_CODE_BOXES_TITLE',
);
