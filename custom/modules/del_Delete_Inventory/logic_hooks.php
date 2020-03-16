<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 

$hook_array['process_record'][] = Array(
        //Processing index. For sorting the array.
        1,

        //Label. A string value to identify the hook.
        'process_record example',

        //The PHP file where your class is located.
        'custom/modules/del_Delete_Inventory/process_record_class.php',

        //The class the method is in.
        'process_record_class',

        //The method to call.
        'process_record_method'
    );
?>