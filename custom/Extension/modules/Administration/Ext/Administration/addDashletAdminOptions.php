<?php

$admin_option_defs['Administration']['addDefaultAdminDashlet']= array('Users','LBL_ADDDEFAULTADMINDASHLET_TITLE','LBL_ADDDEFAULTADMINDASHLET','./index.php?module=Users&action=AddAdminOutcomeDashlet');
$admin_option_defs['Administration']['UserListForAdmin']= array('UserManagement','LBL_USERLISTFORADMIN_TITLE','LBL_USERLISTFORADMIN','./index.php?module=Users&action=getUserListForAdmin');
$admin_option_defs['Administration']['InMaintance']= array('Administration','LBL_INMAINTANCE_TITLE','LBL_INMAINTANCE','./index.php?module=Users&action=setMaintanceStatus');

$admin_option_defs['Administration'] = array_merge((array)$admin_group_header[0][3]['Administration'], (array)$admin_option_defs['Administration']);


$admin_group_header[0]= array('LBL_USERS_TITLE','',false,array_merge((array)$admin_group_header[0][3], (array)$admin_option_defs), 'LBL_USERS_DESC');
?>