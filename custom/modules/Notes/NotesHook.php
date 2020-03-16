<?php
class NotesHook{
	function RecordActivity($bean, $event, $arguments){
		/* echo '<pre>';
		print_r($bean);
		die(); */
		//$module,$related_id,$account_id,$name,$msg
		if(!$bean->fetched_row && $bean->parent_type == 'Accounts'){
			$module = 'Notes';
			$related_id = $bean->id;
			$account_id = $bean->parent_id;
			$name = 'New';
			$msg = 'New Note Created';
			CreateTimeLineActivity($module,$related_id,$account_id,$name,$msg);
		}
	}
}

?>