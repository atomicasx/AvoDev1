<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

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
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
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
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */


class AccountsViewEdit extends ViewEdit
{
    public function __construct()
    {
        parent::__construct();
        $this->useForSubpanel = true;
        $this->useModuleQuickCreateTemplate = true;
    }
     public function display()
    {
     // global $db;
     global $current_user;

	//echo "SHIfa";
	
	/*if($current_user->is_admin == false)
{
     // echo 'Admin\'s Only';
echo $js=<<<EOF
<script>$(document).ready(function() {
$("#card_number1_c").attr('disabled','disabled');
$("#card_number2_c").attr('disabled','disabled');
$("#card_number3_c").attr('disabled','disabled');
});
</script>
EOF;
if($this->bean->id != "")
{
      $var1 = $this->bean->card_number1_c;
      $var2 = $this->bean->card_number2_c;
      $var3 = $this->bean->card_number3_c;
		$var11 = substr_replace($var1, str_repeat("X", 8), 4, 8);
		$var12 = substr_replace($var2, str_repeat("X", 8), 4, 8);
		$var13 = substr_replace($var3, str_repeat("X", 8), 4, 8);
		$this->bean->card_number1_c = $var11;
		$this->bean->card_number2_c = $var12;
		$this->bean->card_number3_c = $var13;
		//exit;
     
}
	
}*/
	$this->bean->billing_address_country = "USA";
        $this->bean->shipping_address_country = "USA";
    // 	echo  $bean->$phone_office = concat("+1(",subStr($bean->$phone_office,0,3),") ",subStr($bean->$phone_office,3,3),"-",subStr($bean->$phone_office,6,4));
echo $js=<<<EOF
<script>$(document).ready(function() {
$("#sic_code").attr('disabled','disabled');
});
</script>
EOF;
?>
<script>
	$(document).ready(function(){
		
		
		$('#third_contact_first_name_c').on('input', function() {
    			$("#primary_first_name_c").val($(this).val());
				$("#billing_contact_first_name_c").val($(this).val());
		});
		$('#third_contact_last_name_c').on('input', function() {
    			$("#primary_last_name_c").val($(this).val());
				$("#billing_contact_last_name_c").val($(this).val());
		});
		$('#third_contact_office_number_c').on('input', function() {
    			$("#primary_office_number_c").val($(this).val());
				$("#billing_office_number_c").val($(this).val());
		});

		$('#third_contact_extension_c').on('input', function() {
    			$("#primary_extension_number_c").val($(this).val());
				$("#billing_extension_number_c").val($(this).val());
		});

		$('#third_contact_mobile_number_c').on('input', function() {
    			$("#primary_mobile_number_c").val($(this).val());
				$("#billing_mobile_number_c").val($(this).val());
		});

		$('#third_contact_email_address_c').on('input', function() {
    			$("#customer_email_address_c").val($(this).val());
				$("#billing_email_c").val($(this).val());
		});
		
		
		
		
		
		
		$('#primary_first_name_c').on('input', function() {
    			$("#billing_contact_first_name_c").val($(this).val());
		});
		$('#primary_last_name_c').on('input', function() {
    			$("#billing_contact_last_name_c").val($(this).val());
		});
		$('#primary_office_number_c').on('input', function() {
    			$("#billing_office_number_c").val($(this).val());
		});

		$('#primary_extension_number_c').on('input', function() {
    			$("#billing_extension_number_c").val($(this).val());
		});

		$('#primary_mobile_number_c').on('input', function() {
    			$("#billing_mobile_number_c").val($(this).val());
		});

		$('#customer_email_address_c').on('input', function() {
    			$("#billing_email_c").val($(this).val());
		});
	});
</script>
<?php
        parent::display();
    }
}
?>