<?php
// created: 2019-11-22 19:37:17
$searchdefs['AOS_Quotes'] = array (
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
    'maxColumnsBasic' => '3',
  ),
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      2 => 
      array (
        'name' => 'favorites_only',
        'label' => 'LBL_FAVORITES_FILTER',
        'type' => 'bool',
        'default' => true,
      ),
    ),
    'advanced_search' => 
    array (
      0 => 
      array (
        'name' => 'name',
        'default' => true,
      ),
      1 => 
      array (
        'name' => 'billing_contact',
        'default' => true,
      ),
      2 => 
      array (
        'name' => 'billing_account',
        'default' => true,
      ),
      3 => 
      array (
        'name' => 'number',
        'default' => true,
      ),
      4 => 
      array (
        'name' => 'total_amount',
        'default' => true,
      ),
      5 => 
      array (
        'name' => 'expiration',
        'default' => true,
      ),
      6 => 
      array (
        'name' => 'stage',
        'default' => true,
      ),
      7 => 
      array (
        'name' => 'term',
        'default' => true,
      ),
      8 => 
      array (
        'name' => 'assigned_user_id',
        'type' => 'enum',
        'label' => 'LBL_ASSIGNED_TO',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
      ),
    ),
  ),
);