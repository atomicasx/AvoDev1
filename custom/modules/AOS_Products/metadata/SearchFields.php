<?php
// created: 2019-11-01 04:11:23
$searchFields['AOS_Products'] = array (
  'name' => 
  array (
    'query_type' => 'default',
  ),
  'current_user_only' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'created_by',
    ),
    'my_items' => true,
    'vname' => 'LBL_CURRENT_USER_FILTER',
    'type' => 'bool',
  ),
  'range_price' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_price' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_price' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_cost' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_cost' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_cost' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'favorites_only' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'checked_only' => true,
    'subquery' => 'SELECT favorites.parent_id FROM favorites
			                    WHERE favorites.deleted = 0
			                        and favorites.parent_type = \'AOS_Products\'
			                        and favorites.assigned_user_id = \'{1}\'',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'range_stagging_inventory' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_stagging_inventory' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_stagging_inventory' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_verdes_firm' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_verdes_firm' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_verdes_firm' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_maduros_ripe' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_maduros_ripe' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_maduros_ripe' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_verdes_firm_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_verdes_firm_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_verdes_firm_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_rayados_breaking_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_rayados_breaking_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_rayados_breaking_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_maduros_ripe_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_maduros_ripe_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_maduros_ripe_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
);