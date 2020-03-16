<?php

//print_r($_REQUEST);
global $db;
$selectInvoices = $_REQUEST['selectInvoice'];
$route = $_REQUEST['route'];
$van = $_REQUEST['van'];

$countInvoice = count($selectInvoices);

if($countInvoice > 0 ) {
    
    foreach($selectInvoices as $selectInvoice) {
        

        $selectVan = "select * from route_invoice_driver where invoice = '".$selectInvoice."' and route = '".$route."'";
        //echo $selectVan;
        $resVan = $db->query($selectVan);
        $numVan = $resVan->num_rows;
        //echo $numVan;exit;
        if($numVan > 0) {
            //echo "I am Here...";
            $rowVan = $db->fetchByAssoc($resVan);
            //print_r($rowVan['van']);
            removeVansStock($selectInvoice, $route, $rowVan['van']); //exit;
        }       

        $db->query("delete from route_invoice_driver where invoice = '".$selectInvoice."' and route = '".$route."'");
        addVansStock($selectInvoice, $route, $van);
        $db->query("insert into route_invoice_driver (invoice, route, driver) VALUES('".$selectInvoice."', '".$route."', '".$van."')");
        
        $updateQr = "update fyn_qr_code_boxes_cstm set user_id_c = '$van' where aos_invoices_id_c = '$selectInvoice'";
        $db->query($updateQr);
        
        $updateInvoice = "update aos_invoices_cstm set user_id1_c = '$van' where id_c='$selectInvoice'";
        $db->query($updateInvoice);
    }
}


function removeVansStock($invoice, $route, $van)
    {
        //echo $van;exit;
        global $db;
        $id_fyn_routes = $route;
        $related_id_invoice = $invoice;

                $sql = "SELECT pg.id, CAST(pg.product_qty AS UNSIGNED) as product_qty, pg.product_id as product_id, CAST(pc.balance_c AS UNSIGNED) as balance_c FROM aos_products_quotes pg INNER JOIN aos_products_cstm pc on pg.product_id=pc.id_c LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id  WHERE pg.parent_type = 'AOS_Invoices' AND pg.parent_id = '".$related_id_invoice."' AND pg.deleted = 0 ORDER BY lig.number ASC, pg.number ASC";
                $result = $db->query($sql);
                //echo $sql;exit;
                while ($row = $db->fetchByAssoc($result)) {
                    
                    $product_qty = (int)$row['product_qty'];
                    

                    $user_id_c = $van;
                    

                    $selectProdVehStock = "select * from prodr_product_driver_stock inner join prodr_product_driver_stock_cstm on prodr_product_driver_stock.id = prodr_product_driver_stock_cstm.id_c where prodr_product_driver_stock_cstm.aos_products_id_c ='".$row['product_id']."' and prodr_product_driver_stock_cstm.user_id_c = '".$user_id_c."' and prodr_product_driver_stock.deleted = '0'";
                    //echo $selectProdVehStock;
                    //echo "<br>";exit;
                    $resultProdVehStock = $db->query($selectProdVehStock);
                    $rowProdVehStock = $db->fetchByAssoc($resultProdVehStock);
                    
                      if($rowProdVehStock)
                      {
                            $vehicleStock = (int) $rowProdVehStock['stock_c'];
                            //echo $vehicleStock;
                            //echo "<br>";
                            $vehicleStock = $vehicleStock - $product_qty;
                            //echo $vehicleStock;
                            //echo "<br>";

                            $updateProdVehStock = "update prodr_product_driver_stock_cstm set stock_c = '".$vehicleStock."' where id_c ='".$rowProdVehStock['id']."'";
                            $db->query($updateProdVehStock);
                            //echo $updateProdVehStock;exit;
                      }
                    
                }
    }

function addVansStock($invoice, $route, $van)
    {
        global $db;
        $id_fyn_routes = $route;
        $related_id_invoice = $invoice;

                $sql = "SELECT pg.id, CAST(pg.product_qty AS UNSIGNED) as product_qty, pg.product_id as product_id, CAST(pc.balance_c AS UNSIGNED) as balance_c FROM aos_products_quotes pg INNER JOIN aos_products_cstm pc on pg.product_id=pc.id_c LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id  WHERE pg.parent_type = 'AOS_Invoices' AND pg.parent_id = '".$related_id_invoice."' AND pg.deleted = 0 ORDER BY lig.number ASC, pg.number ASC";
                $result = $db->query($sql);
                //echo $sql;exit;
                while ($row = $db->fetchByAssoc($result)) {
                    
                    $product_qty = (int)$row['product_qty'];
                    

                    $user_id_c = $van;
                    

                    $selectProdVehStock = "select * from prodr_product_driver_stock inner join prodr_product_driver_stock_cstm on prodr_product_driver_stock.id = prodr_product_driver_stock_cstm.id_c where prodr_product_driver_stock_cstm.aos_products_id_c ='".$row['product_id']."' and prodr_product_driver_stock_cstm.user_id_c = '".$user_id_c."' and prodr_product_driver_stock.deleted = '0'";
                    //echo $selectProdVehStock;
                    $resultProdVehStock = $db->query($selectProdVehStock);
                    $rowProdVehStock = $db->fetchByAssoc($resultProdVehStock);
                    
                      if($rowProdVehStock)
                      {
                            $vehicleStock = (int) $rowProdVehStock['stock_c'];
                            $vehicleStock = $vehicleStock + $product_qty;

                            $updateProdVehStock = "update prodr_product_driver_stock_cstm set stock_c = '".$vehicleStock."' where id_c ='".$rowProdVehStock['id']."'";
                            $db->query($updateProdVehStock);
                      }
                    
                }
    }
header("Location: index.php?module=fyn_routes&action=DetailView&record=".$route);
?>