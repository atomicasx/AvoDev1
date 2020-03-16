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
  'fyn_stock_in_modified_user' => 
  array (
    'id' => '13053c5f-87dd-baee-3099-5ceacfc3b5fd',
    'relationship_name' => 'fyn_stock_in_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_Stock_In',
    'rhs_table' => 'fyn_stock_in',
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
  'fyn_stock_in_created_by' => 
  array (
    'id' => '194b7593-257d-d1a3-058b-5ceacf9dcff0',
    'relationship_name' => 'fyn_stock_in_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_Stock_In',
    'rhs_table' => 'fyn_stock_in',
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
  'fyn_stock_in_assigned_user' => 
  array (
    'id' => '1eb13a84-4375-961f-f92c-5ceacfa7c0f4',
    'relationship_name' => 'fyn_stock_in_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_Stock_In',
    'rhs_table' => 'fyn_stock_in',
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
  'securitygroups_fyn_stock_in' => 
  array (
    'id' => '240c2cf6-a87a-b31d-7465-5ceacfce4a3a',
    'relationship_name' => 'securitygroups_fyn_stock_in',
    'lhs_module' => 'SecurityGroups',
    'lhs_table' => 'securitygroups',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_Stock_In',
    'rhs_table' => 'fyn_stock_in',
    'rhs_key' => 'id',
    'join_table' => 'securitygroups_records',
    'join_key_lhs' => 'securitygroup_id',
    'join_key_rhs' => 'record_id',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => 'module',
    'relationship_role_column_value' => 'fyn_Stock_In',
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
  'fyn_qr_code_pallette_fyn_stock_in_1' => 
  array (
    'id' => '29d4f4f5-3782-1a55-fe3a-5ceacf2e1d76',
    'relationship_name' => 'fyn_qr_code_pallette_fyn_stock_in_1',
    'lhs_module' => 'fyn_QR_CODE_PALLETTE',
    'lhs_table' => 'fyn_qr_code_pallette',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_Stock_In',
    'rhs_table' => 'fyn_stock_in',
    'rhs_key' => 'id',
    'join_table' => 'fyn_qr_code_pallette_fyn_stock_in_1_c',
    'join_key_lhs' => 'fyn_qr_code_pallette_fyn_stock_in_1fyn_qr_code_pallette_ida',
    'join_key_rhs' => 'fyn_qr_code_pallette_fyn_stock_in_1fyn_stock_in_idb',
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
  'aos_products_fyn_stock_in_1' => 
  array (
    'id' => 'd07a46ef-fc33-1c2b-119c-5ceacfe458b1',
    'relationship_name' => 'aos_products_fyn_stock_in_1',
    'lhs_module' => 'AOS_Products',
    'lhs_table' => 'aos_products',
    'lhs_key' => 'id',
    'rhs_module' => 'fyn_Stock_In',
    'rhs_table' => 'fyn_stock_in',
    'rhs_key' => 'id',
    'join_table' => 'aos_products_fyn_stock_in_1_c',
    'join_key_lhs' => 'aos_products_fyn_stock_in_1aos_products_ida',
    'join_key_rhs' => 'aos_products_fyn_stock_in_1fyn_stock_in_idb',
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
    'id' => 'ede17701-db5c-d0eb-32f5-5ceacff8843e',
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
  'fyn_stock_in_fyn_qr_code_boxes_1' => 
  array (
    'rhs_label' => 'QR Code Boxes',
    'lhs_label' => 'Stock In',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'fyn_Stock_In',
    'rhs_module' => 'fyn_QR_CODE_BOXES',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'fyn_stock_in_fyn_qr_code_boxes_1',
  ),
);