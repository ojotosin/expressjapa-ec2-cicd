<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Payments</h1>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">

			<?php
			if($this->session->flashdata('error')) {
				?>
				<div class="callout callout-danger">
					<p><?php echo $this->session->flashdata('error'); ?></p>
				</div>
				<?php
			}
			if($this->session->flashdata('success')) {
				?>
				<div class="callout callout-success">
					<p><?php echo $this->session->flashdata('success'); ?></p>
				</div>
				<?php
			}
			?>

			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Payment Date</th>
								<th>Package</th>
								<th>Destination</th>
								<th>Payment Method</th>
								<th>Payment Status</th>
								<th>If pending,<br>make complete</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							foreach ($payment as $row) {
								$i++;

								$CI =& get_instance();
								$CI->load->model('Model_payment');
								$d_arr = $CI->Model_payment->get_destination_by_id($row['d_id']);
								$t_arr = $CI->Model_payment->get_traveller_by_id($row['traveller_id']);
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['payment_date']; ?></td>
									<td><?php echo $row['p_name']; ?></td>
									<td><?php echo $d_arr['d_name']; ?></td>
									<td><?php echo $row['payment_method']; ?></td>
									<td><?php echo $row['payment_status']; ?></td>
									<td>
										<?php if($row['payment_status'] == 'Pending'): ?>
										<a href="<?php echo base_url(); ?>admin/payment/make_complete/<?php echo $row['id']; ?>" class="btn btn-warning btn-xs" onclick="return confirm('Are you sure?');">Make Completed</a>
										<?php endif; ?>
									</td>
									<td>
										<a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalDetailTraveller<?php echo $i; ?>" style="width:100%;margin-bottom:3px;">Traveller Detail</a><br>

										<!-- Modal Start -->
										<div class="modal fade" id="myModalDetailTraveller<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog" style="width:900px;">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="myModalLabel">
															Detail Information
														</h4>
													</div>
													<div class="modal-body">
														<div class="rTable">
															<div class="rTableRow">
																<div class="rTableHead">Traveller Name</div>
																<div class="rTableCell"><?php echo $t_arr['traveller_name']; ?></div>
															</div>
															<div class="rTableRow">
																<div class="rTableHead">Traveller Email</div>
																<div class="rTableCell"><?php echo $t_arr['traveller_email']; ?></div>
															</div>
															<div class="rTableRow">
																<div class="rTableHead">Traveller Phone</div>
																<div class="rTableCell"><?php echo $t_arr['traveller_phone']; ?></div>
															</div>
															<div class="rTableRow">
																<div class="rTableHead">Traveller Address</div>
																<div class="rTableCell"><?php echo $t_arr['traveller_address']; ?></div>
															</div>
															<div class="rTableRow">
																<div class="rTableHead">Traveller City</div>
																<div class="rTableCell"><?php echo $t_arr['traveller_city']; ?></div>
															</div>
															<div class="rTableRow">
																<div class="rTableHead">Traveller State</div>
																<div class="rTableCell"><?php echo $t_arr['traveller_state']; ?></div>
															</div>
															<div class="rTableRow">
																<div class="rTableHead">Traveller Country</div>
																<div class="rTableCell"><?php echo $t_arr['traveller_country']; ?></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- Modal End -->



										<a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalDetail<?php echo $i; ?>" style="width:100%;margin-bottom:3px;">Package Detail</a><br>

										<!-- Modal Start -->
										<div class="modal fade" id="myModalDetail<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog" style="width:900px;">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="myModalLabel">
															Detail Information
														</h4>
													</div>
													<div class="modal-body">
														<div class="rTable">
															<div class="rTableRow">
																<div class="rTableHead">Package Name</div>
																<div class="rTableCell"><?php echo $row['p_name']; ?></div>
															</div>
															<div class="rTableRow">
																<div class="rTableHead">Package Description</div>
																<div class="rTableCell"><?php echo $row['p_description']; ?></div>
															</div>
															<div class="rTableRow">
																<div class="rTableHead">Package Location</div>
																<div class="rTableCell"><?php echo $row['p_location']; ?></div>
															</div>

															<div class="rTableRow">
																<div class="rTableHead">Start Date</div>
																<div class="rTableCell"><?php echo $row['p_start_date']; ?></div>
															</div>

															<div class="rTableRow">
																<div class="rTableHead">End Date</div>
																<div class="rTableCell"><?php echo $row['p_end_date']; ?></div>
															</div>

															<div class="rTableRow">
																<div class="rTableHead">Last Booking Date</div>
																<div class="rTableCell"><?php echo $row['p_last_booking_date']; ?></div>
															</div>

															<div class="rTableRow">
																<div class="rTableHead">Price (per person)</div>
																<div class="rTableCell">$<?php echo $row['p_price_single']; ?></div>
															</div>

															<div class="rTableRow">
																<div class="rTableHead">Itinerary</div>
																<div class="rTableCell"><?php echo $row['p_itinerary']; ?></div>
															</div>

															<div class="rTableRow">
																<div class="rTableHead">Policy</div>
																<div class="rTableCell"><?php echo $row['p_policy']; ?></div>
															</div>

															<div class="rTableRow">
																<div class="rTableHead">Terms and Conditions</div>
																<div class="rTableCell"><?php echo $row['p_terms']; ?></div>
															</div>

														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- Modal End -->



										<a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalDetailAnother<?php echo $i; ?>" style="width:100%;margin-bottom:3px;">Payment Detail</a><br>

										<!-- Modal Start -->
										<div class="modal fade" id="myModalDetailAnother<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog" style="width:600px;">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="myModalLabel">
															Detail Information
														</h4>
													</div>
													<div class="modal-body">
														<div class="rTable">
															<div class="rTableRow">
																<div class="rTableHead">Invoice No</div>
																<div class="rTableCell"><?php echo $row['invoice_no']; ?></div>
															</div>
															<div class="rTableRow">
																<div class="rTableHead">Payment Date</div>
																<div class="rTableCell"><?php echo $row['payment_date']; ?></div>
															</div>
															<div class="rTableRow">
																<div class="rTableHead">Transaction Id</div>
																<div class="rTableCell"><?php echo $row['txnid']; ?></div>
															</div>
															<div class="rTableRow">
																<div class="rTableHead">Paid Amount (in USD)</div>
																<div class="rTableCell">$<?php echo $row['paid_amount']; ?></div>
															</div>

															<div class="rTableRow">
																<div class="rTableHead">Total Person</div>
																<div class="rTableCell"><?php echo $row['total_person']; ?></div>
															</div>
															
															<?php if($row['payment_method'] == 'Stripe'): ?>
															<div class="rTableRow">
																<div class="rTableHead">Card Number</div>
																<div class="rTableCell"><?php echo $row['card_number']; ?></div>
															</div>

															<div class="rTableRow">
																<div class="rTableHead">Card CVV</div>
																<div class="rTableCell"><?php echo $row['card_cvv']; ?></div>
															</div>

															<div class="rTableRow">
																<div class="rTableHead">Card Expire Month</div>
																<div class="rTableCell"><?php echo $row['card_month']; ?></div>
															</div>

															<div class="rTableRow">
																<div class="rTableHead">Card Expire Year</div>
																<div class="rTableCell"><?php echo $row['card_year']; ?></div>
															</div>
															<?php endif; ?>
															
															<?php if($row['payment_method'] == 'Bank Deposit'): ?>
															<div class="rTableRow">
																<div class="rTableHead">Bank Transaction Information</div>
																<div class="rTableCell"><?php echo $row['bank_transaction_info']; ?></div>
															</div>
															<?php endif; ?>

															<div class="rTableRow">
																<div class="rTableHead">Payment Method</div>
																<div class="rTableCell"><?php echo $row['payment_method']; ?></div>
															</div>

															<div class="rTableRow">
																<div class="rTableHead">Payment Status</div>
																<div class="rTableCell"><?php echo $row['payment_status']; ?></div>
															</div>

														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- Modal End -->

										<a href="<?php echo base_url(); ?>admin/payment/delete/<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');" style="width:100%;">Delete</a>
									</td>
								</tr>
								<?php
							}
							?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


</section>