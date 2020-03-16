<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class CreateProductStock {
    
    public function saveProductStock($bean, $event, $arguments)
    {
        //echo $_POST['record'];
        if(empty($_POST['record']) && empty($bean->is_admin))
        {
            $productsBean = BeanFactory::getBean('AOS_Products');

            $productsList = $productsBean->get_list("name");

            foreach ($productsList['list'] as $product) {

                    $driverStockBean = BeanFactory::getBean('prodr_Product_Driver_Stock');

                    $driverStockList = $driverStockBean->retrieve_by_string_fields(array(
                        'aos_products_id_c' => $product->id,
                        'user_id_c' => $bean->id
                    ));
                    if(!$driverStockList)
                    {
                        $saveDriverStockBean = BeanFactory::getBean('prodr_Product_Driver_Stock');
                        $saveDriverStockBean->aos_products_id_c = $product->id;
                        $saveDriverStockBean->user_id_c = $bean->id;
                        $saveDriverStockBean->stock_c = "0";
                        $saveDriverStockBean->save();
                    }
                //}

            }
        }        
    }
}
?>