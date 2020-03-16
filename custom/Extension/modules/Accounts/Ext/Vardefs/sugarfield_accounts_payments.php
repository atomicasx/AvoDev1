<?php
$dictionary["Account"]["fields"]["kms_invoice_payments"] = array (
    'name' => 'kms_invoice_payments',
    'vname' => 'LBL_KMS_INVOICE_PAYMENTS',
    'type' => 'link',
    'relationship' => 'account_kms_invoice_payments',
    'module' => 'kms_invoice_payments',
    'bean_name' => 'kms_invoice_payments',
    'source' => 'non-db',
);
$dictionary["Account"]["relationships"]["account_kms_invoice_payments"] = array (
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'kms_invoice_payments',
    'rhs_table' => 'kms_invoice_payments',
    'rhs_key' => 'account_id',
    'relationship_type' => 'one-to-many',
);


?>
