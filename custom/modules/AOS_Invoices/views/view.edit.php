<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/MVC/View/views/view.edit.php');

class AOS_InvoicesViewEdit extends ViewEdit
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    public function AOS_InvoicesViewEdit()
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
    //Custom code by sawood to fetch commission amount dont delete the file getcommission in root folder
         ?>
        <script>
        $( document ).ready(function(){
        $('#sales_commission_user_c').on('blur', function(){
            //populatecommissionamount();
        });
         $('#btn_sales_commission_user_c').on('blur', function(){
            //populatecommissionamount();
        });

        function populatecommissionamount(){
            var userid = $('#user_id_c').val();
            if(userid!=""){
                $.ajax({
                    url: "getcommission.php",
                    type: "POST",
                    async: true,
                    data: {'userid':userid},
                    success: function (response) {
                       $('#commission_amount_c').val(response.trim());
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log("sawood says:"+textStatus, errorThrown);
                    }
                });
            }
        }
        });
     </script>
     <script>
	$(document).ready(function(){
		$("#total_amt").attr('readonly','readonly');
		$("#discount_amount").attr('readonly','readonly');
		$("#tax_amount").attr('readonly','readonly');
		$("#subtotal_amount").attr('readonly','readonly');
		$("#total_amount").attr('readonly','readonly');
	});
</script>
   
    <?php
     //custom code ends
    	  if($this->bean->id != "")
    	  {
            //echo $this->bean->user_id_c;
            //$currentbean = BeanFactory::getBean('AOS_Invoices', $this->bean->user_id_c);
           // echo $currentbean->
        //     $commissionuserbean = BeanFactory::getBean('Users', $bean->user_id_c);
        // $this->$bean->commission_amount_c = $commissionuserbean->commision_rate_c;
    	  	//echo "SHifa";
    	  	$arr = array();
    	  	$array = array();
    	  	$i =0;$j=0;
    	  	$sql = "SELECT product_id, name FROM aos_products_quotes WHERE deleted='0' AND parent_id='".$this->bean->id."'";
         $res = $this->bean->db->query($sql);
         while ($row = $this->bean->db->fetchByAssoc($res)) {
        	$product_id = $row['product_id'];
        	$sql1 = "SELECT opencartbalancestock_c,balance_c FROM aos_products_cstm WHERE id_c ='".$product_id."'";
        	$res1 = $this->bean->db->query($sql1);
			$row1 = $this->bean->db->fetchByAssoc($res1);
			//echo $open_balance = $row1['opencartbalancestock_c'];
			$arr[$i] =  $row1['opencartbalancestock_c'];
			
			$sql2 = "SELECT name FROM aos_products WHERE id ='".$product_id."'";
        	$res2 = $this->bean->db->query($sql2);
			$row2 = $this->bean->db->fetchByAssoc($res2);
			$array[$j] = $row2['name'];
			$i++;
			$j++;
			
			}
			//print_r($arr);
			$length = count($arr);
			$i=0;$j = 0;
			//for($i=0 ; $i<$length; $i++){
			$this->bean->item1_c = $array[$j].'         '.$arr[$i];
			$this->bean->item2_c = $array[$j+1].'         '.$arr[$i+1];
			$this->bean->item3_c = $array[$j+2].'        '.$arr[$i+2];
			$this->bean->item4_c = $array[$j+3].'         '.$arr[$i+3];
			$this->bean->item5_c = $array[$j+4].'         '.$arr[$i+4];
			$this->bean->item6_c = $array[$j+5].'         '.$arr[$i+5];
			$this->bean->item7_c = $array[$j+6].'         '.$arr[$i+6];
			$this->bean->item8_c = $array[$j+7].'         '.$arr[$i+7];
			$this->bean->item9_c = $array[$j+8].'         '.$arr[$i+8];
			$this->bean->item10_c = $array[$j+9].'         '.$arr[$i+9];
			$this->bean->item11_c = $array[$j+10].'         '.$arr[$i+10];
			$this->bean->item12_c = $array[$j+11].'         '.$arr[$i+11];
			$this->bean->item13_c = $array[$j+12].'         '.$arr[$i+12];
			$this->bean->item14_c = $array[$j+13].'         '.$arr[$i+13];
			$this->bean->item15_c = $array[$j+14].'         '.$arr[$i+14];
			if($arr[$i] <= 0) 
		{ //css("color", "red");css({'background-color':'red'} );
echo $js=<<<EOF
<script>
$(document).ready(function() {	
$("#item1_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+1] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item2_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+2] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item3_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+3] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item4_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+4] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item5_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+5] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item6_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+6] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item7_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+7] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item8_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+8] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item9_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+9] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item10_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+10] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item11_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+11] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item12_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+12] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item13_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+13] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item14_c").css("color", "red");
});
</script>
EOF;
}
if($arr[$i+14] <= 0){
echo $js=<<<EOF
<script>
$(document).ready(function() {
$("#item15_c").css("color", "red");
});
</script>
EOF;
}
}
        $this->populateInvoiceTemplates();
        parent::display();
    }

    public function populateInvoiceTemplates()
    {
        global $app_list_strings;

        $sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted='0' AND type='AOS_Invoices'";
        $res = $this->bean->db->query($sql);

        $app_list_strings['template_ddown_c_list'] = array();
        while ($row = $this->bean->db->fetchByAssoc($res)) {
            $app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
        }
    }
}
