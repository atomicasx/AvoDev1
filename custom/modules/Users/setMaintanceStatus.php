<?php
// setMaintanceStatus
if (!defined('sugarEntry')) { define('sugarEntry', true); }
global $sugar_config;
$in_maintenance =  $sugar_config['in_maintenance'];
// print_r($in_maintenance);
// die();
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
						window.location = "index.php?module=Administration&action=index";
					}
				</script>

			</head>';
$html .='<body>
			<form id="customConfig" method="post" action="index.php?module=Users&action=UpdateInMaintance">
				<table class="edit view panelContainer" style="overflow: visible;">
					<tr class="mytr">
						<td colspan="4">
							<div style="float:left;margin:5px;font-size: 20px;">Mailchimp Configuration</div>
							<div style="float:right;margin:5px;"><input type="submit" title="Save" accesskey="a" class="button primary" value="Save" id="SAVE_HEADER" >&nbsp;<input type="button" title="Cancel" accesskey="a" class="button primary" value="Cancel" id="CANCEL_HEADER" onclick="cancel();"></div>
						</td>
					</tr>
					<tr>
						<td>
							<p> Current Value : '.$in_maintenance.'</p>
						</td>
					</tr>
					<tr>
						<td colspan="1" style="text-align: right;">
							<span>In Maintance : </span>
						</td>
						<td colspan="3">
							<select name="in_maintenance" id="in_maintenance">
								<option value="">-Select-</option>
								<option value="Enable">Enable</option>
								<option value="Disable">Disable</option>
							</select>
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