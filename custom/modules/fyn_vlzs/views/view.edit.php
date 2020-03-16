<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class fyn_vlzsViewEdit extends ViewEdit {


 	function display() 
 	{
		// echo "shafiq";

		?>

		<script type="text/javascript">
			
			$(function(){

			 	$("#name").attr('readonly','true');
			 	$("#name").css('background','#aeb4bf');

			 	// $("#status_c").attr('disabled','true');


			 	$("#van_c").focusout(function(){
			 		var vehicle = $('#van_c').val();
			 		var zone = $('#zone_c').val();

			 		if(zone == 'north')
			 		{
			 			zone = 'North';
			 		}

			 		if(zone == 'north_east')
			 		{
			 			zone = 'North East';
			 		}

			 		if(zone == 'north_west')
			 		{
			 			zone = 'North West';
			 		}

			 		if(zone == 'south')
			 		{
			 			zone = 'South';
			 		}

			 		if(zone == 'south_east')
			 		{
			 			zone = 'South East';
			 		}

			 		if(zone == 'south_west')
			 		{
			 			zone = 'South West';
			 		}

			 		if(zone == 'east')
			 		{
			 			zone = 'East';
			 		}

			 		if(zone == 'west')
			 		{
			 			zone = 'West';
			 		}

			 		var title='';

			 		if(zone != 'select')
			 		{
			 			title = vehicle + ' ' + zone ;
			 		}

				    $("#name").val(title);
				});
			 	
			 	$("#btn_van_c").focusout(function(){
			 		var vehicle = $('#van_c').val();
			 		var zone = $('#zone_c').val();

			 		if(zone == 'north')
			 		{
			 			zone = 'North';
			 		}

			 		if(zone == 'north_east')
			 		{
			 			zone = 'North East';
			 		}

			 		if(zone == 'north_west')
			 		{
			 			zone = 'North West';
			 		}

			 		if(zone == 'south')
			 		{
			 			zone = 'South';
			 		}

			 		if(zone == 'south_east')
			 		{
			 			zone = 'South East';
			 		}

			 		if(zone == 'south_west')
			 		{
			 			zone = 'South West';
			 		}

			 		if(zone == 'east')
			 		{
			 			zone = 'East';
			 		}

			 		if(zone == 'west')
			 		{
			 			zone = 'West';
			 		}

			 		var title='';

			 		if(zone != 'select')
			 		{
			 			title = vehicle + ' ' + zone ;
			 		}
			 		
				    $("#name").val(title);
				});

			 	$("#zone_c").focusout(function(){
			 		var vehicle = $('#van_c').val();
			 		var zone = $('#zone_c').val();

			 		if(zone == 'north')
			 		{
			 			zone = 'North';
			 		}

			 		if(zone == 'north_east')
			 		{
			 			zone = 'North East';
			 		}

			 		if(zone == 'north_west')
			 		{
			 			zone = 'North West';
			 		}

			 		if(zone == 'south')
			 		{
			 			zone = 'South';
			 		}

			 		if(zone == 'south_east')
			 		{
			 			zone = 'South East';
			 		}

			 		if(zone == 'south_west')
			 		{
			 			zone = 'South West';
			 		}

			 		if(zone == 'east')
			 		{
			 			zone = 'East';
			 		}

			 		if(zone == 'west')
			 		{
			 			zone = 'West';
			 		}

			 		var title='';

			 		if(zone != 'select')
			 		{
			 			title = vehicle + ' ' + zone ;
			 		}
			 		
				    $("#name").val(title);
				});

			}); 

		</script>


		<?php

 		parent::display();
 	}
}
