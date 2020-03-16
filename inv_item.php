<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
define('sugarEntry', TRUE);
ini_set('max_execution_time', 0);
require_once('include/entryPoint.php');
require("config.php");
require("config_override.php");
require_once('modules/Administration/Administration.php');
global $sugar_config;

$suite_conn = new mysqli($sugar_config["dbconfig"]["db_host_name"],$sugar_config["dbconfig"]["db_user_name"],$sugar_config["dbconfig"]["db_password"],$sugar_config["dbconfig"]["db_name"]);

      if (!$suite_conn )
      {     
         die("Connection failed: " . $suite_conn->connect_error);
      }
      else
      {
        echo "suite_conn Connected successfully<br>";
      }

     

      if ($sugar_config['dbport']) 
        $port=$sugar_config['dbport'];
      
      else
        $port=3306;


      $cart_conn = new mysqli($sugar_config['hostname'], $sugar_config['user'], $sugar_config['password'], $sugar_config['dbname'],$port);
       
      if (!$cart_conn )
      {     
        die("Connection failed: " . $cart_conn->connect_error);
      }
      else
      {
        echo "cart_conn Connected successfully<br>";
      }

      // $quer12 = $suite_conn->query("Select * from `aos_products_quotes` WHERE edited = '0'");

$s="SELECT * from `aos_products_quotes` WHERE edited_c = "" ";
       $result = $suite_conn->query($s);
       echo "before";
       // print_r($result);
       echo "after";
// $row = $result->fetch_assoc();
//           print_r($result);exit;
//        // while($row =$result->fetch_assoc())
       // {
        

       // }
       
       