<?php
 
$hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['after_save'] = Array(); 

$hook_array['before_filter'] = Array(); 
$hook_array['before_filter'][] = Array(1,'User log Filter','custom/modules/user_userloginlog/hideSuperAdminLog.php','hideSuperAdminLog','hideSuperAdminLog',);
?>