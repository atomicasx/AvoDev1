<?php
// created: 2019-11-22 19:36:43
$listViewDefs['Employees'] = array (
  'USER_HASH' => 
  array (
    'type' => 'varchar',
    'studio' => 
    array (
      'no_duplicate' => true,
      'listview' => false,
      'searchview' => false,
    ),
    'label' => 'LBL_USER_HASH',
    'width' => '10%',
    'default' => false,
  ),
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'related_fields' => 
    array (
      0 => 'last_name',
      1 => 'first_name',
    ),
    'orderBy' => 'last_name',
    'default' => true,
  ),
  'DEPARTMENT' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DEPARTMENT',
    'link' => true,
    'default' => true,
  ),
  'TITLE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_TITLE',
    'link' => true,
    'default' => true,
  ),
  'REPORTS_TO_NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_LIST_REPORTS_TO_NAME',
    'link' => true,
    'sortable' => false,
    'default' => true,
  ),
  'EMAIL1' => 
  array (
    'width' => '15%',
    'label' => 'LBL_LIST_EMAIL',
    'link' => true,
    'customCode' => '{$EMAIL1_LINK}',
    'default' => true,
    'sortable' => false,
  ),
  'PHONE_MOBILE' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_MOBILE_PHONE',
    'width' => '10%',
    'default' => true,
  ),
  'PHONE_WORK' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_PHONE',
    'link' => true,
    'default' => true,
  ),
  'EMPLOYEE_STATUS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_EMPLOYEE_STATUS',
    'link' => false,
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
  'SECURITYGROUP_NONINHER_FIELDS' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_USER_NAME',
    'id' => '',
    'width' => '10%',
    'default' => false,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CREATED_BY_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'studio' => 
    array (
      'editview' => false,
      'quickcreate' => false,
    ),
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => false,
  ),
  'FIRST_NAME' => 
  array (
    'type' => 'name',
    'label' => 'LBL_FIRST_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'LAST_NAME' => 
  array (
    'type' => 'name',
    'label' => 'LBL_LAST_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'PWD_LAST_CHANGED' => 
  array (
    'type' => 'datetime',
    'studio' => 
    array (
      'formula' => false,
    ),
    'label' => 'LBL_PSW_MODIFIED',
    'width' => '10%',
    'default' => false,
  ),
  'USER_NAME' => 
  array (
    'type' => 'user_name',
    'studio' => 
    array (
      'no_duplicate' => true,
      'editview' => false,
      'detailview' => true,
      'quickcreate' => false,
      'basic_search' => false,
      'advanced_search' => false,
    ),
    'label' => 'LBL_USER_NAME',
    'width' => '10%',
    'default' => false,
  ),
);