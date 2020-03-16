<?php
// created: 2018-11-25 11:53:30
$dictionary["fyn_Stock_out"]["fields"]["fyn_qr_code_boxes_fyn_stock_out_1"] = array (
  'name' => 'fyn_qr_code_boxes_fyn_stock_out_1',
  'type' => 'link',
  'relationship' => 'fyn_qr_code_boxes_fyn_stock_out_1',
  'source' => 'non-db',
  'module' => 'fyn_QR_CODE_BOXES',
  'bean_name' => 'fyn_QR_CODE_BOXES',
  'vname' => 'LBL_FYN_QR_CODE_BOXES_FYN_STOCK_OUT_1_FROM_FYN_QR_CODE_BOXES_TITLE',
  'id_name' => 'fyn_qr_code_boxes_fyn_stock_out_1fyn_qr_code_boxes_ida',
);
$dictionary["fyn_Stock_out"]["fields"]["fyn_qr_code_boxes_fyn_stock_out_1_name"] = array (
  'name' => 'fyn_qr_code_boxes_fyn_stock_out_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FYN_QR_CODE_BOXES_FYN_STOCK_OUT_1_FROM_FYN_QR_CODE_BOXES_TITLE',
  'save' => true,
  'id_name' => 'fyn_qr_code_boxes_fyn_stock_out_1fyn_qr_code_boxes_ida',
  'link' => 'fyn_qr_code_boxes_fyn_stock_out_1',
  'table' => 'fyn_qr_code_boxes',
  'module' => 'fyn_QR_CODE_BOXES',
  'rname' => 'name',
);
$dictionary["fyn_Stock_out"]["fields"]["fyn_qr_code_boxes_fyn_stock_out_1fyn_qr_code_boxes_ida"] = array (
  'name' => 'fyn_qr_code_boxes_fyn_stock_out_1fyn_qr_code_boxes_ida',
  'type' => 'link',
  'relationship' => 'fyn_qr_code_boxes_fyn_stock_out_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FYN_QR_CODE_BOXES_FYN_STOCK_OUT_1_FROM_FYN_STOCK_OUT_TITLE',
);
