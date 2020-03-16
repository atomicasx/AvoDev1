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
$relationships = array (
  'fyn_qr_code_boxes_modified_user' => 
  array (
    'id' => '609b80ec-8fc8-a81c-fa75-5c051ae50dc7',
    'relationship_name' => 'fyn_qr_code_boxes_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_QR_CODE_BOXES',
    'rhs_table' => 'fyn_qr_code_boxes',
    'rhs_key' => 'modified_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'fyn_qr_code_boxes_created_by' => 
  array (
    'id' => '60da05ed-7a95-f439-bd24-5c051a7e74c5',
    'relationship_name' => 'fyn_qr_code_boxes_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_QR_CODE_BOXES',
    'rhs_table' => 'fyn_qr_code_boxes',
    'rhs_key' => 'created_by',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'fyn_qr_code_boxes_assigned_user' => 
  array (
    'id' => '60f42a27-8f43-832d-b296-5c051af161db',
    'relationship_name' => 'fyn_qr_code_boxes_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_QR_CODE_BOXES',
    'rhs_table' => 'fyn_qr_code_boxes',
    'rhs_key' => 'assigned_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'securitygroups_fyn_qr_code_boxes' => 
  array (
    'id' => '610dc5d4-ec93-e5de-b6c3-5c051a1fc00f',
    'relationship_name' => 'securitygroups_fyn_qr_code_boxes',
    'lhs_module' => 'SecurityGroups',
    'lhs_table' => 'securitygroups',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_QR_CODE_BOXES',
    'rhs_table' => 'fyn_qr_code_boxes',
    'rhs_key' => 'id',
    'join_table' => 'securitygroups_records',
    'join_key_lhs' => 'securitygroup_id',
    'join_key_rhs' => 'record_id',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => 'module',
    'relationship_role_column_value' => 'fyn_QR_CODE_BOXES',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'aos_products_fyn_qr_code_boxes_1' => 
  array (
    'id' => '6c42cf0e-38ea-ce8d-7b22-5c051a285bb6',
    'relationship_name' => 'aos_products_fyn_qr_code_boxes_1',
    'lhs_module' => 'AOS_Products',
    'lhs_table' => 'aos_products',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_QR_CODE_BOXES',
    'rhs_table' => 'fyn_qr_code_boxes',
    'rhs_key' => 'id',
    'join_table' => 'aos_products_fyn_qr_code_boxes_1_c',
    'join_key_lhs' => 'aos_products_fyn_qr_code_boxes_1aos_products_ida',
    'join_key_rhs' => 'aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'fyn_qr_code_boxes_fyn_stock_out_1' => 
  array (
    'id' => '6cfaa6a6-eba3-0183-c17f-5c051a137eaa',
    'relationship_name' => 'fyn_qr_code_boxes_fyn_stock_out_1',
    'lhs_module' => 'fyn_QR_CODE_BOXES',
    'lhs_table' => 'fyn_qr_code_boxes',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_Stock_out',
    'rhs_table' => 'fyn_stock_out',
    'rhs_key' => 'id',
    'join_table' => 'fyn_qr_code_boxes_fyn_stock_out_1_c',
    'join_key_lhs' => 'fyn_qr_code_boxes_fyn_stock_out_1fyn_qr_code_boxes_ida',
    'join_key_rhs' => 'fyn_qr_code_boxes_fyn_stock_out_1fyn_stock_out_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'fyn_qr_code_pallette_fyn_qr_code_boxes_1' => 
  array (
    'id' => '6db35920-588d-548b-5c84-5c051a665af3',
    'relationship_name' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1',
    'lhs_module' => 'fyn_QR_CODE_PALLETTE',
    'lhs_table' => 'fyn_qr_code_pallette',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_QR_CODE_BOXES',
    'rhs_table' => 'fyn_qr_code_boxes',
    'rhs_key' => 'id',
    'join_table' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1_c',
    'join_key_lhs' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida',
    'join_key_rhs' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'fyn_qr_code_boxes_fyn_stock_in_1' => 
  array (
    'id' => '6e550231-7013-2a5c-f7db-5c051a716b5e',
    'relationship_name' => 'fyn_qr_code_boxes_fyn_stock_in_1',
    'lhs_module' => 'fyn_QR_CODE_BOXES',
    'lhs_table' => 'fyn_qr_code_boxes',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_Stock_In',
    'rhs_table' => 'fyn_stock_in',
    'rhs_key' => 'id',
    'join_table' => 'fyn_qr_code_boxes_fyn_stock_in_1_c',
    'join_key_lhs' => 'fyn_qr_code_boxes_fyn_stock_in_1fyn_qr_code_boxes_ida',
    'join_key_rhs' => 'fyn_qr_code_boxes_fyn_stock_in_1fyn_stock_in_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'fyn_qr_code_boxes_vs_vehiclestockout_1' => 
  array (
    'rhs_label' => 'Vehicle StockOUT',
    'lhs_label' => 'QR Code Boxes',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'fyn_QR_CODE_BOXES',
    'rhs_module' => 'vs_vehiclestockOUT',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'fyn_qr_code_boxes_vs_vehiclestockout_1',
  ),
);