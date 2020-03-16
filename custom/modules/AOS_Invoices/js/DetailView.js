function ResetDeliveryStatus(invoice_id){
	// console.log('Hello!!!');
	// console.log(id);
	deliveryStatus = '';
	if(invoice_id!=''){
		$.ajax({
			url: "index.php?module=AOS_Invoices&action=SaveDeliveryStatus",
			type: "POST",
			data: {'deliveryStatus':deliveryStatus, 'invoice_id':invoice_id},
			success: function (response) {
				if(response) {
					window.location.reload(true);
				}else {
					console.log("error occured in db operations");
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
		});
	}
}