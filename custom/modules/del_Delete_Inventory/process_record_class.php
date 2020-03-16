<?php

    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class process_record_class
    {
        function process_record_method($bean, $event, $arguments)
        {
            $bean->delete_all_records_c = "<input modulename = '".$bean->name."' type ='button' name = 'deleterec' value='Delete' class='button deleterec'>";
        }
    }

?>