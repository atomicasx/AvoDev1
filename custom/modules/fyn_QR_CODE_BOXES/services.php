<?php
 include "custom/modules/fyn_QR_CODE_PALLETTE/qrcode.php"; 
include "UploadFile.php";
shell_exec('service named reload >/dev/null 2>/dev/null &');
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
 
class Class_QrEval
{
    public function randString($length) {
        $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $char = str_shuffle($char);
        for($i = 0, $rand = '', $l = strlen($char) - 1; $i < $length; $i ++) {
            $rand .= $char{mt_rand(0, $l)};
        }
        return $rand;
    }
    function func_order($bean, $event, $arguments)
    {
          if(empty($bean->fetched_row)) {
              global $db;
              $product_id = $bean->aos_products_fyn_qr_code_boxes_1aos_products_ida;
              $query =$db->query("SELECT product_qr_code_c FROM aos_products_cstm WHERE id_c='".$product_id."'");
              $row = $db->fetchByAssoc($query);
              $product_modelname = $row['product_qr_code_c'];
              $d1= date("md");
              $imgpl=$bean->id; 
              $qc = new QrCode();
              $w= $product_modelname."-".$d1."-".$this->randString(5);
              $qc->TEXT($w);
              $qc->QRCODE1(400,"$imgpl"."_qr_image");
              $fimg = "$imgpl"."_qr_image";
              $bean->qr_image = $fimg;
              $bean->name = $w; 
          }
    }
  }
 ?>