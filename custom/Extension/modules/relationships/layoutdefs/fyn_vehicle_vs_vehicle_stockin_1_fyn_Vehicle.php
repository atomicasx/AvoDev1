<?php
 // created: 2018-11-30 17:27:30
$layout_defs["fyn_Vehicle"]["subpanel_setup"]['fyn_vehicle_vs_vehicle_stockin_1'] = array (
  'order' => 100,
  'module' => 'vs_Vehicle_StockIN',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FYN_VEHICLE_VS_VEHICLE_STOCKIN_1_FROM_VS_VEHICLE_STOCKIN_TITLE',
  'get_subpanel_data' => 'fyn_vehicle_vs_vehicle_stockin_1',
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
