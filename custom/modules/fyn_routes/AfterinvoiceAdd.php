<?php
class AfterinvoiceAdd {

    public function updateVansStock($bean, $event, $arguments)
    {
        global $db;
        //echo "<pre>";
        //echo $arguments['related_id'];

        //print_r($arguments);exit;
        $id_fyn_routes = $arguments['id'];
                
        $module_fyn_routes = $arguments['module'];

        $related_moduele_invoice = $arguments['related_module'];
        $related_id_invoice = $arguments['related_id'];
        //$related_id_invoice = $bean->related_id;
        //print_r($bean);
        //echo  $bean->related_id;
        /*$sqlrouteInvoice = "select * from fyn_routes_aos_invoices_1_c where fyn_routes_aos_invoices_1fyn_routes_ida = '".$id_fyn_routes."' and deleted = '0'";
        //echo $sqlrouteInvoice;
        $resultRouteInvoice = $db->query($sqlrouteInvoice);
            while ($rowRouteInvoice = $db->fetchByAssoc($resultRouteInvoice)) {*/
                //echo "<br>";
                //$rowRouteInvoice['fyn_routes_aos_invoices_1aos_invoices_idb'];

                /*$sql = "SELECT pg.id, CAST(pg.product_qty AS UNSIGNED) as product_qty, pg.product_id as product_id, CAST(pc.balance_c AS UNSIGNED) as balance_c FROM aos_products_quotes pg INNER JOIN aos_products_cstm pc on pg.product_id=pc.id_c LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id  WHERE pg.parent_type = 'AOS_Invoices' AND pg.parent_id = '".$rowRouteInvoice['fyn_routes_aos_invoices_1aos_invoices_idb']."' AND pg.deleted = 0 ORDER BY lig.number ASC, pg.number ASC";*/
                $sql = "SELECT pg.id, CAST(pg.product_qty AS UNSIGNED) as product_qty, pg.product_id as product_id, CAST(pc.balance_c AS UNSIGNED) as balance_c FROM aos_products_quotes pg INNER JOIN aos_products_cstm pc on pg.product_id=pc.id_c LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id  WHERE pg.parent_type = 'AOS_Invoices' AND pg.parent_id = '".$related_id_invoice."' AND pg.deleted = 0 ORDER BY lig.number ASC, pg.number ASC";
                $result = $db->query($sql);
                //echo $sql;exit;
                while ($row = $db->fetchByAssoc($result)) {
                    
                    $product_qty = (int)$row['product_qty'];
                    //echo $product_qty;
                    //echo "<br>";
                    $selectRouteVanArea = "select fyn_vlzs_cstm.fyn_vehicle_id_c FROM fyn_vlzs_fyn_routes_1_c 
                    inner join fyn_vlzs on  fyn_vlzs_fyn_routes_1_c.fyn_vlzs_fyn_routes_1fyn_vlzs_ida = fyn_vlzs.id
                    inner join fyn_vlzs_cstm on fyn_vlzs.id = fyn_vlzs_cstm.id_c
                    WHERE fyn_vlzs_fyn_routes_1fyn_routes_idb = '".$id_fyn_routes."' 
                    and fyn_vlzs_fyn_routes_1_c.deleted = '0'
                    and fyn_vlzs.deleted = '0'";
                    //echo $selectRouteVanArea;
                    //echo "<br>";
                    $resultRouteVanArea = $db->query($selectRouteVanArea);
                    $rowRouteVanArea = $db->fetchByAssoc($resultRouteVanArea);
                    //$areaVanId = $rowRouteVanArea['fyn_vlzs_fyn_routes_1fyn_vlzs_ida'];

                    /*$selectAreaVan = "select * from fyn_vlzs inner join fyn_vlzs_cstm on fyn_vlzs.id = fyn_vlzs_cstm.id_c where fyn_vlzs_cstm.id_c ='".$areaVanId."' and fyn_vlzs.deleted = '0'";
                    //echo $selectAreaVan;
                    //echo "<br>";
                    $resultAreaVan = $db->query($selectAreaVan);
                    $rowAreaVan = $db->fetchByAssoc($resultAreaVan);*/

                    $fyn_vehicle_id_c = $rowRouteVanArea['fyn_vehicle_id_c'];
                    

                    $selectProdVehStock = "select * from prove_product_vehicle_stock inner join prove_product_vehicle_stock_cstm on prove_product_vehicle_stock.id = prove_product_vehicle_stock_cstm.id_c where prove_product_vehicle_stock_cstm.aos_products_id_c ='".$row['product_id']."' and prove_product_vehicle_stock_cstm.fyn_vehicle_id_c = '".$fyn_vehicle_id_c."' and prove_product_vehicle_stock.deleted = '0'";
                    //echo $selectAreaVan;
                    //echo "<br>";
                    $resultProdVehStock = $db->query($selectProdVehStock);
                    $rowProdVehStock = $db->fetchByAssoc($resultProdVehStock);

                    /*$vehicleStockBean = BeanFactory::getBean('prove_product_vehicle_stock');
                    $vehicleStockList = $vehicleStockBean->retrieve_by_string_fields(array(
                        'aos_products_id_c' => $row['product_id'],
                        'fyn_vehicle_id_c' => $fyn_vehicle_id_c
                      ));*/
                      if($rowProdVehStock)
                      {
                            $vehicleStock = (int) $rowProdVehStock['vehicle_stock_c'];
                            $vehicleStock = $vehicleStock + $product_qty;
                            /*$saveVehicleStockBean = BeanFactory::getBean('prove_product_vehicle_stock', $vehicleStockList->id);                            
                            $saveVehicleStockBean->vehicle_stock_c = (int)$saveVehicleStockBean->vehicle_stock_c + $product_qty;
                            $saveVehicleStockBean->save();*/

                            $updateProdVehStock = "update prove_product_vehicle_stock_cstm set vehicle_stock_c = '".$vehicleStock."' where id_c ='".$rowProdVehStock['id']."'";
                            $db->query($updateProdVehStock);
                      }
                    
                }

            /*}*/

        //print_r($bean);
        
        //exit;
    }
}

?>