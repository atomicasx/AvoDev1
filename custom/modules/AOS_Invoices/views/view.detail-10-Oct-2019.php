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
            ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
            <script type="text/javascript">
            $(document).ready(function(){
                var rec = "<?php echo $_REQUEST['record']; ?>";
                $('#but').on('click',function(){
                    scanwindow = window.open("scanner.php?record="+rec,"_blank","width=500,height=500");
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
                 });               
            }) ;      
            </script> 
         <input id="but" type='button' value='scanQR'/> 
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
