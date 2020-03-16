<?php
// Array
// (
//     [fromStock] => product_balance_c
//     [toStock] => 513b09d2-3a20-4a06-da39-5c014ed65188
//     [currentStock] => 100
//     [transferStock] => 20
// )

if(isset($_POST['fromStock']) && isset($_POST['toStock']))
{
    global $db;
    echo $travelData[$_POST['toStock']];

    echo "<br>";
    echo $travelData[$_POST['fromStock']];
    echo "<br>";
    $transferDate = time();
    $productId = $_POST['productId'];
    $fromStock = $_POST['fromStock'];
    $toStock = $_POST['toStock'];
    $currentStock = (int)$_POST['currentStock'];
    $transferStock = (int)$_POST['transferStock'];
    $toStockHidden = (int)$_POST['toStockHidden'];
    $travelData = [
        "product_balance_c" => "balance_c",
        "product_disposable_c" => "disposable_c",
        "product_defect_c" => "defect_c",
        "product_reserve_c" => "reserve_c", 

    ];

    $travelDataName = [
        "product_balance_c" => "Warehouse Balance Stock",
        "product_disposable_c" => "Disposable",
        "product_defect_c" => "Defect",
        "product_reserve_c" => "Reserve", 

    ];
    $calFromStock = $currentStock - $transferStock;
    if (isset($travelData[$_POST['fromStock']])) {
        $fromStockName = $travelDataName[$_POST['fromStock']];

        $updateSqlFromStock = "update aos_products_cstm set ".$travelData[$fromStock]."= '".$calFromStock."' where id_c = '".$productId."'";
        echo $updateSqlFromStock;
        $fromStockRes = $db->query($updateSqlFromStock);

    } else {
        $fromSql = "select id, name from fyn_vehicle where id = '".$_POST['fromStock']."'";
        $fromRes = $db->query($fromSql);
        $fromRow = $db->fetchByAssoc($fromRes);
        $fromStockName = $fromRow['name'];
        
        $updateSqlFromStock = "update prove_product_vehicle_stock_cstm set vehicle_stock_c = '".$calFromStock."' where fyn_vehicle_id_c = '".$fromRow['id']."' and aos_products_id_c = '".$productId."'";
        echo $updateSqlFromStock;
        $fromStockRes = $db->query($updateSqlFromStock);
    }

    $calToStock = $toStockHidden + $transferStock;
    if (isset($travelData[$_POST['toStock']])) {
        $toStockName = $travelDataName[$_POST['toStock']];
        
        $updateSqlToStock = "update aos_products_cstm set ".$travelData[$toStock]."= '".$calToStock."' where id_c = '".$productId."'";
        echo $updateSqlToStock;
        $toStockRes = $db->query($updateSqlToStock);

    }else {
        $toSql = "select id, name from fyn_vehicle where id = '".$_POST['toStock']."'";
        $toRes = $db->query($toSql);
        $toRow = $db->fetchByAssoc($toRes);
        $toStockName = $toRow['name'];

        $updateSqlToStock = "update prove_product_vehicle_stock_cstm set vehicle_stock_c = '".$calToStock."' where fyn_vehicle_id_c = '".$toRow['id']."' and aos_products_id_c = '".$productId."'";
        echo $updateSqlToStock;
        $toStockRes = $db->query($updateSqlToStock);
    }    

    $insertTransfer = "insert into transfer_inventory_products (product_id, fromStock, toStock, currentStock, transferStock, transferDate) VALUES ('".$productId."', '".$fromStockName."', '".$toStockName."', '".$currentStock."', '".$transferStock."', '".$transferDate."')";
    echo $insertTransfer;
    $db->query($insertTransfer);
}

?>