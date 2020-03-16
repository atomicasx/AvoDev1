<?php

$users = getAllUsersExceptDrivers();
echo '<pre>';
print_r($users);
die();
$alert = BeanFactory::newBean('Alerts');
$alert->name = 'My Alert';
$alert->description = 'This is my alert!';
$alert->url_redirect = 'index.php';
$alert->target_module = 'Account';
$alert->assigned_user_id = '5bb87e06-75a7-fe14-89f2-5df0b7ef9c24';
$alert->type = 'info';
$alert->is_read = 0;
$alert->save();
echo 'Done';

/* 
$seedAlert = new Alert();
$seedAlert->name = "New Lead";
$seedAlert->description = "Lead assigned to yu";
$seedAlert->assigned_user_id = $bean->fetched_row['assigned_user_id'];
$seedAlert->is_read = 0 ;
$seedAlert->type = "info" ;
$seedAlert->target_module = "Leads";
$seedAlert->url_redirect = "index.php?action=DetailView&module=Leads&record=".$bean>fetched_row['id']."&return_module=Leads&return_action=DetailView";
$seedAlert->save();
 */
?>