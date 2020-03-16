<?php
$dictionary["AOS_Invoices"]["fields"]["notes"] = array (
    'name' => 'notes',
    'vname' => 'LBL_NOTES',
    'type' => 'link',
    'relationship' => 'aos_invoices_notes',
    'module' => 'Notes',
    'source' => 'non-db',
);
$dictionary["AOS_Invoices"]["relationships"]["aos_invoices_notes"] = array (
    'lhs_module' => 'AOS_Invoices',
    'lhs_table' => 'aos_invoices',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
	'relationship_role_column_value'=>'AOS_Invoices'
);


?>
