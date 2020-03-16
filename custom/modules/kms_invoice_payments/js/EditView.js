$(document).ready(function(){
	var is_popup = $('#is_popup').val();
	if(is_popup == '1'){
		$('#name').attr('readonly','readonly');
		$('#amount').attr('readonly','readonly');
		$('#aos_invoices_name').attr('readonly','readonly');
		$('#btn_aos_invoices_name').attr('style','display:none');
		$('#btn_clr_aos_invoices_name').attr('style','display:none');
		
		$('#amount_received').blur(function(){
			var invAmt = parseFloat($('#amount').val());
			var recAmt = parseFloat($('#amount_received').val());
			if(recAmt < invAmt || recAmt == 0){
				var inval = confirm('Please Confirm Amount Collect!');
				if(inval == false){
					$('#amount_received').val('');
				}
			}
		});
		
	}

});