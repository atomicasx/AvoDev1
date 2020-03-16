$(document).ready(function(){
	var record = $('[name="record"]').val();
	if(record == ''){
		$('#addr_status_c').val('');
		$('#addr_status_c option:not(:selected)').attr('disabled', true);
	}
	$phoneFields = new Array(
		'phone_office',
		'phone_fax',
		'primary_office_number_c',
		'primary_mobile_number_c',
		'secondary_contact_office_num_c',
		'secondary_contact_mobile_num_c',
		'third_contact_office_number_c',
		'third_contact_mobile_number_c',
		'billing_office_number_c',
		'billing_mobile_number_c',
	);
	$.each( $phoneFields, function( key, value ) {
		$('#'+value).usPhoneFormat({
			format: '(xxx) xxx-xxxx',
		}); 
	});
	//billing_office_number_c
	$('#phone_office').change(function(){
		var off_phone = $('#phone_office').val();
		$('#primary_office_number_c').val(off_phone);
		$('#billing_office_number_c').val(off_phone);
		
	});
	
	$('#billing_address_street, #billing_address_city, #billing_address_state, #billing_address_postalcode, #billing_address_country').blur(function(){
		var street = $('#billing_address_street').val();
		var city = $('#billing_address_city').val();
		var state = $('#billing_address_state').val();
		var zip = $('#billing_address_postalcode').val();
		var country = $('#billing_address_country').val();
		if(street !='' && city !='' && state !='' && zip !='' && country !=''){
			//console.log('All Fields are available');
			updateAddressVerificationStatus(street,city,state,zip,country);
		}
		
	});
});

function updateAddressVerificationStatus(street,city,state,zip,country){
	$.ajax({
		url: 'index.php?module=Accounts&action=getAddressValidationStatus',
		type: 'POST',
		contentType: 'application/x-www-form-urlencoded',
		dataType: 'text',
		data:'sugar_body_only=1&street='+street+'&city='+city+'&state='+state+'&zip='+zip+'&country='+country,			
		async: true,			
		success : function (result){
			//console.log(result);
			var obj = JSON.parse(result);
			//console.log(obj.Message);
			if(obj.Result == 'Valid Address'){
				$('#addr_status_c').val('verified');
			}else{
				var response = confirm(obj.Result + '\n' + obj.Message + '\n' +  'Would you like to Continue?');
				if(response == 1){
					$('#addr_status_c').val('not_verified');
				}else{
					$('#addr_status_c').val('');
					$('#billing_address_street').val('');
					$('#billing_address_city').val('');
					$('#billing_address_state').val('');
					$('#billing_address_postalcode').val('');					
				}
			}
		}	
	});
}