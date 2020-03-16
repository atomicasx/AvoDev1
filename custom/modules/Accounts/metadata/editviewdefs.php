<?php
$viewdefs ['Accounts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
        ),
      ),
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
        1 => 
        array (
          'file' => 'custom/include/JSPlugins/jquery-input-mask-phone-number.js',
        ),
        2 => 
        array (
          'file' => 'custom/modules/Accounts/js/EditView.js',
        ),
      ),
      'useTabs' => true,
      'tabDefs' => 
      array (
        'LBL_ACCOUNT_INFORMATION' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL8' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL6' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL7' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL4' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL5' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL9' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL10' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 'employees',
          1 => 
          array (
            'name' => 'phone_office',
            'label' => 'LBL_PHONE_OFFICE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'website',
            'type' => 'link',
            'label' => 'LBL_WEBSITE',
          ),
          1 => 
          array (
            'name' => 'phone_fax',
            'label' => 'LBL_FAX',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
          1 => 
          array (
            'name' => 'terms_c',
            'studio' => 'visible',
            'label' => 'LBL_TERMS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
          1 => 
          array (
            'name' => 'shipping_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
              'copy' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'addr_status_c',
            'studio' => 'visible',
            'label' => 'LBL_ADDR_STATUS_C',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'sic_code',
            'comment' => 'SIC code of the account',
            'label' => 'LBL_SIC_CODE',
          ),
          1 => 
          array (
            'name' => 'photo_c',
            'studio' => 'visible',
            'label' => 'LBL_PHOTO',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'customerrating_c',
            'studio' => 'visible',
            'label' => 'LBL_CUSTOMERRATING',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'customerdiscount_c',
            'label' => 'LBL_CUSTOMERDISCOUNT',
          ),
          1 => 'account_status',
        ),
      ),
      'lbl_editview_panel8' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'third_contact_first_name_c',
            'label' => 'LBL_THIRD_CONTACT_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'third_contact_last_name_c',
            'label' => 'LBL_THIRD_CONTACT_LAST_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'third_contact_office_number_c',
            'label' => 'LBL_THIRD_CONTACT_OFFICE_NUMBER',
          ),
          1 => 
          array (
            'name' => 'third_contact_extension_c',
            'label' => 'LBL_THIRD_CONTACT_EXTENSION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'third_contact_mobile_number_c',
            'label' => 'LBL_THIRD_CONTACT_MOBILE_NUMBER',
          ),
          1 => 
          array (
            'name' => 'third_contact_email_address_c',
            'label' => 'LBL_THIRD_CONTACT_EMAIL_ADDRESS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'third_whatsapp_c',
            'label' => 'LBL_THIRD_WHATSAPP',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel6' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'primary_first_name_c',
            'label' => 'LBL_PRIMARY_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'primary_last_name_c',
            'label' => 'LBL_PRIMARY_LAST_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'primary_office_number_c',
            'label' => 'LBL_PRIMARY_OFFICE_NUMBER',
          ),
          1 => 
          array (
            'name' => 'primary_extension_number_c',
            'label' => 'LBL_PRIMARY_EXTENSION_NUMBER',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'primary_mobile_number_c',
            'label' => 'LBL_PRIMARY_MOBILE_NUMBER',
          ),
          1 => 
          array (
            'name' => 'customer_email_address_c',
            'label' => 'LBL_CUSTOMER_EMAIL_ADDRESS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'primary_whatsapp_c',
            'label' => 'LBL_PRIMARY_WHATSAPP',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel7' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'secondary_contact_first_name_c',
            'label' => 'LBL_SECONDARY_CONTACT_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'secondary_contact_last_name_c',
            'label' => 'LBL_SECONDARY_CONTACT_LAST_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'secondary_contact_office_num_c',
            'label' => 'LBL_SECONDARY_CONTACT_OFFICE_NUM',
          ),
          1 => 
          array (
            'name' => 'secondary_contact_extension_c',
            'label' => 'LBL_SECONDARY_CONTACT_EXTENSION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'secondary_contact_mobile_num_c',
            'label' => 'LBL_SECONDARY_CONTACT_MOBILE_NUM',
          ),
          1 => 
          array (
            'name' => 'secondary_contact_email_c',
            'label' => 'LBL_SECONDARY_CONTACT_EMAIL',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'secondary_whatsapp_c',
            'label' => 'LBL_SECONDARY_WHATSAPP',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'billing_contact_first_name_c',
            'label' => 'LBL_BILLING_CONTACT_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'billing_contact_last_name_c',
            'label' => 'LBL_BILLING_CONTACT_LAST_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'billing_office_number_c',
            'label' => 'LBL_BILLING_OFFICE_NUMBER',
          ),
          1 => 
          array (
            'name' => 'billing_extension_number_c',
            'label' => 'LBL_BILLING_EXTENSION_NUMBER',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'billing_mobile_number_c',
            'label' => 'LBL_BILLING_MOBILE_NUMBER',
          ),
          1 => 
          array (
            'name' => 'billing_email_c',
            'label' => 'LBL_BILLING_EMAIL',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'billing_whatsapp_c',
            'label' => 'LBL_BILLING_WHATSAPP',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel5' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'ticker_symbol',
            'comment' => 'The stock trading (ticker) symbol for the company',
            'label' => 'LBL_TICKER_SYMBOL',
          ),
          1 => 'account_type',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'rating',
            'comment' => 'An arbitrary rating for this company for use in comparisons with others',
            'label' => 'LBL_RATING',
          ),
          1 => 'annual_revenue',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'taxexempted_c',
            'studio' => 'visible',
            'label' => 'LBL_TAXEXEMPTED',
          ),
          1 => 
          array (
            'name' => 'comment_c',
            'label' => 'LBL_COMMENT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'comment' => 'Date record last modified',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'reference_1_c',
            'label' => 'LBL_REFERENCE_1',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'reference_2_c',
            'label' => 'LBL_REFERENCE_2',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'reference_3_c',
            'label' => 'LBL_REFERENCE_3',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'card1_c',
            'studio' => 'visible',
            'label' => 'LBL_CARD1',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'owner1_c',
            'label' => 'LBL_OWNER1',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'card_number1_c',
            'label' => 'LBL_CARD_NUMBER1',
          ),
          1 => 
          array (
            'name' => 'ccid1_c',
            'label' => 'LBL_CCID1',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'month1_c',
            'studio' => 'visible',
            'label' => 'LBL_MONTH1',
          ),
          1 => 
          array (
            'name' => 'year1_c',
            'studio' => 'visible',
            'label' => 'LBL_YEAR1',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'add_notes1_c',
            'label' => 'LBL_ADD_NOTES1',
          ),
        ),
      ),
      'lbl_editview_panel9' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'card2_c',
            'studio' => 'visible',
            'label' => 'LBL_CARD2',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'owner2_c',
            'label' => 'LBL_OWNER2',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'card_number2_c',
            'label' => 'LBL_CARD_NUMBER2',
          ),
          1 => 
          array (
            'name' => 'ccid2_c',
            'label' => 'LBL_CCID2',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'month2_c',
            'studio' => 'visible',
            'label' => 'LBL_MONTH2',
          ),
          1 => 
          array (
            'name' => 'year2_c',
            'studio' => 'visible',
            'label' => 'LBL_YEAR2',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'add_notes2_c',
            'label' => 'LBL_ADD_NOTES2',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel10' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'card3_c',
            'studio' => 'visible',
            'label' => 'LBL_CARD3',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'owner3_c',
            'label' => 'LBL_OWNER3',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'card_number3_c',
            'label' => 'LBL_CARD_NUMBER3',
          ),
          1 => 
          array (
            'name' => 'ccid3_c',
            'label' => 'LBL_CCID3',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'month3_c',
            'studio' => 'visible',
            'label' => 'LBL_MONTH3',
          ),
          1 => 
          array (
            'name' => 'year3_c',
            'studio' => 'visible',
            'label' => 'LBL_YEAR3',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'add_notes3_c',
            'label' => 'LBL_ADD_NOTES3',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 'parent_name',
        ),
        1 => 
        array (
          0 => 'campaign_name',
        ),
      ),
    ),
  ),
);
;
?>
