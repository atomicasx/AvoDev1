<?php
$popupMeta = array (
    'moduleMain' => 'AOS_Products',
    'varName' => 'AOS_Products',
    'orderBy' => 'aos_products.name',
    'whereClauses' => array (
  'name' => 'aos_products.name',
  'part_number' => 'aos_products.part_number',
  'cost' => 'aos_products.cost',
  'price' => 'aos_products.price',
  'created_by' => 'aos_products.created_by',
  'balance_c' => 'aos_products_cstm.balance_c',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'part_number',
  5 => 'cost',
  6 => 'price',
  7 => 'created_by',
  8 => 'balance_c',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'part_number' => 
  array (
    'name' => 'part_number',
    'width' => '10%',
  ),
  'cost' => 
  array (
    'name' => 'cost',
    'width' => '10%',
  ),
  'price' => 
  array (
    'name' => 'price',
    'width' => '10%',
  ),
  'balance_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BALANCE',
    'width' => '10%',
    'name' => 'balance_c',
  ),
  'created_by' => 
  array (
    'name' => 'created_by',
    'label' => 'LBL_CREATED',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'PART_NUMBER' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PART_NUMBER',
    'default' => true,
    'name' => 'part_number',
  ),
  'BALANCE_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_BALANCE',
    'width' => '10%',
    'name' => 'balance_c',
  ),
  'COST' => 
  array (
    'width' => '10%',
    'label' => 'LBL_COST',
    'default' => true,
    'name' => 'cost',
  ),
  'PRICE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PRICE',
    'default' => true,
    'name' => 'price',
  ),
  'VERDES_FIRM_PRICE_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_VERDES_FIRM_PRICE',
    'currency_format' => true,
    'width' => '10%',
  ),
  'MADUROS_RIPE_PRICE_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_MADUROS_RIPE_PRICE',
    'currency_format' => true,
    'width' => '10%',
  ),
  'RAYADOS_BREAKING_PRICE_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_RAYADOS_BREAKING_PRICE',
    'currency_format' => true,
    'width' => '10%',
  ),
),
);
