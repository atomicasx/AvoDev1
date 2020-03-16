<?php
$job_strings[]='CreateQRBoxes';

function CreateQRBoxes() {
	require_once('custom/modules/fyn_Stock_In/CreateQRBoxes.php');
	$start = gmdate('Y-m-d H:i:s');
	$GLOBALS['log']->fatal('Scheduler Started');
	$GLOBALS['log']->fatal($start);
	CreateStockInQRBoxes();
	// syncPropertyContacts();
	/* syncContacts('property');
	$GLOBALS['log']->info('Property Contacts Sync Executed Successfully');
    syncPropertyNorContacts('property_nor');
	$GLOBALS['log']->info('Property NOR (SIPA NOR) Contacts Sync Executed Successfully');
    // syncEMFContacts();
    syncContacts('emf');
	$GLOBALS['log']->info('EMF Contacts Sync Executed Successfully');
    syncContacts('sipa_trading');
	$GLOBALS['log']->info('SIPA Trading Contacts Sync Executed Successfully'); */
	$end = gmdate('Y-m-d H:i:s');
	$GLOBALS['log']->fatal($end);
	$GLOBALS['log']->fatal('Completed!!');
    return true;
}

