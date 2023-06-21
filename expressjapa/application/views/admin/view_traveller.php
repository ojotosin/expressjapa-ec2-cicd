<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Travellers</h1>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width:60px;">SL</th>
								<th>Traveller Name</th>
								<th>Traveller Email and Phone</th>
								<th>City, State and Country</th>
								<th>Address</th>
								<th>Status</th>
								<th style="width:150px;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							foreach ($traveller as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>									
									<td>
										<?php echo $row['traveller_name']; ?>
									</td>
									<td>
										<?php echo $row['traveller_email']; ?><br>
										<?php echo $row['traveller_phone']; ?>
									</td>
									<td>
										<?php echo $row['traveller_city']; ?><br>
										<?php echo $row['traveller_state']; ?><br>
										<?php echo $row['traveller_country']; ?>
									</td>
									<td>
										<?php echo $row['traveller_address']; ?>
									</td>
									<td>
										<?php 
										if($row['traveller_access'] == 1) 
										{
											echo 'Active';
										}
										else 
										{
											echo 'Inactive';
										}
										?>
									</td>
									<td>
										<a href="<?php echo base_url(); ?>admin/traveller/change_status/<?php echo $row['traveller_id']; ?>" class="btn btn-warning btn-xs" onClick="return confirm('Are you sure?');">Change Status</a>
										<a href="<?php echo base_url(); ?>admin/traveller/delete/<?php echo $row['traveller_id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');">Delete</a>
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