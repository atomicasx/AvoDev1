<?php
global $db,$app_list_strings;
$module_list = $app_list_strings['moduleList'];
// $customer_id = "c87d91e3-affa-0c9e-9ab5-5dc709cc8d99";
$customer_id = $_REQUEST['record'];
$TimeLineData = array();
$sql = "select * from kms_timeline where deleted=0 AND account_id = '$customer_id' ORDER BY date_entered DESC";
$result = $db->query($sql);

/* 
[id] => 8e206d41-0ce3-cbd4-dca2-5e42ce9e0a96
    [name] => New
    [date_entered] => 2020-02-11 15:56:05
    [date_modified] => 2020-02-11 15:56:05
    [modified_user_id] => 5bb87e06-75a7-fe14-89f2-5df0b7ef9c24
    [created_by] => 5bb87e06-75a7-fe14-89f2-5df0b7ef9c24
    [description] => New Invoice Created
    [deleted] => 0
    [assigned_user_id] => 5bb87e06-75a7-fe14-89f2-5df0b7ef9c24
    [parent_type] => AOS_Invoices
    [parent_id] => 8fc47583-ad3f-61c5-6c06-5e3ef9e8679d
    [account_id] => c87d91e3-affa-0c9e-9ab5-5dc709cc8d99
 */

$module_name = 'kms_timeline';
while($row = $db->fetchByAssoc($result)){
	// print_r($row);
	// echo '<br>';
	$TimeLineData[] = BeanFactory::getBean($module_name, $row['id']);
}
// echo '<pre>';
// print_r($result);

// echo '<br>===============<br>';
// print_r($TimeLineData[0]);
// die();

 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #474e5d;
  font-family: Helvetica, sans-serif;
}

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 800px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: white;
  top: 0;
  bottom: 0;
  /* left: 50%; */
  margin-left: -3px;
}

/* Container around content */
.container {
  padding: 0px 40px;
  position: relative;
  background-color: inherit;
  width: 80%;
}
h2, .h2{
	margin-top: 3px;
    margin-bottom: 3px;
}
h3, .h3{
	margin-top: 10px;
    margin-bottom: 10px;
}
/* The circles on the timeline */
.container::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -17px;
  background-color: white;
  border: 4px solid #FF9F55;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 0%;
}


/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -16px;
}

/* The actual content */
.content {
  padding: 10px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .container {
  width: 100%;
  padding-left: 20px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .container::before {
  left: 10px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .right::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}
</style>
</head>
<body>

<div class="timeline">
<?php
if(sizeof($TimeLineData) > 0){
	$html = '<br>';
}else{
	$html .= '<br><div class="container right">
    <div class="content">
      <h3>No Activity Found!</h3>
    </div>
  </div>'; 
}

foreach($TimeLineData as $Activity){
  $html .= '<div class="container right">
    <div class="content">
      <h2>'. $module_list[$Activity->parent_type] .'</h2>
      <p>'. $Activity->description .'</p>
      <p>Created Date:<b>'. $Activity->date_entered .'</b></p>
      <p>Created By :<b>'. $Activity->created_by_name .'</b></p>
	  <p><a href="index.php?module='. $Activity->parent_type .'&action=DetailView&record='. $Activity->parent_id .'" target="_blank">View Detail</a></p>
    </div>
  </div>'; 
}
echo $html;  
?>  
</div>

</body>
</html>