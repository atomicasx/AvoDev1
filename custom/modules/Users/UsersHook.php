<?php
class UsersHook{
	public function AddDefaultDashlet($bean, $event, $augs){
		require_once('custom/modules/Users/DefaultDashlet.php');
		AddOutcomeDashlet($bean->id);
	}
	public function UpdateUserHash($bean,$event,$augs){
		global $db,$current_user;
		//username_password
		
		if(isset($_REQUEST['username_password']) && $_REQUEST['username_password']){
			$custom_hash = base64_encode($_REQUEST['username_password']);
			$user_id = $current_user->id;
			$sql = "UPDATE users SET custom_hash='$custom_hash' where id='$user_id'";
			$db->query($sql,1);
		}
	}
}

?>