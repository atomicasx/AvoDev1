<?php
$dashletData['user_userloginlogDashlet']['searchFields'] = array (
  'username_c' => 
  array (
    'default' => '',
  ),
  'ipaddress_c' => 
  array (
    'default' => '',
  ),
  'date_entered' => 
  array (
    'default' => '',
  ),
);
$dashletData['user_userloginlogDashlet']['columns'] = array (
  'username_c' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_USERNAME',
    'id' => 'USER_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'username_c',
  ),
  'ipaddress_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_IPADDRESS',
    'width' => '10%',
    'name' => 'ipaddress_c',
  ),
  'date_login_c' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_DATE_LOGIN',
    'width' => '10%',
  ),
  'date_logout_c' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_DATE_LOGOUT',
    'width' => '10%',
  ),
  'duration_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_DURATION',
    'width' => '10%',
  ),
  'fail_attempt_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_FAIL_ATTEMPT',
    'width' => '10%',
  ),
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => false,
    'name' => 'name',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
    'name' => 'date_entered',
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
