<?php
// created: 2019-11-22 19:37:17
$listViewDefs['AOS_Products'] = array (
  'SORT_ORDER_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_SORT_ORDER_LIST',
    'width' => '8%',
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME_LIST',
    'default' => true,
    'link' => true,
  ),
  'PART_NUMBER' => 
  array (
    'width' => '8%',
    'label' => 'LBL_PART_NUMBER_LIST',
    'default' => true,
  ),
  'MAINCODE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_MAINCODE_LIST',
    'width' => '10%',
  ),
  'STOCKIN_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_STOCKIN_LIST',
    'width' => '5%',
  ),
  'BALANCE_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_BALANCE_LIST',
    'width' => '5%',
  ),
  'VERDES_FIRM_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_VERDES_FIRM_LIST',
    'width' => '5%',
  ),
  'RAYADOS_BREAKING_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_RAYADOS_BREAKING_LIST',
    'width' => '5%',
  ),
  'MADUROS_RIPE_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_MADUROS_RIPE_LIST',
    'width' => '5%',
  ),
  'PRICE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PRICE_LIST',
    'currency_format' => true,
    'default' => true,
  ),
  'VERDES_FIRM_PRICE_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_VERDES_FIRM_PRICE_LIST',
    'currency_format' => true,
    'width' => '5%',
  ),
  'RAYADOS_BREAKING_PRICE_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_RAYADOS_BREAKING_PRICE_LIST',
    'currency_format' => true,
    'width' => '5%',
  ),
  'MADUROS_RIPE_PRICE_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_MADUROS_RIPE_PRICE_LIST',
    'currency_format' => true,
    'width' => '5%',
  ),
  'AOS_PRODUCT_CATEGORY_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_AOS_PRODUCT_CATEGORYS_NAME',
    'id' => 'AOS_PRODUCT_CATEGORY_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
    'related_fields' => 
    array (
      0 => 'aos_product_category_id',
    ),
  ),
  'WAREHOUSE_BALANCE_STOCKS_C' => 
  array (
    'type' => 'int',
    'default' => false,
    'label' => 'LBL_WAREHOUSE_BALANCE_STOCKS',
    'width' => '10%',
  ),
  'STOCKOUT_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_STOCKOUT',
    'width' => '10%',
  ),
  'TYPE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'TRUCK_C' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_TRUCK',
    'width' => '10%',
  ),
  'CREATED_BY_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CREATED',
    'default' => false,
    'module' => 'Users',
    'link' => true,
    'id' => 'CREATED_BY',
  ),
  'COST' => 
  array (
    'width' => '10%',
    'label' => 'LBL_COST',
    'currency_format' => true,
    'default' => false,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '5%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
  ),
);