<?php
// created: 2018-12-05 15:23:59
$dictionary["fyn_locations"]["fields"]["fyn_vlzs_fyn_locations_1"] = array (
  'name' => 'fyn_vlzs_fyn_locations_1',
  'type' => 'link',
  'relationship' => 'fyn_vlzs_fyn_locations_1',
  'source' => 'non-db',
  'module' => 'fyn_vlzs',
  'bean_name' => 'fyn_vlzs',
  'vname' => 'LBL_FYN_VLZS_FYN_LOCATIONS_1_FROM_FYN_VLZS_TITLE',
  'id_name' => 'fyn_vlzs_fyn_locations_1fyn_vlzs_ida',
);
$dictionary["fyn_locations"]["fields"]["fyn_vlzs_fyn_locations_1_name"] = array (
  'name' => 'fyn_vlzs_fyn_locations_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FYN_VLZS_FYN_LOCATIONS_1_FROM_FYN_VLZS_TITLE',
  'save' => true,
  'id_name' => 'fyn_vlzs_fyn_locations_1fyn_vlzs_ida',
  'link' => 'fyn_vlzs_fyn_locations_1',
  'table' => 'fyn_vlzs',
  'module' => 'fyn_vlzs',
  'rname' => 'name',
);
$dictionary["fyn_locations"]["fields"]["fyn_vlzs_fyn_locations_1fyn_vlzs_ida"] = array (
  'name' => 'fyn_vlzs_fyn_locations_1fyn_vlzs_ida',
  'type' => 'link',
  'relationship' => 'fyn_vlzs_fyn_locations_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FYN_VLZS_FYN_LOCATIONS_1_FROM_FYN_LOCATIONS_TITLE',
);
