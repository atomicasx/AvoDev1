<?php
// created: 2018-11-25 11:52:24
$dictionary["fyn_qr_code_pallette_fyn_qr_code_boxes_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fyn_qr_code_pallette_fyn_qr_code_boxes_1' => 
    array (
      'lhs_module' => 'fyn_QR_CODE_PALLETTE',
      'lhs_table' => 'fyn_qr_code_pallette',
      'lhs_key' => 'id',
      'rhs_module' => 'fyn_QR_CODE_BOXES',
      'rhs_table' => 'fyn_qr_code_boxes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1_c',
      'join_key_lhs' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida',
      'join_key_rhs' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb',
    ),
  ),
  'table' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1_c',
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
      'name' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb',
      ),
    ),
  ),
);