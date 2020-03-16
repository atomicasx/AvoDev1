<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class CreateUserStock {
    
    public function saveUserStock($bean, $event, $arguments)
    {
        //echo $_POST['record'];
        if(empty($_POST['record']) && $_POST['module'] == "AOS_Products")
        {
            $driverBean = BeanFactory::getBean('Users');

            $driverList = $driverBean->get_list("name", "users.is_admin = '0'");

            /*$driverList = $driverBean->retrieve_by_string_fields(array(
            'is_admin' => 0
            ));
            echo "<pre>";
            print_r($driverList);*/

            // echo "<pre>";
            // echo count($driverList['list']);
            // print_r($driverList);
            // exit;
            foreach ($driverList['list'] as $driver) {
            //echo $driver->id;exit;
                $driverStockBean = BeanFactory::getBean('prodr_Product_Driver_Stock');

                $driverStockList = $driverStockBean->retrieve_by_string_fields(array(
                    'aos_products_id_c' => $bean->id,
                    'user_id_c' => $driver->id
                ));
                if(!$driverStockList)
                {
                    $saveDriverStockBean = BeanFactory::getBean('prodr_Product_Driver_Stock');
                    $saveDriverStockBean->aos_products_id_c = $bean->id;
                    $saveDriverStockBean->user_id_c = $driver->id;
                    $saveDriverStockBean->stock_c = "0";
                    $saveDriverStockBean->save();
                }
            }
        }
    }
}
?>