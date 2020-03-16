<?php

global $db;

$productClass= ['Class1', 'Class2', 'Organic'];

$productPrice = [65, 60, 75];

$productCode = ["C1BX", "C2BX", "ORGBX"];


$boxNumber = [14, 18, 20, 24, 28, 32, 36, 40, 48, 60, 70, 84, 1000, 1001, 1002];

$productCat = ["Verdes / Firm", "Rayados / Breaking", "Maduros / Ripe"];

$productMainCat = ["AvacadoClass1", "AvacadoClass2", "AvacadoOrganic"];

$prodCatInitial = ["V", "R", "M"];

//$productCode = ["C1", "C2", "ORG"];
$i=1;
foreach($productClass as $pclkey => $pcl) {
    foreach($productCat as $pckey => $pc){
    foreach($boxNumber as $bn) {
        
        
            echo $i."Avocado ".$pcl." Box of ".$bn." ".$pc."  ---  ".$productCode[$pckey].$prodCatInitial[$pckey].$bn." ".$productPrice[$pclkey]."<br>";
            
            $product = BeanFactory::newBean('AOS_Products');
            $product->name = "Avocado ".$pcl." Box of ".$bn." ".$pc;
            $product->category = $productMainCat[$pclkey];
            $product->product_qr_code_c = $productCode[$pckey].$prodCatInitial[$pckey].$bn;
            $product->price = $productPrice[$pclkey];
            $product->save();
            $i++;
        }
    }
}