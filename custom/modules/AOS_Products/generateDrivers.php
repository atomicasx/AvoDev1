<?php
//echo "I am Here...";exit;
$productsBean = BeanFactory::getBean('AOS_Products');

$productsList = $productsBean->get_list("name");

foreach ($productsList['list'] as $product) {

    $driverBean = BeanFactory::getBean('Users');

    $driverList = $driverBean->get_list("name", "users.is_admin = '0' and users_cstm.user_role_c='driverlocation'");

    /*$driverList = $driverBean->retrieve_by_string_fields(array(
      'is_admin' => 0
    ));
    echo "<pre>";
    print_r($driverList);*/
    foreach ($driverList['list'] as $driver) {
      //echo $driver->id;exit;
        $driverStockBean = BeanFactory::getBean('prodr_Product_Driver_Stock');

        $driverStockList = $driverStockBean->retrieve_by_string_fields(array(
            'aos_products_id_c' => $product->id,
            'user_id_c' => $driver->id
          ));
          if(!$driverStockList)
          {
            $saveDriverStockBean = BeanFactory::getBean('prodr_Product_Driver_Stock');
            $saveDriverStockBean->aos_products_id_c = $product->id;
            $saveDriverStockBean->user_id_c = $driver->id;
            $saveDriverStockBean->stock_c = "0";
            $saveDriverStockBean->save();
          }
    }

}
?>