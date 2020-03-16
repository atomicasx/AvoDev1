<?php
$module_name = 'user_userloginlog';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
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
        'name' => 'date_login_c',
      ),
      'date_logout_c' => 
      array (
        'type' => 'datetimecombo',
        'default' => true,
        'label' => 'LBL_DATE_LOGOUT',
        'width' => '10%',
        'name' => 'date_logout_c',
      ),
      'fail_attempt_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_FAIL_ATTEMPT',
        'width' => '10%',
        'name' => 'fail_attempt_c',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
;
?>
