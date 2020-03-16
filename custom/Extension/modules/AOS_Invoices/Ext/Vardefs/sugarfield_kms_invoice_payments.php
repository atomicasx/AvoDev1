<?php
$dictionary["AOS_Invoices"]["fields"]["kms_invoice_payments"] = array (
    'name' => 'kms_invoice_payments',
    'vname' => 'LBL_KMS_INVOICE_PAYMENTS',
    'type' => 'link',
    'relationship' => 'aos_invoices_kms_invoice_payments',
    'module' => 'kms_invoice_payments',
    'bean_name' => 'kms_invoice_payments',
    'source' => 'non-db',
);
$dictionary["AOS_Invoices"]["relationships"]["aos_invoices_kms_invoice_payments"] = array (
    'lhs_module' => 'AOS_Invoices',
    'lhs_table' => 'aos_invoices',
    'lhs_key' => 'id',
    'rhs_module' => 'kms_invoice_payments',
    'rhs_table' => 'kms_invoice_payments',
    'rhs_key' => 'aos_invoices_id',
    'relationship_type' => 'one-to-many',
);


?>
