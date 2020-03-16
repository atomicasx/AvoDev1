<?php
// created: 2018-12-01 15:02:29
$dictionary["fyn_locations_aos_invoices_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fyn_locations_aos_invoices_1' => 
    array (
      'lhs_module' => 'fyn_locations',
      'lhs_table' => 'fyn_locations',
      'lhs_key' => 'id',
      'rhs_module' => 'AOS_Invoices',
      'rhs_table' => 'aos_invoices',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fyn_locations_aos_invoices_1_c',
      'join_key_lhs' => 'fyn_locations_aos_invoices_1fyn_locations_ida',
      'join_key_rhs' => 'fyn_locations_aos_invoices_1aos_invoices_idb',
    ),
  ),
  'table' => 'fyn_locations_aos_invoices_1_c',
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
      'name' => 'fyn_locations_aos_invoices_1fyn_locations_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fyn_locations_aos_invoices_1aos_invoices_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fyn_locations_aos_invoices_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fyn_locations_aos_invoices_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fyn_locations_aos_invoices_1fyn_locations_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fyn_locations_aos_invoices_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fyn_locations_aos_invoices_1aos_invoices_idb',
      ),
    ),
  ),
);