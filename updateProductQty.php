<?php
class UpdateProductQty
{
    public function updateProductQuantityBefore($bean, $event, $arguments)
    {
        if($_POST['module'] == "AOS_Invoices") {
            global $current_user;
            global $db;
            $order_bean = BeanFactory::getBean('AOS_Invoices',$bean->id);
            //echo "<pre>";
            //print_r($_POST);//exit;
            $pidData = $_POST['product_product_id'];
            $pidDataCount = count($_POST['product_product_id']);

            if($pidDataCount > 0)
            {
                $data = [];
                for($i = 0; $i<$pidDataCount; $i++)
                {
                    $data[$pidData[$i]][$_POST['product_product_category_list_c'][$i]] = $data[$pidData[$i]][$_POST['product_product_category_list_c'][$i]] + $_POST['product_product_qty'][$i];
                }
                $flag = 0;
                //print_r($data);//exit;
                foreach($data as $dIdKey=>$d)
                {
                    foreach($d as $dKey => $dValue)
                    {
                            $sqlPost = "SELECT pgc.product_category_list_c, pg.id, pc.verdes_firm_c, pc.rayados_breaking_c, pc.maduros_ripe_c, sum(CAST(pg.product_qty AS UNSIGNED)) as product_qty, pg.product_id as product_id, CAST(pc.balance_c AS UNSIGNED) as balance_c, CAST(pc.invoice_stock_c AS UNSIGNED) as invoice_stock_c FROM aos_products_quotes pg INNER JOIN aos_products_quotes_cstm pgc on pg.id = pgc.id_c  LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id RIGHT JOIN aos_products_cstm pc on pg.product_id=pc.id_c WHERE pg.parent_type = 'AOS_Invoices' AND pg.parent_id = '".$bean->id."' AND pgc.product_category_list_c = '".$dKey."' AND pg.product_id = '".$dIdKey."' AND pg.deleted = 0 group by pg.product_id, pgc.product_category_list_c ORDER BY lig.number ASC, pg.number ASC";
                            //echo $sqlPost;//exit;
                            $resultPost = $db->query($sqlPost);
                            //print_r($resultPost);
                            //echo $resultPost->num_rows;//exit;
                            if ($resultPost->num_rows>0){
                               // $rowPost = $db->fetchByAssoc($resultPost));
                                while ($rowPost = $db->fetchByAssoc($resultPost)) {
                                //Fetch data and create table
                                    if($dKey == "Verdes_Firm"){
                                        $verdes_firm_c = ((int)$rowPost['verdes_firm_c'] + (int)$rowPost['product_qty']) - (int)$dValue;
                                        //echo $verdes_firm_c;
                                        if($verdes_firm_c < 0) {
                                            $flag = 1;
                                            break 2;
                                        }
                                    } else if($dKey == "Rayados_Breaking"){
                                        $rayados_breaking_c = ((int)$rowPost['rayados_breaking_c'] + (int)$rowPost['product_qty']) - (int)$dValue;
                                        if($rayados_breaking_c < 0) {
                                            $flag = 1;
                                            break 2;
                                        }
                                    } else if($dKey == "Maduros_Ripe"){
                                        $maduros_ripe_c = ((int)$rowPost['maduros_ripe_c'] + (int)$rowPost['product_qty']) - (int)$dValue;
                                        if($maduros_ripe_c < 0) {
                                            $flag = 1;
                                            break 2;
                                        }
                                    }
                                }
                            }else{
                                $sqlPostElse = "SELECT * from aos_products_cstm WHERE id_c = '".$dIdKey."'";
                                //echo $sqlPostElse;
                                $resultPostElse = $db->query($sqlPostElse);
                                if ($resultPostElse->num_rows>0){
                                    while ($rowPostElse = $bean->db->fetchByAssoc($resultPostElse)) {
                                        if($dKey == "Verdes_Firm"){
                                            $verdes_firm_c = (int)$rowPostElse['verdes_firm_c'] - (int)$dValue;
                                            //echo $verdes_firm_c;
                                            if($verdes_firm_c < 0) {
                                                $flag = 1;
                                                break 2;
                                            }
                                        } else if($dKey == "Rayados_Breaking"){
                                            $rayados_breaking_c = (int)$rowPostElse['rayados_breaking_c'] - (int)$dValue;
                                            if($rayados_breaking_c < 0) {
                                                $flag = 1;
                                                break 2;
                                            }
                                        } else if($dKey == "Maduros_Ripe"){
                                            $maduros_ripe_c = (int)$rowPostElse['maduros_ripe_c'] - (int)$dValue;
                                            if($maduros_ripe_c < 0) {
                                                $flag = 1;
                                                break 2;
                                            }
                                        }
                                    }
                                }
                            }
                    }
                }
            }
            if($flag == 1)
                            {
                                ?>
                                <script>
                                    alert("You do not have available inventory to place this order.");
                                    window.location = '?module=AOS_Invoices&return_module=AOS_Invoices&action=EditView&record=<?php echo $bean->id;?>';
                                </script>
                                <?php
                               
                                    exit();
                            }
            
            $sql = "SELECT pgc.product_category_list_c, pg.id, pc.verdes_firm_c, pc.rayados_breaking_c, pc.maduros_ripe_c, sum(CAST(pg.product_qty AS UNSIGNED)) as product_qty, pg.product_id as product_id, CAST(pc.balance_c AS UNSIGNED) as balance_c, CAST(pc.invoice_stock_c AS UNSIGNED) as invoice_stock_c FROM aos_products_quotes pg INNER JOIN aos_products_quotes_cstm pgc on pg.id = pgc.id_c INNER JOIN aos_products_cstm pc on pg.product_id=pc.id_c LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id  WHERE pg.parent_type = 'AOS_Invoices' AND pg.parent_id = '".$bean->id."' AND pg.deleted = 0 group by pc.id_c, pgc.product_category_list_c ORDER BY lig.number ASC, pg.number ASC";
            echo $sql;
            //exit;
            $fp = fopen("updateProductQuantityBefore.txt", "a");
            fwrite($fp, $sql."\n\n\n");
            $result = $db->query($sql);
            while ($row = $db->fetchByAssoc($result)) {
                $balance = (int)$row['balance_c'] + (int)$row['product_qty'];
                $invoice_stock_c = (int)$row['invoice_stock_c'] + (int)$row['product_qty'];
        		$productQty = $row['product_qty'];
                	$newProdQty = $productQty;
        		$updateProductQty = "update aos_products_cstm set invoice_stock_c = '".$invoice_stock_c."'"; 
        		if($row['product_category_list_c'] == "Verdes_Firm"){
        			$verdes_firm_c = (int)$row['verdes_firm_c'] + (int)$newProdQty;
        			$updateProductQty.=", verdes_firm_c = '$verdes_firm_c'";
        		} else if($row['product_category_list_c'] == "Rayados_Breaking"){
        			$rayados_breaking_c = (int)$row['rayados_breaking_c'] + (int)$newProdQty;
        			$updateProductQty.=", rayados_breaking_c = '$rayados_breaking_c'";
        		} else if($row['product_category_list_c'] == "Maduros_Ripe"){
        			$maduros_ripe_c = (int)$row['maduros_ripe_c'] + (int)$newProdQty;
        			$updateProductQty.=", maduros_ripe_c = '$maduros_ripe_c'";
        		}


                $updateProductQty.= " where id_c = '".$row['product_id']."'";
                fwrite($fp, $updateProductQty."\n\n\n");
                echo $updateProductQty;
                echo "<br>";
                $db->query($updateProductQty);
            }
            fclose($fp);
        }
        //exit;

        //echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
    }

