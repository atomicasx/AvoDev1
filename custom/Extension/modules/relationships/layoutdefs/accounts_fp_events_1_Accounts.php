<?php
 // created: 2019-06-11 16:01:44
$layout_defs["Accounts"]["subpanel_setup"]['accounts_fp_events_1'] = array (
  'order' => 100,
  'module' => 'FP_events',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_FP_EVENTS_1_FROM_FP_EVENTS_TITLE',
  'get_subpanel_data' => 'accounts_fp_events_1',
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
