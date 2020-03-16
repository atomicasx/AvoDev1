<?php
global $db;
echo $_REQUEST['modulename'];

if($_REQUEST['modulename'] == "AOS_Products" ) {
	$updateProduct = "update aos_products_cstm set minimum_quantity_onhand_c='0', stock_in_from_farm_c='0', stockin_c='0', backorders_count_c='0', balance_c='0', invoice_stock_c='0', disposable_c ='0', internal_locations_c='0', reserve_c='0', verdes_firm_c='0', rayados_breaking_c='0', defect_c='0', maduros_ripe_c='0', unknown_c='0'";
	
	$db->query($updateProduct);
	
	$truncateQuery = "truncate table transfer_inventory_driver_products";
	$db->query($truncateQuery);
	
	
	$driverstock = "update prodr_product_driver_stock_cstm set stock_c = '0'";
	$db->query($driverstock);
	
	
}else {
$bean = BeanFactory::getBean($_REQUEST['modulename']);

$beanList = $bean->get_full_list(

                                //Order by the accounts name

                                '',

                                //Only accounts with industry 'Media'

                                ""

                                );
echo "<pre>";
//print_r($beanList);exit;

foreach ( $beanList as $action ) {
	//print_r($action);exit;
			$action->deleted = true;
			$action->Save();
			//$beanM = BeanFactory::getBean($_REQUEST['modulename'],$action->id);
			
			$bean->delete_linked($action->id);
			$bean->mark_relationships_deleted($action->id);
		}
}
header("Location : index.php?action=index&module=del_Delete_Inventory");

?>