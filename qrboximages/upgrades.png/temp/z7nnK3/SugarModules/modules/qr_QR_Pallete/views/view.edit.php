<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2017 SalesAgility Ltd.
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


if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}


require_once('include/EditView/EditView2.php');

class qr_QR_PalleteViewEdit extends ViewEdit
{
    /**
     * @var EditView $ev
     */
    public $ev;

    /**
     * @inheritdoc
     */
    public $type = 'edit';

    /**
     * @var boolean $useForSubpanel determine whether view can be used for subpanel creates
     */
    public $useForSubpanel = false;

    /**
     * @var boolean to determine whether or not SubpanelQuickCreate has a separate display function
     */
    public $useModuleQuickCreateTemplate = false;

    /**
     * @var boolean used to passed showTitle to $ev used for backwards compatibility
     */
    public $showTitle = true;

    /**
     * ViewEdit constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
  
    public function preDisplay()
    {
        $metadataFile = $this->getMetaDataFile();
        $this->ev = $this->getEditView();
        $this->ev->ss =& $this->ss;
        $this->ev->setup($this->module, $this->bean, $metadataFile);
    }

    /**
     * @inheritdoc
     */
    public function display()
    {
    	  global $db;
        $this->ev->process();
        echo $this->ev->display($this->showTitle);
        $id = $this->bean->id;
       if(($id !="") && ($this->bean->status_c == 'Approve_And_Generate')) 
{
echo $js=<<<EOF
<script>
$(document).ready(function() {
	var draft = "Draft";
	$("#status_c option[value=" + draft + "]").hide();
$("#vehicle_number_c").attr('disabled','disabled');
$("#farm_c").attr('disabled','disabled');
$("#class1_box_28_c").attr('disabled','disabled');
$("#class1_box_32_c").attr('disabled','disabled');
$("#class1_box_36_c").attr('disabled','disabled');
$("#class1_box_40_c").attr('disabled','disabled');
$("#class1_total_c").attr('disabled','disabled');
$("#class1_box_48_c").attr('disabled','disabled');
$("#class1_box_60_c").attr('disabled','disabled');
$("#class1_box_70_c").attr('disabled','disabled');
$("#class1_box_84_c").attr('disabled','disabled');
$("#class2_box_28_c").attr('disabled','disabled');
$("#class2_box_32_c").attr('disabled','disabled');
$("#class2_box_36_c").attr('disabled','disabled');
$("#class2_box_40_c").attr('disabled','disabled');
$("#driver_name_c").attr('disabled','disabled');
$("#class2_total_c").attr('disabled','disabled');
$("#class2_box_48_c").attr('disabled','disabled');
$("#class2_box_60_c").attr('disabled','disabled');
$("#class2_box_70_c").attr('disabled','disabled');
$("#class2_box_84_c").attr('disabled','disabled');
$("#organic_box_28_c").attr('disabled','disabled');
$("#organic_box_32_c").attr('disabled','disabled');
$("#organic_box_36_c").attr('disabled','disabled');
$("#organic_box_40_c").attr('disabled','disabled');
$("#organic_total_c").attr('disabled','disabled');
$("#organic_box_48_c").attr('disabled','disabled');
$("#organic_box_60_c").attr('disabled','disabled');
$("#organic_box_70_c").attr('disabled','disabled');
$("#organic_box_84_c").attr('disabled','disabled');

});
</script>
EOF;
}

if(($id !="") && ($this->bean->status_c == 'Stock_Received')) 
{
echo $js=<<<EOF
<script>
$(document).ready(function() {
	var draft = "Draft";
	var approve = "Approve_And_Generate";
	$("#status_c option[value=" + draft + "]").hide();
	$("#status_c option[value=" + approve + "]").hide();
$("#vehicle_number_c").attr('disabled','disabled');
$("#farm_c").attr('disabled','disabled');
$("#class1_box_28_c").attr('disabled','disabled');
$("#class1_box_32_c").attr('disabled','disabled');
$("#class1_box_36_c").attr('disabled','disabled');
$("#class1_box_40_c").attr('disabled','disabled');
$("#class1_total_c").attr('disabled','disabled');
$("#class1_box_48_c").attr('disabled','disabled');
$("#class1_box_60_c").attr('disabled','disabled');
$("#class1_box_70_c").attr('disabled','disabled');
$("#class1_box_84_c").attr('disabled','disabled');
$("#class2_box_28_c").attr('disabled','disabled');
$("#class2_box_32_c").attr('disabled','disabled');
$("#class2_box_36_c").attr('disabled','disabled');
$("#class2_box_40_c").attr('disabled','disabled');
$("#driver_name_c").attr('disabled','disabled');
$("#class2_total_c").attr('disabled','disabled');
$("#class2_box_48_c").attr('disabled','disabled');
$("#class2_box_60_c").attr('disabled','disabled');
$("#class2_box_70_c").attr('disabled','disabled');
$("#class2_box_84_c").attr('disabled','disabled');
$("#organic_box_28_c").attr('disabled','disabled');
$("#organic_box_32_c").attr('disabled','disabled');
$("#organic_box_36_c").attr('disabled','disabled');
$("#organic_box_40_c").attr('disabled','disabled');
$("#organic_total_c").attr('disabled','disabled');
$("#organic_box_48_c").attr('disabled','disabled');
$("#organic_box_60_c").attr('disabled','disabled');
$("#organic_box_70_c").attr('disabled','disabled');
$("#organic_box_84_c").attr('disabled','disabled');

});
</script>
EOF;
}


    }
}

