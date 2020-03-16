<?php
class updateCommissionClass{

    public function updateCommission($bean, $event, $arguments)
    {
        if($bean->user_id_c)
        {
            global $db;

            $driverCommissionBean = BeanFactory::getBean('dc_driver_commission');

            $driverCommissionList = $driverCommissionBean->retrieve_by_string_fields(array(
                'aos_invoices_id_c' => $bean->id
              ));
            if(!$driverCommissionList)
            {
                $sql = "select * from users_cstm where id_c = '".$bean->user_id_c."'";

                $res = $db->query($sql);

                $row = $db->fetchByAssoc($res);

                if(!empty($row['flat_rate_commission_c']) || !empty($row['percentage_commission_c'])) {
                    if(!empty($row['flat_rate_commission_c'])) {
                        //echo $bean->subtotal_amount;
                        $saveDriverCommissionBean = BeanFactory::getBean('dc_driver_commission');
                        $saveDriverCommissionBean->aos_invoices_id_c = $bean->id;
                        $saveDriverCommissionBean->user_id_c = $bean->user_id_c;
                        $saveDriverCommissionBean->flat_rate_commission_c = $row['flat_rate_commission_c'];
                        $saveDriverCommissionBean->percentage_commission_c = "";
                        $saveDriverCommissionBean->commission_amount_c = $row['flat_rate_commission_c'];
                        $saveDriverCommissionBean->save();

                        //$bean->commission_amount_c = $row['flat_rate_commission_c'];

                    } else if(!empty($row['percentage_commission_c'])) {
                        $calCommission = ($bean->subtotal_amount*(int)$row['percentage_commission_c'])/100;
                        $saveDriverCommissionBean = BeanFactory::getBean('dc_driver_commission');
                        $saveDriverCommissionBean->aos_invoices_id_c = $bean->id;
                        $saveDriverCommissionBean->user_id_c = $bean->user_id_c;
                        $saveDriverCommissionBean->flat_rate_commission_c = "";
                        $saveDriverCommissionBean->percentage_commission_c = $row['percentage_commission_c'];
                        $saveDriverCommissionBean->commission_amount_c = $calCommission;
                        $saveDriverCommissionBean->save();

                        //$bean->commission_amount_c = $calCommission;
                    }
                }
            }
        }
    }
}
?>