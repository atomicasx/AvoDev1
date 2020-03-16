<?php
// created: 2018-08-24 12:34:19
$dictionary["qr_qr_pallete_qr_qr_boxes_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'qr_qr_pallete_qr_qr_boxes_1' => 
    array (
      'lhs_module' => 'qr_QR_Pallete',
      'lhs_table' => 'qr_qr_pallete',
      'lhs_key' => 'id',
      'rhs_module' => 'qr_QR_Boxes',
      'rhs_table' => 'qr_qr_boxes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'qr_qr_pallete_qr_qr_boxes_1_c',
      'join_key_lhs' => 'qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida',
      'join_key_rhs' => 'qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb',
    ),
  ),
  'table' => 'qr_qr_pallete_qr_qr_boxes_1_c',
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
      'name' => 'qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'qr_qr_pallete_qr_qr_boxes_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'qr_qr_pallete_qr_qr_boxes_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'qr_qr_pallete_qr_qr_boxes_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb',
      ),
    ),
  ),
);