<?php

function get_user_ids(){
	$users = get_user_array(false);
	$user_ids = array_keys($users);
	return $user_ids;
}

function CreateTimeLineActivity($module,$related_id,$account_id,$name,$msg){
	global $current_user;
	$timeline = BeanFactory::newBean('kms_timeline');
	$timeline->name = $name;
	$timeline->description = $msg;
	$timeline->parent_type = $module;
	$timeline->parent_id = $related_id;
	$timeline->account_id = $account_id;
	$timeline->created_by = $current_user->id;
	$timeline->assigned_user_id = $current_user->id;
	$timeline->modified_user_id = $current_user->id;
	$timeline->save();
}
 
function CreateNotification($module,$user,$url,$name,$msg){
	$alert = BeanFactory::newBean('Alerts');
	$alert->name = $name;
	$alert->description = $msg;
	$alert->url_redirect = $url;
	$alert->target_module = $module;
	$alert->assigned_user_id = $user;
	$alert->created_by = '1';
	$alert->modified_user_id = '1';
	$alert->type = 'info';
	$alert->is_read = 0;
	$alert->save();
}
function getAllUsersExceptDrivers(){
	global $db;
	$users_except_drivers = array();
	$sql = "select u.id as user_id from users u LEFT JOIN users_cstm uc ON uc.id_c = u.id
			where u.deleted=0 AND u.`status`='Active' AND uc.user_role_c != 'driverlocation'";
	$result = $db->query($sql);
	while($row = $db->fetchByAssoc($result)){
		$users_except_drivers[] = $row['user_id'];
	}
	return $users_except_drivers;
	
}
function getUsersInRole($role_id){
	global $db;
	$sql = "SELECT u.id FROM users u LEFT JOIN acl_roles_users ru ON ru.user_id=u.id WHERE u.deleted=0 AND ru.deleted=0 AND u.`status` ='Active' AND ru.role_id='$role_id'";
	$result = $db->query($sql);
	$users_array = array();
	while($row = $db->fetchByAssoc($result)){
		$users_array[] = $row['id'];
	}
	return $users_array;
}
function get_securitygroup_array(){
	global $db;
	$sql = "SELECT id,`name` FROM securitygroups WHERE deleted=0 ";
	$result = $db->query($sql);
	$securitygroup_array = array('' => '');
	while($row = $db->fetchByAssoc($result)){
		$securitygroup_array[$row['id']] = $row['name'];
	}
	return $securitygroup_array;
}
function getUsersInGroup($group_id){
	global $db;
	// $sql = "SELECT u.id FROM users u LEFT JOIN securitygroups_users sgu ON sgu.user_id=u.id WHERE u.deleted=0 AND sgu.deleted=0 AND u.`status` ='Active' AND sgu.securitygroup_id='$group_id'";
	$sql = "SELECT DISTINCT u.id from users u LEFT JOIN `securitygroups_users` sgu ON sgu.user_id=u.id WHERE u.deleted=0 AND sgu.deleted=0 AND u.`status`='Active' AND (sgu.securitygroup_id='$group_id' OR  sgu.securitygroup_id IN (
	select id from securitygroups where deleted=0 AND parentgroup_id='$group_id' ));";
	$result = $db->query($sql);
	$users_array = array();
	while($row = $db->fetchByAssoc($result)){
		$users_array[] = $row['id'];
	}
	return $users_array;
}

?>