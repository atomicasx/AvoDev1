<?php
$module_name = 'kms_invoice_payments';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="assigned_user_id" value="{$fields.assigned_user_id.value}">',
          1 => '<input type="hidden" id="is_popup" value="{$IS_POPUP}">',
        ),
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/kms_invoice_payments/js/EditView.js',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'amount',
            'label' => 'LBL_AMOUNT',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'aos_invoices_name',
            'studio' => 'visible',
            'label' => 'LBL_AOS_INVOICES_NAME',
          ),
          1 => 
          array (
            'name' => 'payment_type',
            'studio' => 'visible',
            'label' => 'LBL_PAYMENT_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_recieved',
            'label' => 'LBL_DATE_RECIEVED',
          ),
          1 => 
          array (
            'name' => 'amount_received',
            'label' => 'LBL_AMOUNT_RECEIVED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'cheque_number',
            'label' => 'LBL_CHEQUE_NUMBER',
          ),
        ),
      ),
    ),
  ),
);
;
?>
