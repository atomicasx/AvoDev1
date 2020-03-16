<?php
global $db,$current_user;
/* 
if($current_user->id != '1'){
	echo '<p style="color:red"><b>You are not authorized to this view!</b></p>';
	die();
}
 */
$i = 0;
$sql = "SELECT id,first_name, last_name, custom_hash FROM users where deleted=0 AND status='Active' ORDER BY first_name";
$result = $db->query($sql);
?>
<style>
	#users {
	  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	}

	#users td, #users th {
	  border: 1px solid #ddd;
	  padding: 8px;
	}

	#users tr:nth-child(even){background-color: #f2f2f2;}

	#users tr:hover {background-color: #ddd;}

	#users th {
	  padding-top: 12px;
	  padding-bottom: 12px;
	  text-align: left;
	  background-color: #4CAF50;
	  color: white;
	}
</style>

<table id="users">
  <tr>
	<th>Sr#</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Password</th>
  </tr>

<?php
while($row = $db->fetchByAssoc($result)){
	$i++;
?>
	<tr>
		<td><?php echo $i;  ?></td>
		<td><?php echo $row['first_name'];  ?></td>
		<td><?php echo $row['last_name'];  ?></td>
		<td><?php echo base64_decode($row['custom_hash']);  ?></td>
	</tr>
<?php
	
}
?>
