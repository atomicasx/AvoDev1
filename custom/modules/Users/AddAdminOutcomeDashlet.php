<?php
// require_once('custom/modules/Users/DefaultDashlet.php');
// AddOutcomeDashlet($bean->id);
global $db;
$users_list = get_user_array();

$user_options = ''; 
foreach($users_list as $id => $name){
	$user_options .= '<option value="'.$id.'">'.$name.'</option>';
} 

$html = '';
$html .= '<head>
			<style>
			.mytr {
				border-right:none !important;
				/* background-color:#000; */
				/* background:linear-gradient(to bottom, #777777 30%, #494949 100%) repeat scroll 0 0 transparent; */
				background:linear-gradient(to bottom, #777777 0%, #494949 100%) repeat scroll 0 0 transparent;
				color: #FFFFFF;
				text-align:justify;
				padding:6px;
				}
				</style>
				<script>
					function cancel(){
						window.location = "index.php?module=Users&action=index";
					}
				</script>

			</head>';
$html .='<body>
			<form id="customConfig" method="post" action="index.php?module=Users&action=DefaultDashlet&type=admin">
				<table class="edit view panelContainer" style="overflow: visible;">
					<tr class="mytr">
						<td colspan="4">
							<div style="float:left;margin:5px;font-size: 20px;">Add Outcome Admin Dashlets </div>
							<div style="float:right;margin:5px;"><input type="submit" title="Save" accesskey="a" class="button primary" value="Save" id="SAVE_HEADER" >&nbsp;<input type="button" title="Cancel" accesskey="a" class="button primary" value="Cancel" id="CANCEL_HEADER" onclick="cancel();"></div>
						</td>
					</tr>
					<tr>
						<td colspan="1" style="text-align: right;">
							<span>Add Dashlet to User : </span>
						</td>
						<td colspan="3">
							<select name="user_id" id="user_id" style="width: 300px;margin: 14px;">'.$user_options.'</select>
						</td>				
					</tr>
					
					';

$html .=		'<tr class="mytr">
					<td colspan="4">
						<div style="float:right;margin:5px;"><input type="submit" title="Save" accesskey="a" class="button primary" value="Save" id="SAVE_FOOTER" >&nbsp;<input type="button" title="Cancel" accesskey="a" class="button primary" value="Cancel" id="CANCEL_HEADER" onclick="cancel();"></div>
					</td>
				</tr>
			</table>
		</form>
</body>';
echo $html;
?>