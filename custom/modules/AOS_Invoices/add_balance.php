<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
class Add_balanceclass
{
public function addbalance_method($bean, $event, $arguments)
	{
		global $db;
		global $sugar_config;
		$arr = array();
    	  	$i =0;$j=0;
    	  	$sql = "SELECT product_id, name FROM aos_products_quotes WHERE deleted='0' AND parent_id='".$bean->id."'";
         $res = $db->query($sql);
         while ($row = $db->fetchByAssoc($res)) {
        	$product_id = $row['product_id'];
        	$sql1 = "SELECT opencartbalancestock_c,balance_c FROM aos_products_cstm WHERE id_c ='".$product_id."'";
        	$res1 = $db->query($sql1);
			$row1 = $db->fetchByAssoc($res1);
			//echo $open_balance = $row1['opencartbalancestock_c'];
			$arr[$i] =  $row1['opencartbalancestock_c'];
			//$arr['balance_c'] = $row1['balance_c'];
			$i++;
			
			}
			//print_r($arr);exit;
			$length = count($arr);
			$i=0;
			//echo $arr[$i];exit;
			//for($i=0 ; $i<$length; $i++){
			$bean->item1_c = $arr[$i];
			$bean->item2_c = $arr[$i+1];
			$bean->item3_c = $arr[$i+2];
			$bean->item4_c = $arr[$i+3];
			$bean->item5_c = $arr[$i+4];
			$bean->item6_c = $arr[$i+5];
			$bean->item7_c = $arr[$i+6];
			$bean->item8_c = $arr[$i+7];
			$bean->item9_c = $arr[$i+8];
			$bean->item10_c = $arr[$i+9];
			$bean->item11_c = $arr[$i+10];
			$bean->item12_c = $arr[$i+11];
			$bean->item13_c = $arr[$i+12];
			$bean->item14_c = $arr[$i+13];
			$bean->item15_c = $arr[$i+14];
	}
}
?>
