<?php
if (!defined('sugarEntry')) { define('sugarEntry', true); }
global $current_user;
if(!$current_user->is_admin){
	echo 'You have no access to this Area';
	die();
}
if(isset($_POST['in_maintenance'])){
	require_once('modules/Configurator/Configurator.php');

	try{	
		$configurator = new Configurator();
		$configurator->config['in_maintenance'] = $_POST['in_maintenance'];
		$configurator->handleOverride();  	
	}catch(Exception $e){
		$GLOBALS['log']->fatal("Error: ".$e->getMessage());
	}
}
sugarApplication::redirect('index.php?module=Administration&action=index');

?>