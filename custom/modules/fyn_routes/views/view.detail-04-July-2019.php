<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('include/MVC/View/views/view.detail.php');
class fyn_routesViewDetail extends ViewDetail 
{

    function display()
    {
      global $app_list_strings;
      global $db;
      global $sugar_config;
      global $current_user;
      
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
      //$url="popup.php?"."&beanid=".$this->bean->id."&count=".$i;
  
      ?>
      
      <a style="position:absolute;margin-top: 4.1%;margin-left: 17.5%;" target="_blank" id = "GenRoute" class="btn btn-default">Gen Route</a>
      
      <?php

      parent::display();
      ?>
      
        
        <input type="button" name="select" value="Select" onclick="window.open('<?php echo $sugar_config['site_url'];?>/index.php?module=AOS_Invoices&action=invoices&route=<?php echo $this->bean->id;?>','Invoice List','height=800,width=850');">
        
        <?php
            $vehicleOptions = $this->getVehicleNameOptions();
        ?>
        <select name="fromStock" id="fromStock"style="width:140px;">
                        <option value="">Select Driver</option>
                            <?php echo $vehicleOptions;?>
                            <!-- <option value="product_balance_c">Warehouse Balance Stock</option>
                            <option value="product_disposable_c">Disposable</option>
                            <option value="product_defect_c">Defect</option>
                            <option value="product_reserve_c">Reserve</option> -->
                    </select>
        <input type="button" name="assignDriver" id = "assignDriver" value="Assign Driver">
        <input type="button" name="printProductReport" id = "printProductReport" value="Print Product Report">
        <input type="button" name="printInvoice" id = "printInvoice" value="Print Invoice">
      <script>
      $(document).ready(function(){

        $("#GenRoute").click(function(){
            var boxes = $('input[type="checkbox"]:checked');
            //var routeId = $('#routeId').val();
            $("#selectedInvoiceIds").val($("#invoiceIdsList").val());
            if(boxes.length > 0){
                //alert(boxes.length);
                var invoices = [];
                $.each($('input[type="checkbox"]:checked'), function(){
                    invoices.push($(this).val());
                    console.log(invoices);
                    //alert(routeId);
                    
                });
                var commaInvoce = invoices.join(",");
                $("#selectedInvoiceIds").val(commaInvoce);
                $("#count").val(invoices.length);
                //$('form').attr('action','popup.php?beanid='+routeId).attr('target', '_blank').appendTo('body').submit();
                
            }
            $('#popupId').submit();
        });

        //alert("I am Here...");
        var selectLink = $("#fyn_routes_aos_invoices_1_select_button_old").attr('onClick');
        console.log(selectLink);
        $("#subpanel_list").hide();

        $("#printProductReport").on("click", function(){           
            if($("#fromStock").val() == "") {
                alert("Please select Driver to Print Product Report..");
                return false;
            }
            $("#driverForReport").val($("#fromStock").val());
            $('#fromStock option:contains(' + $("#fromStock").val() + ')').attr('selected', 'selected');
            $("#driverNameForReport").val($("#fromStock option:selected").text());
            $("#productReportFrm").submit();
        });
        $("#assignDriver").on("click", function(){
          $("#van").val($("#fromStock").val());
          var flag = 0;
          $('input[type="checkbox"]:checked').each(function(index, elem) {
            //alert($(elem).val());
            flag = 1;
          });
          if(flag == 0) {
            alert("Please select Invoice to assign Driver..");
            //this.value = "";
            $("#fromStock").val("");
            return false;
          }
          $('#frmSaveInvoiceRoutevan').submit();

        });

        $("#printInvoice").on("click", function(){
          var boxes = $('input[type="checkbox"]:checked');
            if(boxes.length > 0){
                //alert(boxes.length);
                var invoices = [];
                $.each($('input[type="checkbox"]:checked'), function(){
                    invoices.push($(this).val());
                    console.log(invoices);
                    //alert(routeId);
                    
                });
                var commaInvoce = invoices.join(",");
                $("#invoiceIds").val(commaInvoce);
                $("#countInvoice").val(invoices.length);
                //$('form').attr('action','popup.php?beanid='+routeId).attr('target', '_blank').appendTo('body').submit();
                
            } else {
                alert("Please select Invoice to Print..");
                return false;
            }
            $('#popupForm').submit();
        });
        /*$("#fromStock").on("change", function(){
          $("#van").val(this.value);
          var flag = 0;
          $('input[type="checkbox"]:checked').each(function(index, elem) {
            //alert($(elem).val());
            flag = 1;
          });
          if(flag == 0) {
            alert("Please select Invoice to assign Driver..");
            this.value = "";
            return false;
          }

          $('#frmSaveInvoiceRoutevan').submit();

          

        });*/
        
      });
    </script>
    <?php

        $routebeanid=$this->bean->id;
        //echo "khurram<pre>";print_r($count);exit;
        $routebean = BeanFactory::getBean('fyn_routes',$routebeanid);
        $orders = $routebean->get_linked_beans('fyn_routes_aos_invoices_1','fyn_routes');

      /*$sql = "select 
                    aos_invoices.id as id,
                    aos_invoices.name as name,
                    aos_invoices.number as number,
                    aos_invoices.billing_account_id as billing_account_id,
                    aos_invoices.total_amount as total_amount,
                    aos_invoices.status as status,
                    aos_invoices.date_entered as date_entered,
                    aos_invoices.description as description,
                    aos_invoices.created_by as created_by,
                    aos_invoices_cstm.approval_status_c as approval_status_c,
                    fyn_vehicle.name as driver_name
                    
      from aos_invoices 
          inner join aos_invoices_cstm on aos_invoices.id = aos_invoices_cstm.id_c 
          inner join fyn_routes_aos_invoices_1_c on aos_invoices.id = fyn_routes_aos_invoices_1_c.fyn_routes_aos_invoices_1aos_invoices_idb
          inner join fyn_routes on fyn_routes.id = fyn_routes_aos_invoices_1_c.fyn_routes_aos_invoices_1fyn_routes_ida
          Left join route_invoice_van on route_invoice_van.route = fyn_routes.id and route_invoice_van.invoice = aos_invoices.id
          Left join fyn_vehicle on fyn_vehicle.id = route_invoice_van.van
      where 
          aos_invoices.deleted = '0'
          and fyn_routes.id = '".$this->bean->id."'
          and fyn_routes_aos_invoices_1_c.deleted = '0'
          and approval_status_c = 'OnVehicle'";

      $res = $db->query($sql);
      $numRows = $res->num_rows;*/
      ?>
    <form id="popupForm" action="index.php?entryPoint=generatePdf_For_Route" method="post">
 				
                 <input type="hidden" name="task" value="pdf">
                 <input type="hidden" name="module" value="AOS_Invoices">
                 <input type="hidden" id = "uid" name="uid" value="">
                 <input type="hidden" name="invoiceIds" id = "invoiceIds" value="">
                 <input type="hidden" name="countInvoice" id="countInvoice" value="">
                 <input type="hidden" name="templateID" value="4242ece9-f4ea-0929-c821-5c04dd0cc760">
                 
    </form>
      <form name="frmSaveInvoiceRoutevan" id="frmSaveInvoiceRoutevan" method="POST" action="index.php?entryPoint=saveInvoiceRoutevan">
      <table class="table">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>invoice #</th>
                        <th>Customer</th>
                        <th>Customer Address</th>
                        <th>Payment Status</th>
                        <th>Grand Total</th>
                        <th>Date Created</th>
                        <th>Driver Name</th>
                        <th>Invoice Status</th>
                        <th>Description</th>
                        <th>Created By</th>
                        <th>Routing Date</th>
                    </tr>
                </thead>
            <?php
            //if($numRows > 0) {
                if(count($orders) > 0) {
                ?>
                <tbody>
                    <?php
                //while($row = $db->fetchByAssoc($res)) {
                    $invoices = [];
                    $driverDatas = [];
                    foreach ($orders as $order) {
                        //echo "<pre>";
                        //print_r($order);exit;
                        $sql = "select fyn_vehicle.id, fyn_vehicle.name as driver_name 
                            from 
                                fyn_vehicle 
                                    inner join route_invoice_van 
                                        on fyn_vehicle.id = route_invoice_van.van
                            where  route_invoice_van.invoice = '".$order->id."'
                                    and fyn_vehicle.deleted = '0'";
                        $res = $db->query($sql);
                        $row = $db->fetchByAssoc($res);

                        $invoices[] = $order->id;
                        $driverDatas[$row['id']][] = $order->id;
                    ?>
                    <tr>
                        <td><input type="checkbox" name="selectInvoice[]" value="<?php echo $order->id;?>"></td>
                        <td><a target="_blank" href="index.php?module=AOS_Invoices&record=<?php echo $order->id;?>&action=DetailView"><?php echo $order->number;?></a></td>
                        <td><?php
                            $getAccountBeans =  BeanFactory::getBean("Accounts", $order->billing_account_id);
                            echo $getAccountBeans->name;
                        ?></td>
                        <td><?php
                            echo $getAccountBeans->billing_address_street. ", ". $getAccountBeans->billing_address_city. ", ". $getAccountBeans->billing_address_state. ", ". $getAccountBeans->billing_address_postalcode. ", ". $getAccountBeans->billing_address_country;
                        ?></td>
                        <td><?php echo $order->status;?></td>
                        <td><?php echo number_format((float)$order->total_amount, 2, '.', '');?></td>
                        <td><?php echo $order->date_entered;?></td>
                        <td><?php echo $row['driver_name'];?></td>
                        <td><?php echo $order->approval_status_c;?></td>
                        <td><?php echo $order->description;?></td>
                        <td><?php 
                                  $getUserBeans =  BeanFactory::getBean("Users", $order->created_by);
                                  echo $getUserBeans->name;
                        ?></td>
                        <td><?php echo $this->bean->date_entered;?></td>
                    </tr>
                    <?php
                }
                $invoicesData = implode(",", $invoices);
                //print_r($driverDatas);
                ?>
                </tbody>
            </table>
            <input type="hidden" name="route" value="<?php echo $this->bean->id;?>">
            <input type="hidden" name="van" id="van" value="">
      </form>
      <form action="productReport.php" name="productReportFrm" id="productReportFrm" method="POST" target="_blank">
    <?php
        if(count($driverDatas) > 0){
            foreach($driverDatas as $key => $driverData) {
                $invoiceList = implode(",", $driverData);
                $driverId = $key;
                echo $driverInput = "<input type='hidden' name='".$driverId."' value = '".$invoiceList."'>";
            }
        }
    ?>
    <input type="hidden" name = "driverForReport" value="" id="driverForReport">
    <input type="hidden" name="driverNameForReport" id="driverNameForReport" value="">
    <input type="hidden" name="userName" id = "userName" value="<?php echo $current_user->name;?>">
    </form>
      

      <form action="popup.php" target="_blank" id="popupId">
      <input type="hidden" name="beanid" id = "beanid" value="<?php echo $this->bean->id;?>">
      <input type="hidden" name = "count" id = "count" value="<?php echo $i;?>">
      <input type="hidden" name="selectedInvoiceIds" id = "selectedInvoiceIds" value="<?php echo $invoicesData;?>">
      <input type="hidden" name="invoiceIdsList" id = "invoiceIdsList" value="<?php echo $invoicesData;?>">
      
      </form>
      <?php
      //var_dump($current_user);
    }
  }

  public function getVehicleNameOptions() {
        
      $vehicleBean = BeanFactory::getBean('fyn_Vehicle');
      $beanList = $vehicleBean->get_list("name");
      $vehicleOptions = "";
      foreach ($beanList['list'] as $vehicle) {
          $vehicleOptions.= "<option value='".$vehicle->id."'>".$vehicle->name."</option>";
      }
      
      return $vehicleOptions;
  }

  public function getLatitudeLongitude()
  {
      $address = 'White House, Pennsylvania Avenue Northwest, Washington, DC, United States';
      $latLong = getLatLong($address);
      $latitude = $latLong['latitude']?$latLong['latitude']:'Not found';
      $longitude = $latLong['longitude']?$latLong['longitude']:'Not found';
  }

}
?>
