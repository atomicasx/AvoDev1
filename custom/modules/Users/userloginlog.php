<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class UserLoginLog {
    public function saveLoginLog($bean, $event, $arguments)
    {
        global $db;
        global $timedate;
        $ipaddress = $this->get_client_ip();
        
        
        $userLoginLog = new user_userloginlog();
        //echo "<pre>";
        $session_id = session_id();
        $userLoginLog->ipaddress_c = $ipaddress;
        $userLoginLog->user_id_c = $bean->id;
        $userLoginLog->date_login_c = $timedate->nowDb();
        $userLoginLog->session_value_c = $session_id;
        $userLoginLog->save();

        $selectUserLog = "select * from user_userloginlog inner join user_userloginlog_cstm on user_userloginlog.id = user_userloginlog_cstm.id_c where user_userloginlog_cstm.user_id_c = '".$bean->id."' and user_userloginlog_cstm.date_logout_c IS NULL and user_userloginlog.deleted='0'";
        $res = $db->query($selectUserLog);
        $num = $res->num_rows;
        if($num > 1) {
            while($row = $db->fetchByAssoc($res)){
                    //header("Location: index.php?module=Users&action=Logout&flag=2");
                    //exit;
            }
        }  
    }
    
    public function checkLoginLog($bean, $event, $arguments)
    {
        //echo "<pre>";
        //print_r($_POST);exit;
    }
    
    public function updateLogOut($bean, $event, $arguments)
    {
        global $timedate;
        global $db;
        $session_id = session_id();
        $flag = "";
		if($_REQUEST['flag'] == 3)
        {
			$value = "You have been logged out due to inactivity!";
            setcookie("inactiveloginErrorMessage", $value, time() + 3600);
        }
        if($_REQUEST['flag'] == 2)
        {
            $flag = "Error";
        }
        $selectUserLog = "select * from user_userloginlog inner join user_userloginlog_cstm on user_userloginlog.id = user_userloginlog_cstm.id_c where user_id_c = '".$bean->id."' and session_value_c = '".$session_id."' and user_userloginlog.deleted='0'";
        $res = $db->query($selectUserLog);
        $num = $res->num_rows;
        $date_logout_c = $timedate->nowDb();
        //echo $selectUserLog;exit;
        if($num > 0) {
            while($row = $db->fetchByAssoc($res)){

                $datetime1 = new DateTime($row['date_login_c']);
                $datetime2 = new DateTime($date_logout_c);
                $interval = $datetime1->diff($datetime2);
                $difference = $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";

                $update = "update user_userloginlog_cstm set date_logout_c = '".$date_logout_c."', duration_c = '".$difference."', fail_attempt_c = '".$flag."' where user_id_c = '".$bean->id."' and session_value_c = '".$session_id."'";
                //echo $update;exit;
                $db->query($update);
            }
        }
    }
    //exit;
    // Function to get the client IP address
    public function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}