    public function updateProductQuantityAfter($bean, $event, $arguments)
    {
        if($_POST['module'] == "AOS_Invoices") {
            global $current_user;
            global $db;
            $order_bean = BeanFactory::getBean('AOS_Invoices',$bean->id);
            //echo "<br>";
            $sql = "SELECT pg.id, CAST(pg.product_qty AS UNSIGNED) as product_qty, pg.product_id as product_id, CAST(pc.balance_c AS UNSIGNED) as balance_c, CAST(pc.invoice_stock_c AS UNSIGNED) as invoice_stock_c FROM aos_products_quotes pg INNER JOIN aos_products_cstm pc on pg.product_id=pc.id_c LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id  WHERE pg.parent_type = 'AOS_Invoices' AND pg.parent_id = '".$bean->id."' AND pg.deleted = 0 ORDER BY lig.number ASC, pg.number ASC";
            //echo $sql; exit;
            $fp = fopen("updateProductQuantityAfter.txt", "a");
            fwrite($fp, $sql."\n\n\n");
            

            $result = $db->query($sql);
            while ($row = $db->fetchByAssoc($result)) {
                $key = array_search($row['product_id'], $_POST['product_product_id']);
                $newProdQty = $_POST['product_product_qty'][$key];
                //echo $newProdQty;//exit;
                $balance = (int)$row['balance_c'] - (int)$newProdQty;
                $invoice_stock_c = (int)$row['invoice_stock_c'] + (int)$row['product_qty'];
                //$updateProductQty = "update aos_products_cstm set balance_c = '".$balance."', invoice_stock_c = '".$invoice_stock_c."' where id_c = '".$row['product_id']."'";
                //echo $updateProductQty;echo "<br>";//exit;
                fwrite($fp, $updateProductQty."\n\n\n".$newProdQty."\n\n\n");
                //$db->query($updateProductQty);
            }

            fclose($fp);
        //exit;
        }
    }
}

?>