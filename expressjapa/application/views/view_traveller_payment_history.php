<div class="dashboard-area bg-area pt_50 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<div class="col-md-3 col-sm-12 wow fadeIn" data-wow-delay="0.1s">
				<div class="option-board mt_30">
					<ul>
						<?php $this->view('view_traveller_sidebar'); ?>
					</ul>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 wow fadeIn" data-wow-delay="0.2s">
				<div class="detail-dashboard table-responsive mt_30">

					<h1>View All Payments</h1>

					<table id="example" class="display" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Payment Date</th>
								<th>Package</th>
								<th>Destination</th>
								<th>Payment Method</th>
								<th>Payment Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							foreach ($tpayment as $row) {
								$i++;

								$CI =& get_instance();
								$CI->load->model('Model_traveller');
								$d_arr = $CI->Model_traveller->get_destination_name_by_id($row['d_id']);

								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['payment_date']; ?></td>
									<td><?php echo $row['p_name']; ?></td>
									<td><?php echo $d_arr['d_name']; ?></td>
									<td><?php echo $row['payment_method']; ?></td>
									<td><?php echo $row['payment_status']; ?></td>
									<td>
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
																<div class="rTableHead">Paid Amount</div>
																<div class="rTableCell"><?php echo $row['paid_amount']; ?></div>
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
</div>