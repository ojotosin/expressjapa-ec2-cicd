<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Packages</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/package/add" class="btn btn-primary btn-sm">Add Package</a>
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
								<th style="width:60px;">SL</th>
								<th>Photo</th>
								<th>Package Name</th>
								<th>Destination Name</th>
								<th>Total People Registered</th>
								<th style="width:240px;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							foreach ($package as $row) {
								$i++;

								$temp_arr = array();
		                		$temp_arr = explode('.',$row['p_featured_photo']);
								$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];

								$CI =& get_instance();
								$CI->load->model('Model_package');
								$CI->load->model('Model_payment');
								$d_arr = $CI->Model_package->get_destination_name_by_id($row['d_id']);
								$total_persons = $CI->Model_payment->get_total_persons_by_package($row['p_id']);
								$temp = 0;
								foreach($total_persons as $total_person) {
									$temp = $temp + $total_person['total_person'];
								}

								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td>
										<img src="<?php echo base_url(); ?>public/uploads/<?php echo $temp_final; ?>" alt="<?php echo $row['p_name']; ?>" style="width:150px;">
									</td>
									<td><?php echo $row['p_name']; ?></td>
									<td><?php echo $d_arr['d_name']; ?></td>
									<td><?php echo $temp; ?></td>
									<td>
										<a href="<?php echo base_url(); ?>admin/package/view/<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">View Details</a>					
										<a href="<?php echo base_url(); ?>admin/package/edit/<?php echo $row['p_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
										<a href="<?php echo base_url(); ?>admin/package/delete/<?php echo $row['p_id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');">Delete</a>
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