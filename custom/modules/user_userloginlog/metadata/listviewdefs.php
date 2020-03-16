<?php
$module_name = 'user_userloginlog';
$listViewDefs [$module_name] = 
array (
  'USERNAME_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_USERNAME',
    'id' => 'USER_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'IPADDRESS_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_IPADDRESS',
    'width' => '10%',
  ),
  'DATE_LOGIN_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_DATE_LOGIN',
    'width' => '10%',
  ),
  'DATE_LOGOUT_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_DATE_LOGOUT',
    'width' => '10%',
  ),
  'DURATION_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_DURATION',
    'width' => '10%',
  ),
  'FAIL_ATTEMPT_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_FAIL_ATTEMPT',
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => false,
    'link' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
  ),
);
;
?>
