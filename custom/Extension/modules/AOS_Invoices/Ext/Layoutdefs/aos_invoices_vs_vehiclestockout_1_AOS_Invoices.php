<?php
 // created: 2018-12-03 17:25:55
$layout_defs["AOS_Invoices"]["subpanel_setup"]['aos_invoices_vs_vehiclestockout_1'] = array (
  'order' => 100,
  'module' => 'vs_vehiclestockOUT',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AOS_INVOICES_VS_VEHICLESTOCKOUT_1_FROM_VS_VEHICLESTOCKOUT_TITLE',
  'get_subpanel_data' => 'aos_invoices_vs_vehiclestockout_1',
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
