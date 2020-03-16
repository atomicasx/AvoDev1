<?php
class AOS_QuotesHook{
	function RecordActivity($bean, $event, $arguments){
		//$module,$related_id,$account_id,$name,$msg
		if(!$bean->fetched_row){
			$module = 'AOS_Quotes';
			$related_id = $bean->id;
			$account_id = $bean->billing_account_id;
			$name = 'New';
			$msg = 'New Order Created';
			CreateTimeLineActivity($module,$related_id,$account_id,$name,$msg);
		}
	}
}
?>