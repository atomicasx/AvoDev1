<?php
 // created: 2018-11-19 23:27:38
$layout_defs["AOS_Products"]["subpanel_setup"]['aos_products_fyn_stock_in_1'] = array (
  'order' => 100,
  'module' => 'fyn_Stock_In',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AOS_PRODUCTS_FYN_STOCK_IN_1_FROM_FYN_STOCK_IN_TITLE',
  'get_subpanel_data' => 'aos_products_fyn_stock_in_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
