<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/MVC/View/views/view.detail.php');

class AOS_InvoicesViewDetail extends ViewDetail
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    public function AOS_InvoicesViewDetail()
    {
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if (isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        } else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        self::__construct();
    }


    public function display()
    {
        // $commissionuserbean = BeanFactory::getBean('Users', $bean->user_id_c);
        // $this->$bean->commission_amount_c = $commissionuserbean->commision_rate_c;
        // $currentid = $_REQUEST['record'];
        // $bean = BeanFactory::getBean('AOS_Invoices', $currentid);
        // $bean->load_relationship('aos_invoices_vs_vehiclestockout_1');
        // $bean->
		/* echo '<pre>';
		print_r($this->bean);
		die(); */
		$invoice_num = $this->bean->number;
		$invoice_id = $this->bean->id;
		$invoice_name = $this->bean->name;
		$delivery_status = $this->bean->delivery_status;
		
		/* $sql = "SELECT id, IFNULL(DATEDIFF(CURDATE(),inv_c.due_dates_c),0) as OverdueDays 
				FROM aos_invoices inv LEFT JOIN aos_invoices_cstm inv_c ON inv_c.id_c=inv.id
				WHERE inv.deleted=0 AND `status` != 'Paid' AND inv.id='$invoice_id'";
		$result = $db-> */
		$OverdueStatus = '';		
		if($this->bean->status != 'Paid'){
			//$days = gmdate('Y-m-d') - $this->bean->due_date_c;
			$date1=date_create($this->bean->due_dates_c);
			$date2=date_create(gmdate('Y-m-d'));
			$diff=date_diff($date1,$date2);
			$days = $diff->days;
			$color = '#47d147';
			if($days <= 30){
				$color = '#008000'; //Green
			}else if($days > 30 && $days <= 45){
				$color = '#FFA500'; //Orange
			}else if($days > 45 && $days <= 60){
				$color = '#FF0000'; // Red
			}else if($days > 60){
				$color = '#B22222'; // Dark Red
			}
				
			$OverdueStatus = $diff->days . ' Days';
		}
		$this->ss->assign('OverdueStatus', $OverdueStatus);
		$this->ss->assign('Color', $color);
            ?>
<style>
            #signature{
                width: 100%;
                height: 20%;
                border: 1px solid black;
            }
        </style>
       
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
            <script type="text/javascript">
                 
            $(document).ready(function(){
                rec = "<?php echo $_REQUEST['record']; ?>";
                invoice_num = "<?php echo $invoice_num; ?>";
                invoice_id = "<?php echo $invoice_id; ?>";
                invoice_name = "<?php echo $invoice_name; ?>";
                delivery_status = "<?php echo $delivery_status; ?>";
				UpdateDeliveryStatus(delivery_status);
				// console.log(invoice_id);
				// console.log(invoice_name);
                /* $('#but').on('click',function(){
                    scanwindow = window.open("scanner-new.php?record="+rec,"_blank","width=500,height=500");
                    // $('#preview').css('display','');
                    // let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                    // scanner.addListener('scan', function (content) {
                    //     var code=content;
                    //     $('div [field="description"]').html(code);
                    //     $('#preview').css('display','none');
                    //     scanner.stop();
                    // });
                    // Instascan.Camera.getCameras().then(function (cameras) {
                    //     console.log(cameras);
                    //     console.log(cameras.length);
                    // if(cameras.length > 1){
                    //     scanner.start(cameras[1]);
                    // }
                    // else if(cameras.length > 0){
                    //     scanner.start(cameras[0]);
                    // }
                    // else {
                    //     console.error('No cameras found.');
                    // }
                    // }).catch(function (e) {
                    // console.error(e);
                    // });
                 }); */
                $('#digitalSign').on('click',function(){
                    scanwindow = window.open("digitalSign.php?type=confirm&record="+rec,"_blank","width=550,height=600");
                });
				$('#ConfirmdigitalSign').on('click',function(){
                    scanwindow = window.open("digitalSign.php?type=cancel&record="+rec,"_blank","width=550,height=600");
                });
				$('#driverSign').on('click',function(){
                    scanwindow = window.open("driverSign.php?record="+rec,"_blank","width=550,height=600");
                });
				//https://atomicsx-dev1.com/asx9286/index.php?module=Notes&action=EditView&parent_type=AOS_Invoices&parent_id=756903b7-08fd-7d40-33dc-5e28b92dd63b&parent_name=1276-6-LARRY+H+PARKER
				/* $('#addNoteBtn').on('click',function(){
                    scanwindow = window.open("index.php?module=Notes&action=EditView&parent_type=AOS_Invoices&parent_id="+invoice_id+"&parent_name="+invoice_name,"_blank","width=550,height=600");
                }); */
				$('#addPayment').on('click',function(){
                    // scanwindow = window.open("index.php?module=kms_invoice_payments&action=EditView&name="+invoice_num+"&aos_invoices_id="+invoice_id+"&aos_invoices_name="+invoice_name,"_blank","width=850,height=700");
                    scanwindow = window.open("index.php?module=kms_invoice_payments&action=EditView&invoices_id="+invoice_id,"_blank","width=850,height=700");
                });
				
            }) ;
			function addNote(){
				scanwindow = window.open("index.php?module=Notes&action=EditView&parent_type=AOS_Invoices&parent_id="+invoice_id+"&parent_name="+invoice_name,"_blank","width=550,height=600");
			}
			function ScanQRBoxes(){
				scanwindow = window.open("scanner-new.php?record="+rec,"_blank","width=500,height=500");
			}
			function SaveDeliveryStatus(deliveryStatus){
				$.ajax({
					url: "index.php?module=AOS_Invoices&action=SaveDeliveryStatus",
					type: "POST",
					data: {'deliveryStatus':deliveryStatus, 'invoice_id':invoice_id},
					success: function (response) {
						if(response) {
						window.opener.location.reload(true);
												window.close();
											}else {
						$('#code').html("error occured in db operations");
										}
					},
					error: function(jqXHR, textStatus, errorThrown) {
					   $('#code').html(textStatus, errorThrown);
					}
				});
			}
			//// Possible Statuses : customer_present,customer_not_present,cancelled
			function UpdateDeliveryStatus(deliveryStatus){
				if(deliveryStatus == 'customer_present'){ 
					$('#deliveryStatusBtn').hide();
					$('#customer_prsent_div').show();
					SaveDeliveryStatus(deliveryStatus);
				}else if(deliveryStatus == 'customer_not_present'){
					$('#deliveryStatusBtn').hide();
					$('#customer_not_prsent_div').show();
					SaveDeliveryStatus(deliveryStatus);
				}else if(deliveryStatus == 'cancelled'){
					$('#deliveryStatusBtn').hide();
					$('#customer_cancelled_div').show();
					SaveDeliveryStatus(deliveryStatus);
				}else{
					$('#deliveryStatusBtn').show();
				}
			}
            </script>
			
		<?php if($this->bean->delivery_status == ''){ ?>	
		<div id="deliveryStatusBtn" style="display:none">	
			<input id="customer_present" type="button" value="Customer Present" onclick="UpdateDeliveryStatus('customer_present');"/>
			<input id="customer_not_present" type="button" value="Customer Not Present" onclick="UpdateDeliveryStatus('customer_not_present');"/>
			<input id="customer_cancelled" type="button" value="Cancelled" onclick="UpdateDeliveryStatus('cancelled');"/>
		</div>
		<?php  } ?>
        <div id="customer_prsent_div" style="display:none"> 
			<input id="ScanQR" type="button" value="scanQR" onclick="ScanQRBoxes();"/>
			<?php 
			 if($this->bean->status == 'Unpaid'){
				echo '<input id="addPayment" type="button" value="Add Payment" />';
			 }
			 ?>
			<input id="digitalSign" type="button" value="Digital Signature"/>
			<input id="addNoteBtn" type="button" value="Add Note" onclick="addNote()"/>
		</div> 
		<div id="customer_not_prsent_div" style="display:none"> 
			<input id="ScanQR" type="button" value="scanQR" onclick="ScanQRBoxes();"/>
			<!-- <input id="addPayment" type="button" value="Add Payment" /> -->
			<input id="driverSign" type="button" value="Driver Signature"/>
			<input id="addNoteBtn" type="button" value="Add Note" onclick="addNote()"/>
		</div> 
		<div id="customer_cancelled_div" style="display:none"> 
			<input id="ConfirmdigitalSign" type="button" value="Cancel Order"/>
			<input id="addNoteBtn" type="button" value="Add Note" onclick="addNote()"/>
		</div> 
		
		 
        <!--  <input id="digitalSign" type="button" value="Digital Signature"/> -->
       <!--   <video id="preview" style="display:none;"></video>  -->
		
       
    <?php



    	 if($this->bean->item1_c <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item1_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item2_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item2_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item3_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item3_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item4_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item4_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item5_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item5_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item6_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item6_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item7_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item7_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item8_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item8_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item9_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item9_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item10_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item10_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item11_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item11_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item12_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item12_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item13_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item13_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item14_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item14_c").css("color", "red");
});
</script>
EOF;
}
if($this->bean->item15_c <= 0){
 echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item15_c").css("color", "red");
});
</script>
EOF;
}
        $this->populateInvoiceTemplates();
        $this->displayPopupHtml();
        parent::display();
		//customer_present,cancelled
		
		if($this->bean->delivery_status == 'customer_present'){
			$img = $this->bean->signature_c;
			echo "Print Full Name : ".$this->bean->print_name_c;
			echo '<br>';
			echo "Payment Details : ".$this->bean->payment_confirm_c;
			echo "<h3>Customer Signature : </h3>";
			echo "<img src='$img' id='sign_prev' style='display: block;' />";
		}else if($this->bean->delivery_status == 'cancelled'){
			$img = $this->bean->signature_c;
			echo "Order Cancelled By Customer";
			echo '<br>';
			echo "Print Full Name : ".$this->bean->print_name_c;
			echo "<h3>Customer Signature : </h3>";
			echo "<img src='$img' id='sign_prev' style='display: block;' />";
			
		}else if($this->bean->delivery_status == 'customer_not_present'){
			$img = $this->bean->driver_signature_c;
			echo "<h3>Customer Was Not On Site</h3>";
			echo '<br>';
			echo "Print Driver Full Name : ".$this->bean->driver_print_name_c;
			echo "<h3>Driver Signature : </h3>";
			echo "<img src='$img' id='sign_prev' style='display: block;' />";
		}
        ?>
       
        
        
        
    <?PHP
       
    }

    public function populateInvoiceTemplates()
    {
        global $app_list_strings;

        $sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted = 0 AND type='AOS_Invoices' AND active = 1";

        $res = $this->bean->db->query($sql);
        $app_list_strings['template_ddown_c_list'] = array();
        while ($row = $this->bean->db->fetchByAssoc($res)) {
            $app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
        }
    }

    public function displayPopupHtml()
    {
        global $app_list_strings,$app_strings, $mod_strings;
        $templates = array_keys($app_list_strings['template_ddown_c_list']);
        if ($templates) {
            echo '	<div id="popupDiv_ara" style="display:none;position:fixed;top: 39%; left: 41%;opacity:1;z-index:9999;background:#FFFFFF;">
				<form id="popupForm" action="index.php?entryPoint=generatePdf" method="post">
 				<table style="border: #000 solid 2px;padding-left:40px;padding-right:40px;padding-top:10px;padding-bottom:10px;font-size:110%;" >
					<tr height="20">
						<td colspan="2">
						<b>'.$app_strings['LBL_SELECT_TEMPLATE'].':-</b>
						</td>
					</tr>';
            foreach ($templates as $template) {
                $template = str_replace('^', '', $template);
                $js = "document.getElementById('popupDivBack_ara').style.display='none';document.getElementById('popupDiv_ara').style.display='none';var form=document.getElementById('popupForm');if(form!=null){form.templateID.value='".$template."';form.submit();}else{alert('Error!');}";
                echo '<tr height="20">
				<td width="17" valign="center"><a href="#" onclick="'.$js.'"><img src="themes/default/images/txt_image_inline.gif" width="16" height="16" /></a></td>
				<td><b><a href="#" onclick="'.$js.'">'.$app_list_strings['template_ddown_c_list'][$template].'</a></b></td></tr>';
            }
            echo '		<input type="hidden" name="templateID" value="" />
				<input type="hidden" name="task" value="pdf" />
				<input type="hidden" name="module" value="'.$_REQUEST['module'].'" />
				<input type="hidden" name="uid" value="'.$this->bean->id.'" />
				</form>
				<tr style="height:10px;"><tr><tr><td colspan="2"><button style=" display: block;margin-left: auto;margin-right: auto" onclick="document.getElementById(\'popupDivBack_ara\').style.display=\'none\';document.getElementById(\'popupDiv_ara\').style.display=\'none\';return false;">Cancel</button></td></tr>
				</table>
				</div>
				<div id="popupDivBack_ara" onclick="this.style.display=\'none\';document.getElementById(\'popupDiv_ara\').style.display=\'none\';" style="top:0px;left:0px;position:fixed;height:100%;width:100%;background:#000000;opacity:0.5;display:none;vertical-align:middle;text-align:center;z-index:9998;">
				</div>
				<script>
					function showPopup(task){
						var form=document.getElementById(\'popupForm\');
						var ppd=document.getElementById(\'popupDivBack_ara\');
						var ppd2=document.getElementById(\'popupDiv_ara\');
						if('.count($templates).' == 1){
							form.task.value=task;
							form.templateID.value=\''.$template.'\';
							form.submit();
						}else if(form!=null && ppd!=null && ppd2!=null){
							ppd.style.display=\'block\';
							ppd2.style.display=\'block\';
							form.task.value=task;
						}else{
							alert(\'Error!\');
						}
					}
				</script>';
        } else {
            echo '<script>
				function showPopup(task){
				alert(\''.$mod_strings['LBL_NO_TEMPLATE'].'\');
				}
			</script>';
        }
    }
}
