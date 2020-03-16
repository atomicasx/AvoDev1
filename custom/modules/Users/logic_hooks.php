<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_login'] = Array(); 
$hook_array['after_login'][] = Array(1, 'SugarFeed old feed entry remover', 'modules/SugarFeed/SugarFeedFlush.php','SugarFeedFlush', 'flushStaleEntries'); 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(80, 'Add Default Outcome Dashlets', 'custom/modules/Users/UsersHook.php','UsersHook', 'AddDefaultDashlet');

$hook_array['before_save'][] = Array(1, 'After add new user information save product stock for user', 'custom/modules/Users/createProductStock.php','CreateProductStock', 'saveProductStock'); 

$hook_array['after_login'][] = Array(3, 'User Login Log', 'custom/modules/Users/userloginlog.php','UserLoginLog', 'checkLoginLog');

$hook_array['after_login'][] = Array(3, 'User Login Log', 'custom/modules/Users/userloginlog.php','UserLoginLog', 'saveLoginLog');
$hook_array['after_login'][] = Array(9, 'User Update Hash', 'custom/modules/Users/UsersHook.php','UsersHook', 'UpdateUserHash');

$hook_array['before_logout'][] = Array(3, 'User Login Log Logout', 'custom/modules/Users/userloginlog.php','UserLoginLog', 'updateLogOut');

?>