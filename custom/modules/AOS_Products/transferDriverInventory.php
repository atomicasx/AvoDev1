<?php
// Array
// (
//     [fromStock] => product_balance_c
//     [toStock] => 513b09d2-3a20-4a06-da39-5c014ed65188
//     [currentStock] => 100
//     [transferStock] => 20
// )

global $current_user;
if(isset($_POST['fromDriverStock']) && isset($_POST['toDriverStock']))
{
    global $db;
    echo $travelDriverData[$_POST['toDriverStock']];

    echo "<br>";
    echo $travelData[$_POST['fromStock']];
    echo "<br>";
    $transferDate = time();
    $productDriverId = $_POST['productDriverId'];
    $fromDriverStock = $_POST['fromDriverStock'];
    $toDriverStock = $_POST['toDriverStock'];
    $currentDriverStock = (int)$_POST['currentDriverStock'];
    $transferDriverStock = (int)$_POST['transferDriverStock'];
    $toDriverStockHidden = (int)$_POST['toDriverStockHidden'];
    $travelData = [
        "product_balance_c" => "balance_c",
        "product_disposable_c" => "disposable_c",
        "product_defect_c" => "defect_c",
        "product_reserve_c" => "reserve_c",
        "product_unknown_c" => "unknown_c",
        "product_internal_locations_c" => "internal_locations_c",
        
        "product_verdes_firm_c" => "verdes_firm_c",
        "product_rayados_breaking_c" => "rayados_breaking_c",
        "product_maduros_ripe_c" => "maduros_ripe_c",
    ];

    $travelDataName = [
        "product_balance_c" => "Warehouse Balance Stock",
        "product_disposable_c" => "Disposable",
        "product_defect_c" => "Defect",
        "product_reserve_c" => "Reserve",
        "product_unknown_c" => "Unknown",
        "product_internal_locations_c" => "Internal Locations",

        "product_verdes_firm_c" => "Verdes / Firm",
        "product_rayados_breaking_c" => "Rayados / Breaking",
        "product_maduros_ripe_c" => "Maduros / Ripe",
    ];
    $calFromStock = $currentDriverStock - $transferDriverStock;
    if (isset($travelData[$_POST['fromDriverStock']])) {
        $fromStockName = $travelDataName[$_POST['fromDriverStock']];

        $updateSqlFromStock = "update aos_products_cstm set ".$travelData[$fromDriverStock]."= '".$calFromStock."' where id_c = '".$productDriverId."'";
        echo $updateSqlFromStock;
        $fromStockRes = $db->query($updateSqlFromStock);

    } else {
        $fromSql = "select id, first_name, last_name from users where id = '".$_POST['fromDriverStock']."'";
        $fromRes = $db->query($fromSql);
        $fromRow = $db->fetchByAssoc($fromRes);
        $fromStockName = $fromRow['first_name']." ".$fromRow['last_name'];
        $checkFrom = $db->query("select * from prodr_product_driver_stock_cstm where user_id_c = '".$fromRow['id']."' and aos_products_id_c = '".$productDriverId."'");				$num = $checkFrom->num_rows;		if($num > 0) {			$sqlFromStock = "update prodr_product_driver_stock_cstm set stock_c = '".$calFromStock."' where user_id_c = '".$fromRow['id']."' and aos_products_id_c = '".$productDriverId."'";		} else{			$sqlFromStock = "insert into prodr_product_driver_stock_cstm (stock_c, user_id_c, aos_products_id_c) VALUES('".$calFromStock."', '".$fromRow['id']."', '".$productDriverId."')";		}
        
        echo $sqlFromStock;
        $fromStockRes = $db->query($sqlFromStock);
    }

    $calToStock = $toDriverStockHidden + $transferDriverStock;
    if (isset($travelData[$_POST['toDriverStock']])) {
        $toStockName = $travelDataName[$_POST['toDriverStock']];
        
        $updateSqlToStock = "update aos_products_cstm set ".$travelData[$toDriverStock]."= '".$calToStock."' where id_c = '".$productDriverId."'";
        echo $updateSqlToStock;
        $toStockRes = $db->query($updateSqlToStock);

    }else {
        $toSql = "select id, first_name, last_name from users where id = '".$_POST['toDriverStock']."'";
        $toRes = $db->query($toSql);
        $toRow = $db->fetchByAssoc($toRes);
        $toStockName = $toRow['first_name']." ".$toRow['last_name'];

        						$checkFrom = $db->query("select * from prodr_product_driver_stock_cstm where user_id_c = '".$toRow['id']."' and aos_products_id_c = '".$productDriverId."'");				$num = $checkFrom->num_rows;		if($num > 0) {			$sqlToStock = "update prodr_product_driver_stock_cstm set stock_c = '".$calToStock."' where user_id_c = '".$toRow['id']."' and aos_products_id_c = '".$productDriverId."'";		} else{			$sqlToStock = "insert into prodr_product_driver_stock_cstm (stock_c, user_id_c, aos_products_id_c) VALUES('".$calToStock."', '".$toRow['id']."', '".$productDriverId."')";		}
        echo $sqlToStock;
        $toStockRes = $db->query($sqlToStock);
    }    

    $insertTransfer = "insert into transfer_inventory_driver_products (product_id, fromStock, toStock, currentStock, transferStock, transferDate, transferBy) VALUES ('".$productDriverId."', '".$fromStockName."', '".$toStockName."', '".$currentDriverStock."', '".$transferDriverStock."', '".$transferDate."', '".$current_user->id."')";
    echo $insertTransfer;
    $db->query($insertTransfer);
}

?>