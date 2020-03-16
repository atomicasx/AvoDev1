<?php
// created: 2018-12-05 15:23:59
$dictionary["fyn_vlzs_fyn_locations_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fyn_vlzs_fyn_locations_1' => 
    array (
      'lhs_module' => 'fyn_vlzs',
      'lhs_table' => 'fyn_vlzs',
      'lhs_key' => 'id',
      'rhs_module' => 'fyn_locations',
      'rhs_table' => 'fyn_locations',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fyn_vlzs_fyn_locations_1_c',
      'join_key_lhs' => 'fyn_vlzs_fyn_locations_1fyn_vlzs_ida',
      'join_key_rhs' => 'fyn_vlzs_fyn_locations_1fyn_locations_idb',
    ),
  ),
  'table' => 'fyn_vlzs_fyn_locations_1_c',
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
      'name' => 'fyn_vlzs_fyn_locations_1fyn_vlzs_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fyn_vlzs_fyn_locations_1fyn_locations_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fyn_vlzs_fyn_locations_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fyn_vlzs_fyn_locations_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fyn_vlzs_fyn_locations_1fyn_vlzs_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fyn_vlzs_fyn_locations_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fyn_vlzs_fyn_locations_1fyn_locations_idb',
      ),
    ),
  ),
);