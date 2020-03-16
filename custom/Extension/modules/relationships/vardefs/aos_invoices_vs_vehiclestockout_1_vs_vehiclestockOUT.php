<?php
// created: 2018-12-03 17:25:55
$dictionary["vs_vehiclestockOUT"]["fields"]["aos_invoices_vs_vehiclestockout_1"] = array (
  'name' => 'aos_invoices_vs_vehiclestockout_1',
  'type' => 'link',
  'relationship' => 'aos_invoices_vs_vehiclestockout_1',
  'source' => 'non-db',
  'module' => 'AOS_Invoices',
  'bean_name' => 'AOS_Invoices',
  'vname' => 'LBL_AOS_INVOICES_VS_VEHICLESTOCKOUT_1_FROM_AOS_INVOICES_TITLE',
  'id_name' => 'aos_invoices_vs_vehiclestockout_1aos_invoices_ida',
);
$dictionary["vs_vehiclestockOUT"]["fields"]["aos_invoices_vs_vehiclestockout_1_name"] = array (
  'name' => 'aos_invoices_vs_vehiclestockout_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_INVOICES_VS_VEHICLESTOCKOUT_1_FROM_AOS_INVOICES_TITLE',
  'save' => true,
  'id_name' => 'aos_invoices_vs_vehiclestockout_1aos_invoices_ida',
  'link' => 'aos_invoices_vs_vehiclestockout_1',
  'table' => 'aos_invoices',
  'module' => 'AOS_Invoices',
  'rname' => 'name',
);
$dictionary["vs_vehiclestockOUT"]["fields"]["aos_invoices_vs_vehiclestockout_1aos_invoices_ida"] = array (
  'name' => 'aos_invoices_vs_vehiclestockout_1aos_invoices_ida',
  'type' => 'link',
  'relationship' => 'aos_invoices_vs_vehiclestockout_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AOS_INVOICES_VS_VEHICLESTOCKOUT_1_FROM_VS_VEHICLESTOCKOUT_TITLE',
);
