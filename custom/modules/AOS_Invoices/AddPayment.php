<?php
echo 'Payment div is!!';
echo '<br>';
?>

	<!-- ------------------------------------------------- -->
	<!-- Popup to Recieve Payment against selected Invoice -->
	<!-- ------------------------------------------------- -->
	<div class="modal fade text-left" id="addPaymentForm" tabindex="-1" role="dialog"
		aria-labelledby="PaymentModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document" style="max-width: 900px;">
			<div class="modal-content" id="AddPaymentDiv">
				<div class="modal-header bg-warning" style="padding: 10px;">
					<h3 class="modal-title" id="AddPymentModalLabel">Add Payment</h3>
					<button type="button" id="closePaymentDivbtn" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div>
							<div class="row">
								<div class="col-sm-4">
									<label class="form-control-label" for="invoice_id">Invoice Id</label>
									<input type="hidden" class="form-control" id="invoice_id" name="invoice_id">
									<input type="text" class="form-control" id="invoice_name" name="invoice_name" value="" readonly>
								</div>
								<div class="col-sm-4">
									<label class="form-control-label" for="name">Title</label>
									<input type="text" class="form-control" id="name" name="name">
								</div>
								<div class="col-sm-4">
									<label class="form-control-label" for="date_recieved">Date Recieved</label>
									<input type="date" class="form-control" id="date_recieved" name="date_recieved">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label class="form-control-label" for="payment_type">Payment Type</label>
									<select id="payment_type" name="payment_type" style="width:270px;">
										<option label="Cash" value="Cash">Cash</option>
										<option label="Cheque" value="Cheque">Cheque</option>
										<option label="Bank Transfer" value="Bank Transfer">Bank Transfer</option>
										<option label="Credit Card" value="Credit Card">Credit Card</option>
										<option label="Pay Order" value="Pay Order">Pay Order</option>
									</select>
								</div>
								<div class="col-sm-4">
									<label class="form-control-label" for="amount">Amount</label>
									<input type="text" class="form-control" id="amount"
										name="amount" value="">
								</div>
								<div class="col-sm-4">
									<label class="form-control-label" for="transaction_reference">Transaction Reference</label>
									<input type="text" class="form-control" id="transaction_reference"
										name="transaction_reference">
								</div>								
							</div>
							
							<div class="row">								
								<div class="col-sm-4">
									<label class="form-control-label" for="bank_name">Bank Name</label>
									<input type="text" class="form-control" id="bank_name" name="bank_name" value="">
								</div>
								<div class="col-sm-4">
									<label class="form-control-label" for="bank_account_title">Bank Account Title</label>
									<input type="text" class="form-control" id="bank_account_title" name="bank_account_title" value="">
								</div>
								<div class="col-sm-4">
									<label class="form-control-label" for="bank_account_number">Bank Account Number</label>
									<input type="text" class="form-control" id="bank_account_number" name="bank_account_number" value="">
								</div>
								
							</div>
							<div class="row">
								<div class="col-sm-12">
									<label class="form-control-label"
										for="description">Note</label>
									<textarea id="description" name="description" rows="3" cols="80" title=""
										class="form-control" tabindex="0" style="width:100%"></textarea>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button id="savePayment" type="submit" class="btn btn-warning btn-sm float-right" onclick=""
						style="margin-top:15px;">Save</button>
				</div>
			</div>
		</div>
	</div>