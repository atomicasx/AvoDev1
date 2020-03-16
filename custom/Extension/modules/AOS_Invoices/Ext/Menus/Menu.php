<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
global $current_user;
if ($current_user->is_admin) {
    $module_menu[]=array("index.php?module=AOS_Invoices&action=OutcomeReport", $mod_strings['LBL_OURTCOME_REPORT'],"List", 'AOS_Invoices');
}
