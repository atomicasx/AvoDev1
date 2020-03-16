<?php
// created: 2018-11-19 23:27:38
$dictionary["fyn_Stock_In"]["fields"]["aos_products_fyn_stock_in_1"] = array (
  'name' => 'aos_products_fyn_stock_in_1',
  'type' => 'link',
  'relationship' => 'aos_products_fyn_stock_in_1',
  'source' => 'non-db',
  'module' => 'AOS_Products',
  'bean_name' => 'AOS_Products',
  'vname' => 'LBL_AOS_PRODUCTS_FYN_STOCK_IN_1_FROM_AOS_PRODUCTS_TITLE',
  'id_name' => 'aos_products_fyn_stock_in_1aos_products_ida',
);
$dictionary["fyn_Stock_In"]["fields"]["aos_products_fyn_stock_in_1_name"] = array (
  'name' => 'aos_products_fyn_stock_in_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_PRODUCTS_FYN_STOCK_IN_1_FROM_AOS_PRODUCTS_TITLE',
  'save' => true,
  'id_name' => 'aos_products_fyn_stock_in_1aos_products_ida',
  'link' => 'aos_products_fyn_stock_in_1',
  'table' => 'aos_products',
  'module' => 'AOS_Products',
  'rname' => 'name',
);
$dictionary["fyn_Stock_In"]["fields"]["aos_products_fyn_stock_in_1aos_products_ida"] = array (
  'name' => 'aos_products_fyn_stock_in_1aos_products_ida',
  'type' => 'link',
  'relationship' => 'aos_products_fyn_stock_in_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AOS_PRODUCTS_FYN_STOCK_IN_1_FROM_FYN_STOCK_IN_TITLE',
);
