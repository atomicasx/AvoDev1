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
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
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
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

require_once('include/MVC/View/views/view.list.php');
class user_userloginlogViewList extends ViewList {


	/**
     * Display View
     */
    public function display()
    {
        
        if (!$this->bean || !$this->bean->ACLAccess('list')) {
            ACLController::displayNoAccess();
        } else {
            if(empty($_REQUEST['orderBy'])) {
 
            $_REQUEST['orderBy'] = strtoupper('date_modified');
            $this->params['overrideOrder'] = true;
            $_REQUEST['sortOrder'] = 'DESC';
        }
            $this->listViewPrepare();
            $this->listViewProcess();
            
//echo $this->where;
        }
    }


public function listViewProcess() {
        global $current_user;
        $this->processSearchForm();
       global $db;
        //global $current_user;
    	//echo "shifa";
        

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
	        	 
	        	 
	        		if(isset($this->where)){
	        				$this->where.=" AND (user_userloginlog_cstm.user_id_c NOT IN ('".$userIdsStr."'))";
	        		}else {
	        				$this->where.= " (user_userloginlog_cstm.user_id_c NOT IN ('".$userIdsStr."'))";
	        		}
	        		
	        	 //$this->params['custom_where'] =" AND (user_userloginlog_cstm.user_id_c NOT IN ('".$userIdsStr."'))";
	        }
        }
      
        if (empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false) {
        	//echo "In If condition..";
            $this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
            $savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
            echo $this->lv->display();
        }
    }

    //public $type ='list';
   /* public function display()
    {
		$this->listViewPrepare();
		$this->listViewProcess();
    }

    public function listViewProcess() {
        global $current_user;
        global $db;
        $this->processSearchForm();
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
	        	 
	        		$this->where.= " AND user_userloginlog_cstm.user_id_c NOT IN ('".$userIdsStr."')";
	        		echo $this->where;
	        	 
	        }
        }

         $this->lv->searchColumns = $this->searchForm->searchColumns;
        
        if(!$this->headers)
            return;
            
        if(empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false)
        {
        	echo "I am Here...";
            $this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
            $savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
            echo get_form_header($GLOBALS['mod_strings']['LBL_LIST_FORM_TITLE'] . $savedSearchName, '', false);
            echo $this->lv->display();
        }
    }*/
}
?>