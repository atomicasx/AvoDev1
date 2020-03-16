<?php
//echo "hello";
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
if(isset($_GET['id'])){
	echo fun($_GET['id']);
	//echo fun1($_GET['id']);
}
function fun($data){
	global $db;
	$arr = array();
	$us_id = $_GET['id'];
	$total = $_GET['total_price'];
	$results = $db->query("select commision_rate_c from users_cstm where id_c = '".$us_id."'");           
	$rows = $db->fetchByAssoc($results);
	$rate = $rows['commision_rate_c']/100;
	$count = str_replace(',', '', $total);
	echo $total_rate_After_commission =intval($count*$rate);
	//$arr['a'] =$total*$rate;
	
	/*$results1 = $db->query("select accounts_aos_products_1accounts_ida from accounts_aos_products_1_c where accounts_aos_products_1aos_products_idb = '".$spl_id."' and deleted ='0'");           
	$rows1 = $db->fetchByAssoc($results1);
	$hospital_id = $rows1['accounts_aos_products_1accounts_ida'];
	$arr['b'] = $hospital_id;
	$results1 = $db->query("select name from accounts where id = '".$hospital_id."' and deleted ='0'");           
	$rows1 = $db->fetchByAssoc($results1);
	$hospital_name = $rows1['name'];
	$arr['c'] = $hospital_name;*/
//echo json_encode($arr);
	}
	
?>