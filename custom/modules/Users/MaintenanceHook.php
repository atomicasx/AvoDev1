<?php
//MaintenanceHook
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class MaintenanceHook {
	
	/**
	 * logic hook call after the rendering of the frame.
	 * Check if system is in maintenance then redirect to maintenance page
	 */
	function CheckMaintenance($event, $arguments){
		
		global  $db,$current_user,$sugar_config;
		$flag = false;
		$allowed_modules = array('Administration','Users','Configurator');
		if(in_array($_REQUEST['module'],$allowed_modules)){
			$flag = true;
		}
			
		if($sugar_config['in_maintenance'] == 'Enable' && $flag==false && !$current_user->is_admin){
		// if($sugar_config['in_maintenance'] && $current_user->id != '1'){
			// SugarApplication::redirect('index.php?action=inMaintenance&module=Users');
			session_destroy(); 
			SugarApplication::redirect('maintenance.php');
		}
		

	}
		
}
?>