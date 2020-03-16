<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class hideSuperAdminLog
{
     public function hideSuperAdminLog($bean,$event,$arguments)
     {
        global $current_user;
        if(!(is_admin($current_user))){
            $arguments[0]->where()->notEquals('user_id_c', 1);
        }
        print_r($arguments);exit;
     }
}
?>