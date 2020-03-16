<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

require_once('include/MVC/View/views/view.list.php');
class prodr_Product_Driver_StockViewList extends ViewList {


	 function display()
    	{
        	global $db;

		
		?>
		<style>.table-header-rotated th.row-header{
  width: auto;
}

.table-header-rotated td{
  width: 40px;
  border-top: 1px solid #dddddd;
  border-left: 1px solid #dddddd;
  border-right: 1px solid #dddddd;
  vertical-align: middle;
  text-align: left;
}

.table-header-rotated th.rotate-45{
  height: 80px;
  width: 80px;
  min-width: 60px;
  max-width: 60px;
  position: relative;
  vertical-align: bottom;
  padding: 0;
  font-size: 11px;
  line-height: 1.5;
}

.table-header-rotated th.rotate-45 > div{
  position: relative;
  top: 0px;
  left: 40px; /* 80 * tan(45) / 2 = 40 where 80 is the height on the cell and 45 is the transform angle*/
  height: 100%;
  -ms-transform:skew(-45deg,0deg);
  -moz-transform:skew(-45deg,0deg);
  -webkit-transform:skew(-45deg,0deg);
  -o-transform:skew(-45deg,0deg);
  transform:skew(-45deg,0deg);
  overflow: hidden;
  border-left: 1px solid #dddddd;
  border-right: 1px solid #dddddd;
  border-top: 1px solid #dddddd;
}

.table-header-rotated th.rotate-45 span {
  -ms-transform:skew(45deg,0deg) rotate(315deg);
  -moz-transform:skew(45deg,0deg) rotate(315deg);
  -webkit-transform:skew(45deg,0deg) rotate(315deg);
  -o-transform:skew(45deg,0deg) rotate(315deg);
  transform:skew(45deg,0deg) rotate(315deg);
  position: absolute;
  bottom: 25px; /* 40 cos(45) = 28 with an additional 2px margin*/
  left: -25px; /*Because it looked good, but there is probably a mathematical link here as well*/
  display: inline-block;
  // width: 100%;
  width: 85px; /* 80 / cos(45) - 40 cos (45) = 85 where 80 is the height of the cell, 40 the width of the cell and 45 the transform angle*/
  text-align: left;
  // white-space: nowrap; /*whether to display in one line or not*/
}
</style>
<h1>Product Driver Stock</h1>
<br>

<?php
//print_r($_POST);

$driverCon = ($_POST['driver'])?" and users.id='".$_POST['driver']."'":"";

$prodCon = ($_POST['product'])?" and aos_products.id='".$_POST['product']."'":"";

$resProd = $db->query("select aos_products.id, aos_products.name from aos_products inner join aos_products_cstm on aos_products.id=aos_products_cstm.id_c where aos_products.deleted = '0' $prodCon order by aos_products_cstm.sort_order_c ASC");

/*echo "select aos_products.id, aos_products.name from aos_products inner join aos_products_cstm on aos_products.id=aos_products_cstm.id_c where aos_products.deleted = '0' $prodCon order by aos_products_cstm.sort_order_c ASC";*/

$userRes = $db->query("select users.id, users.first_name, users.last_name from users inner join users_cstm on users.id = users_cstm.id_c where users_cstm.user_role_c= 'driverlocation' and users.deleted = 0 and users.is_admin = 0 $driverCon");

	$userData = [];
	while($rowUser = $db->fetchByAssoc($userRes)) {
		$userData[$rowUser['id']] = $rowUser['first_name']. " ". $rowUser['last_name'];
	}
	$productData = [];
	while($rowProd = $db->fetchByAssoc($resProd)) {
		$productData[$rowProd['id']] = $rowProd['name'];
	}


$resProdFilter = $db->query("select aos_products.id, aos_products.name from aos_products inner join aos_products_cstm on aos_products.id=aos_products_cstm.id_c where aos_products.deleted = '0' order by aos_products_cstm.sort_order_c ASC");

$userResFilter = $db->query("select users.id, users.first_name, users.last_name from users inner join users_cstm on users.id = users_cstm.id_c where users_cstm.user_role_c= 'driverlocation' and users.deleted = 0 and users.is_admin = 0");

	$userDataFilter = [];
	while($rowUserFilter = $db->fetchByAssoc($userResFilter)) {
		$userDataFilter[$rowUserFilter['id']] = $rowUserFilter['first_name']. " ". $rowUserFilter['last_name'];
	}
	$productDataFilter = [];
	while($rowProdFilter = $db->fetchByAssoc($resProdFilter)) {
		$productDataFilter[$rowProdFilter['id']] = $rowProdFilter['name'];
	}

?>
<form method="POST" action="index.php?module=prodr_Product_Driver_Stock&action=index&parentTab=All">
<table class="table table-striped table-header-rotated">
	<tr>
		<td> Driver : </td>
		<td>
			<select name="driver">
				<option value="">All</option>
				<?php
				foreach($userDataFilter as $keyuserDataFilter => $valueuserDataFilter) {
				?>
					<option <?php if($_POST['driver']==$keyuserDataFilter) {echo "selected";}else{echo "";}?> value="<?php echo $keyuserDataFilter;?>"><?php echo $valueuserDataFilter;?></option>
				<?php
				}
				?>
			</select>
		</td>
		<td> Product : </td>
		<td>
			<select name="product">
				<option value="">All</option>
				<?php
				foreach($productDataFilter as $keyproductDataFilter => $valueproductDataFilter) {
				?>
					<option <?php if($_POST['product']==$keyproductDataFilter) {echo "selected";}else{echo "";}?> value="<?php echo $keyproductDataFilter;?>"><?php echo $valueproductDataFilter;?></option>
				<?php
				}
				?>
			</select>
		</td>
		<td>
			<input type="submit" name="searchStock" value="Search"> 
		</td>
	</td>
</table>
</form>
<div class="scrollable-table">
  <table class="table table-striped table-header-rotated">
    <thead>
      <tr>
	<th style="width:10%;">Driver Name</th>
	<?php
		
		foreach($productData as $keyproductData => $valueproductData) {			
	?>
	<th class="rotate-45"><div><span><a target="_blank" href="index.php?module=AOS_Products&action=DetailView&record=<?php echo $keyproductData;?>"><?php echo $valueproductData;?></a></span></div></th>	
	<?php
	}
	?>
	</tr>
</thead>

<?php

	

	foreach($userData as $keyUser=>$valueUser) {
		?>
	<tr>
		<th class="row-header" style="min-width:10%; "><?php echo $valueUser;?></th>
		<?php
		foreach($productData as $key=>$value) {
			$prodStockRes = $db->query("select prodr_product_driver_stock_cstm.stock_c from prodr_product_driver_stock inner join prodr_product_driver_stock_cstm on prodr_product_driver_stock.id=prodr_product_driver_stock_cstm.id_c where prodr_product_driver_stock_cstm.user_id_c='".$keyUser."' and aos_products_id_c = '".$key."'");
			$num = $prodStockRes->num_rows;
			if($num > 0) {
				while($prodStockRow = $db->fetchByAssoc($prodStockRes)) {
				if($prodStockRow['stock_c'] == 0){ ?>
					<td><?php echo $prodStockRow['stock_c'];?></td><?php
				} else {?>
					<td><a target="_blank" href="index.php?module=AOS_Products&action=DetailView&record=<?php echo $key;?>"><?php echo $prodStockRow['stock_c'];?></a></td><?php
				}
				
			}
			} else {
				?><td>0</td><?php
			}
			
		}
		?>
	</tr>
<?php
	}

?>

</table></div>

		<?php
	}
}
?>