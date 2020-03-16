<?php
// created: 2019-05-28 19:46:01
$dictionary["fyn_stock_in_fyn_qr_code_boxes_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fyn_stock_in_fyn_qr_code_boxes_1' => 
    array (
      'lhs_module' => 'fyn_Stock_In',
      'lhs_table' => 'fyn_stock_in',
      'lhs_key' => 'id',
      'rhs_module' => 'fyn_QR_CODE_BOXES',
      'rhs_table' => 'fyn_qr_code_boxes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fyn_stock_in_fyn_qr_code_boxes_1_c',
      'join_key_lhs' => 'fyn_stock_in_fyn_qr_code_boxes_1fyn_stock_in_ida',
      'join_key_rhs' => 'fyn_stock_in_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb',
    ),
  ),
  'table' => 'fyn_stock_in_fyn_qr_code_boxes_1_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'fyn_stock_in_fyn_qr_code_boxes_1fyn_stock_in_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fyn_stock_in_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fyn_stock_in_fyn_qr_code_boxes_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fyn_stock_in_fyn_qr_code_boxes_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fyn_stock_in_fyn_qr_code_boxes_1fyn_stock_in_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fyn_stock_in_fyn_qr_code_boxes_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fyn_stock_in_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb',
      ),
    ),
  ),
);