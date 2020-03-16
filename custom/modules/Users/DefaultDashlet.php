<?php
// $id = '5bb87e06-75a7-fe14-89f2-5df0b7ef9c24';
// AddOutcomeDashlet($id);
// die('Done');
if(isset($_REQUEST['type']) && $_REQUEST['type']=='admin'){
	$id = $_REQUEST['user_id'];
	AddOutcomeDashlet($id);
	SugarApplication::redirect('index.php?module=Administration&action=index');
}
function AddOutcomeDashlet($user_id){
	if($user_id){
		global $db,$sugar_config;
		$site_url = $sugar_config['site_url'];

		$sql = "SELECT * from user_preferences where deleted=0 AND category='Home' AND assigned_user_id='$user_id'";
		$result = $db->query($sql);
		// echo '<pre>';
		while($row = $db->fetchByAssoc($result)){
			$pref = unserialize(base64_decode($row['contents']));
		}
		// Current Month Outcome Dashlet
		$pref['dashlets']['3c559ef0-1321-e7a2-c420-5e23e0f35ae9']= array(
				'className' => 'iFrameDashlet',
				'module' => 'Home',
				'options' => array(
					'url' => $site_url.'/index.php?entryPoint=CurrentMonthOutcome',
					'title' => 'Atomic Solutions',
				),

				'fileLocation' => 'modules/Home/Dashlets/iFrameDashlet/iFrameDashlet.php',
			);
		// Last 30 Days Outcome Dashlet
		$pref['dashlets']['65b9bed5-6fd5-327e-82e5-5e23e1ae13b4']= array(
				'className' => 'iFrameDashlet',
				'module' => 'Home',
				'options' => array(
					'url' => $site_url.'/index.php?entryPoint=Last30DaysOutcome',
					'title' => 'Atomic Solutions',
				),

				'fileLocation' => 'modules/Home/Dashlets/iFrameDashlet/iFrameDashlet.php',
			);
		// Current Date Outcome Dashlet
		$pref['dashlets']['1c56c6e6-efac-2ce5-f76f-5e23e13e85d2']= array(
				'className' => 'iFrameDashlet',
				'module' => 'Home',
				'options' => array(
					'url' => $site_url.'/index.php?entryPoint=CurrentDateOutcome',
					'title' => 'Atomic Solutions',
				),

				'fileLocation' => 'modules/Home/Dashlets/iFrameDashlet/iFrameDashlet.php',
			);
		// Current Year Outcome Dashlet
		$pref['dashlets']['101e3241-a30b-683b-6a1b-5e24a126fef9']= array(
				'className' => 'iFrameDashlet',
				'module' => 'Home',
				'options' => array(
					'url' => $site_url.'/index.php?entryPoint=CurrentYearOutcome',
					'title' => 'Atomic Solutions',
				),

				'fileLocation' => 'modules/Home/Dashlets/iFrameDashlet/iFrameDashlet.php',
			);
		$pref['pages'][] = array(
			'pageTitle' => 'Outcome Reports',
			'numColumns' => 2,
			'columns' => array(
			  0 => array(
				  'width' => '60%',
				  'dashlets' => array(
					0 => '3c559ef0-1321-e7a2-c420-5e23e0f35ae9',
					1 => '65b9bed5-6fd5-327e-82e5-5e23e1ae13b4',
				  ),
				),
				1 => array(
				  'width' => '40%',
				  'dashlets' => array(
					0 => '1c56c6e6-efac-2ce5-f76f-5e23e13e85d2',
					1 => '101e3241-a30b-683b-6a1b-5e24a126fef9',
				  ),
				),
			),
			
		);	

		$GLOBALS['log']->fatal(print_r($pref,1));
		$updatedPref = base64_encode(serialize($pref));
		$GLOBALS['log']->fatal($updatedPref);
		$updateSql = "UPDATE user_preferences set contents='$updatedPref' WHERE deleted=0 AND category='Home' AND assigned_user_id='$user_id'";

		$db->query($updateSql,1);
	}
}
?>