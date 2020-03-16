<?php
$hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(1, 'Update Related Invoice Status', 'custom/modules/kms_invoice_payments/InvoicePaymentHook.php','InvoicePaymentHook', 'UpdateInvoiceStatus'); 
$hook_array['after_save'][] = Array(1, 'Update Related Invoice Status', 'custom/modules/kms_invoice_payments/InvoicePaymentHook.php','InvoicePaymentHook', 'RecordActivity'); 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Update Customer Name', 'custom/modules/kms_invoice_payments/InvoicePaymentHook.php','InvoicePaymentHook', 'BeforeSaveFunction'); 
?>