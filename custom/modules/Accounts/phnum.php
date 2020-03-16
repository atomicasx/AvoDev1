<?php
//error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('include/entryPoint.php');
require("config.php");
require("config_override.php");
require_once('modules/Administration/Administration.php');
if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
class class_phnum
{
	public function func_phnum($bean, $event, $arguments)
	{
		global $db;

		$input1=$bean->phone_alternate;
		$input2=$bean->phone_office;
		$number1 = $input1;
		$number2 = $input2;
		
  		$number1 = preg_replace("/[^\d]/","",$number1);
  		$number2 = preg_replace("/[^\d]/","",$number2);
 
		  // get number length.
		  $length1 = strlen($number1);
		  $length2 = strlen($number2);
  
   

 if ($length1 == 10 ) {
 	$number1 = preg_replace("/^\(?(\d{3})\)?[-.●]?(\d{3})[-.●]?(\d{4})$/", "($1) $2 - $3", $number1);
 	print_r($bean->phone_alternate);

 }
 // echo "<br>"
 if ($length2 == 10 ) {
 	$number2 = preg_replace("/^\(?(\d{3})\)?[-.●]?(\d{3})[-.●]?(\d{4})$/", "($1) $2 - $3", $number2);
 	print_r($bean->phone_office);
 }
  		$bean->phone_alternate = (string)$number1;
		// $bean->save();
  		$bean->phone_office = (string)$number2;
		//$bean->save();
		// exit;
		//echo $setpuf = concat("+1(",subStr($input,0,3),") ",subStr($input,3,3),"-",subStr($input,6,4));
		// $output = "(".substr($input,-12,-8).") ".substr($input,-8,-4)."-".substr($input,-4);
	// 	$bean->phone_office = (string)$number;
	// 	$bean->save();
 // echo" <br>";
	// 	// $bean->$phone_office = '8888';
	// 	print_r($bean->phone_office);
	// 	// exit;
	// 	echo "$mobnum";
	// 	echo "$offnum";
	}
}
		//concat("+1(",subStr($phone_office,0,3),") ",subStr($phone_office,3,3),"-",subStr($phone_office,6,4));