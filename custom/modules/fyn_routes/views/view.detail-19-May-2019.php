<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('include/MVC/View/views/view.detail.php');
class fyn_routesViewDetail extends ViewDetail 
{

    function display()
    {
      $orders = $this->bean->get_linked_beans('fyn_routes_aos_invoices_1','fyn_routes');
      $addresses=array();
      $i=0;
      foreach ($orders as $order) 
      {
        // $addresses[$i]=$order->formatted_address_c;
        $i++;
      }

      // // echo "shafiq <pre> addresses are:".$i;print_r($addresses);exit;
      // $addr="";
      // for($j=0;$j<$i;$j++)
      // {
      //   $addr.="w".$j."=".$addresses[$j];
      // }
      // $finaladdr=urlencode($addr);
      // // echo "shafiq <pre>";print_r($finaladdr);exit;
      $url="popup.php?"."&beanid=".$this->bean->id."&count=".$i;
  
      ?>
      <a style="position:absolute;margin-top: 4.1%;margin-left: 17.5%;" href="<?php echo $url; ?>" target="_blank" class="btn btn-default">Gen Route</a>
      <?php

      parent::display();

    }


}
?>
