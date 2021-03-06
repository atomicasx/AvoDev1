<?php
// created: 2018-11-30 17:27:30
$dictionary["vs_Vehicle_StockIN"]["fields"]["fyn_vehicle_vs_vehicle_stockin_1"] = array (
  'name' => 'fyn_vehicle_vs_vehicle_stockin_1',
  'type' => 'link',
  'relationship' => 'fyn_vehicle_vs_vehicle_stockin_1',
  'source' => 'non-db',
  'module' => 'fyn_Vehicle',
  'bean_name' => 'fyn_Vehicle',
  'vname' => 'LBL_FYN_VEHICLE_VS_VEHICLE_STOCKIN_1_FROM_FYN_VEHICLE_TITLE',
  'id_name' => 'fyn_vehicle_vs_vehicle_stockin_1fyn_vehicle_ida',
);
$dictionary["vs_Vehicle_StockIN"]["fields"]["fyn_vehicle_vs_vehicle_stockin_1_name"] = array (
  'name' => 'fyn_vehicle_vs_vehicle_stockin_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FYN_VEHICLE_VS_VEHICLE_STOCKIN_1_FROM_FYN_VEHICLE_TITLE',
  'save' => true,
  'id_name' => 'fyn_vehicle_vs_vehicle_stockin_1fyn_vehicle_ida',
  'link' => 'fyn_vehicle_vs_vehicle_stockin_1',
  'table' => 'fyn_vehicle',
  'module' => 'fyn_Vehicle',
  'rname' => 'name',
);
$dictionary["vs_Vehicle_StockIN"]["fields"]["fyn_vehicle_vs_vehicle_stockin_1fyn_vehicle_ida"] = array (
  'name' => 'fyn_vehicle_vs_vehicle_stockin_1fyn_vehicle_ida',
  'type' => 'link',
  'relationship' => 'fyn_vehicle_vs_vehicle_stockin_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FYN_VEHICLE_VS_VEHICLE_STOCKIN_1_FROM_VS_VEHICLE_STOCKIN_TITLE',
);
