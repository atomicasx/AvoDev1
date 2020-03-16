<?php

$productsBean = BeanFactory::getBean('AOS_Products');

$productsList = $productsBean->get_list("name");

foreach ($productsList['list'] as $product) {

    $vehicleBean = BeanFactory::getBean('fyn_Vehicle');

    $vehicleList = $vehicleBean->get_list("name");

    foreach ($vehicleList['list'] as $vehicle) {
        $vehicleStockBean = BeanFactory::getBean('prove_product_vehicle_stock');

        $vehicleStockList = $vehicleStockBean->retrieve_by_string_fields(array(
            'aos_products_id_c' => $product->id,
            'fyn_vehicle_id_c' => $vehicle->id
          ));
          if(!$vehicleStockList)
          {
            $saveVehicleStockBean = BeanFactory::getBean('prove_product_vehicle_stock');
            $saveVehicleStockBean->aos_products_id_c = $product->id;
            $saveVehicleStockBean->fyn_vehicle_id_c = $vehicle->id;
            $saveVehicleStockBean->vehicle_stock_c = "0";
            $saveVehicleStockBean->save();
          }
    }

}
?>