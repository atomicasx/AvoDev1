<?php
// created: 2018-12-03 17:45:45
$dictionary["vs_vehiclestockOUT"]["fields"]["fyn_qr_code_boxes_vs_vehiclestockout_1"] = array (
  'name' => 'fyn_qr_code_boxes_vs_vehiclestockout_1',
  'type' => 'link',
  'relationship' => 'fyn_qr_code_boxes_vs_vehiclestockout_1',
  'source' => 'non-db',
  'module' => 'fyn_QR_CODE_BOXES',
  'bean_name' => 'fyn_QR_CODE_BOXES',
  'vname' => 'LBL_FYN_QR_CODE_BOXES_VS_VEHICLESTOCKOUT_1_FROM_FYN_QR_CODE_BOXES_TITLE',
  'id_name' => 'fyn_qr_code_boxes_vs_vehiclestockout_1fyn_qr_code_boxes_ida',
);
$dictionary["vs_vehiclestockOUT"]["fields"]["fyn_qr_code_boxes_vs_vehiclestockout_1_name"] = array (
  'name' => 'fyn_qr_code_boxes_vs_vehiclestockout_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FYN_QR_CODE_BOXES_VS_VEHICLESTOCKOUT_1_FROM_FYN_QR_CODE_BOXES_TITLE',
  'save' => true,
  'id_name' => 'fyn_qr_code_boxes_vs_vehiclestockout_1fyn_qr_code_boxes_ida',
  'link' => 'fyn_qr_code_boxes_vs_vehiclestockout_1',
  'table' => 'fyn_qr_code_boxes',
  'module' => 'fyn_QR_CODE_BOXES',
  'rname' => 'name',
);
$dictionary["vs_vehiclestockOUT"]["fields"]["fyn_qr_code_boxes_vs_vehiclestockout_1fyn_qr_code_boxes_ida"] = array (
  'name' => 'fyn_qr_code_boxes_vs_vehiclestockout_1fyn_qr_code_boxes_ida',
  'type' => 'link',
  'relationship' => 'fyn_qr_code_boxes_vs_vehiclestockout_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FYN_QR_CODE_BOXES_VS_VEHICLESTOCKOUT_1_FROM_VS_VEHICLESTOCKOUT_TITLE',
);
