<?php
 
$hook_version = 1; 
$hook_array = Array();  
$hook_array['after_save'] = Array();
$hook_array['after_save'][] = Array(2, 'Record Activity', 'custom/modules/Notes/NotesHook.php','NotesHook', 'RecordActivity');
?>