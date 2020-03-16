<?php
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

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/Dashlets/DashletGeneric.php');
require_once('modules/user_userloginlog/user_userloginlog.php');

class user_userloginlogDashlet extends DashletGeneric {
    function __construct($id, $def = null)
    {
        //echo "I am Here....";exit;
        global $current_user, $app_strings;
        require('modules/user_userloginlog/metadata/dashletviewdefs.php');

        parent::__construct($id, $def);

        if (empty($def['title'])) {
            $this->title = translate('LBL_HOMEPAGE_TITLE', 'user_userloginlog');
        }

        $this->searchFields = $dashletData['user_userloginlogDashlet']['searchFields'];
        $this->columns = $dashletData['user_userloginlogDashlet']['columns'];

        $this->seedBean = new user_userloginlog();        
    }

    public function process($lvsParams = array(), $id = null)
    {
        global $current_user;
        global $db;

         if(!$current_user->is_admin)
        {
            $notAdminSQL = "select * from users where is_admin=1";

            $res = $db->query($notAdminSQL);

            $cnt = $res->num_rows;
            if($cnt > 0)
            {
                $userIds = [];
                while ($row = $db->fetchByAssoc($res)) {
                    # code...
                    $userIds[] = $row['id'];
                }
                $userIdsStr = implode("','", $userIds);
                 
                 
                if(isset($lvsParams['custom_where'])){
                    $lvsParams['custom_where'].=" AND (user_userloginlog_cstm.user_id_c NOT IN ('".$userIdsStr."'))";
                }else {
                    $lvsParams['custom_where'].= " AND (user_userloginlog_cstm.user_id_c NOT IN ('".$userIdsStr."'))";
                }
                    
                 //$this->params['custom_where'] =" AND (user_userloginlog_cstm.user_id_c NOT IN ('".$userIdsStr."'))";
            }
        }

        /*if (isset($this->displayColumns) && array_search('email1', $this->displayColumns) !== false) {
            $lvsParams['custom_select'] = ', email_address as email1';
            $lvsParams['custom_from'] = ' LEFT JOIN email_addr_bean_rel eabr ON eabr.deleted = 0 AND bean_module = \'Accounts\''
                                      . ' AND eabr.bean_id = accounts.id AND primary_address = 1'
                                      . ' LEFT JOIN email_addresses ea ON ea.deleted = 0 AND ea.id = eabr.email_address_id';
        }*/

        /*if (isset($this->displayColumns) && array_search('parent_name', $this->displayColumns) !== false) {
            $lvsParams['custom_select'] = empty($lvsParams['custom_select']) ? ', a1.name as parent_name ' : $lvsParams['custom_select'] . ', a1.name as parent_name ';
            $lvsParams['custom_from'] = empty($lvsParams['custom_from']) ? ' LEFT JOIN accounts a1 on a1.id = accounts.parent_id' : $lvsParams['custom_from'] . ' LEFT JOIN accounts a1 on a1.id = accounts.parent_id';
        }*/

        //echo $lvsParams['custom_where'];

        parent::process($lvsParams);
    }
}
