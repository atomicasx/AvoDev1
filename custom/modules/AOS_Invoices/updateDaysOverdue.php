<?php

class updateDaysOverdueClass{

    public function updateDaysOverdue($bean, $event, $arguments)
    {
        global $db;
        //print_r($bean);exit;
        $accountId = $bean->billing_account_id;
        $accountBean = BeanFactory::getBean('Accounts', $accountId);
        if($bean->date_entered) {
            $dateStr = substr($bean->date_entered, 0,10);
            $date = explode("-", $dateStr);
            $newDate = $date['2']."-".$date['0']."-".$date['1'];
            $newDateTime = strtotime($newDate);
            $newDate =  date("Y-m-d", $newDateTime);
            
            $strtotimeData = strtotime($newDate." +".$accountBean->terms_c." days");
            
            $daysduedate = date('Y-m-d', $strtotimeData);

            $now = time();

            $days = 0;
            if($now > $strtotimeData) {
                
                $date1 = new DateTime(date('Y-m-d'));
                $date2 = new DateTime($daysduedate);
                $days  = $date2->diff($date1)->format('%a');
                
            }
            $bean->days_overdue_c = $days;

            $updateQuery = "update aos_invoices_cstm set days_overdue_c = '".$days."' where id_c = '".$bean->id."'";
            $db->query($updateQuery);

        }
    }
}

?>