<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Destinations</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/destination/add" class="btn btn-primary btn-sm">Add Destination</a>
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
								<th width="180">Destination Name</th>
								<th style="width:240px;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							foreach ($destination as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><img src="<?php echo base_url(); ?>public/uploads/<?php echo $row['d_featured_photo']; ?>" alt="<?php echo $row['d_name']; ?>" style="width:200px;"></td>
									<td><?php echo $row['d_name']; ?></td>
									<td>
										<a class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal<?php echo $i; ?>">View Details</a>
										<a href="<?php echo base_url(); ?>admin/destination/edit/<?php echo $row['d_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
										<a href="<?php echo base_url(); ?>admin/destination/delete/<?php echo $row['d_id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');">Delete</a>
									</td>
								</tr>
								<div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			                        <div class="modal-dialog" role="document">
			                            <div class="modal-content">
			                                <div class="modal-header">
			                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                                    <h4 class="modal-title" id="myModalLabel">View Details</h4>
			                                </div>
			                                <div class="modal-body">
			                                    <div class="rTable">
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Destination Name</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['d_name']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Heading</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['d_heading']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Short Description</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['d_short_description']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Package Heading</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['d_package_heading']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Package Subheading</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['d_package_subheading']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Detail Heading</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['d_detail_heading']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Detail Subheading</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['d_detail_subheading']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Introduction</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['d_introduction']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Experience</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['d_experience']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Weather</strong></div>
			                                            <div class="rTableCell">
			                                               	<?php echo $row['d_weather']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Hotel</strong></div>
			                                            <div class="rTableCell">
			                                               	<?php echo $row['d_hotel']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Transportation</strong></div>
			                                            <div class="rTableCell">
			                                               	<?php echo $row['d_transportation']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Culture</strong></div>
			                                            <div class="rTableCell">
			                                               	<?php echo $row['d_culture']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Featured Photo</strong></div>
			                                            <div class="rTableCell">
			                                                <img src="<?php echo base_url().'public/uploads/'.$row['d_featured_photo']; ?>" alt="" style="width:300px;">
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Banner</strong></div>
			                                            <div class="rTableCell">
			                                                <img src="<?php echo base_url().'public/uploads/'.$row['d_banner_photo']; ?>" alt="" style="width:300px;">
			                                            </div>
			                                        </div>
			                                        
			                                    </div>
			                                </div>
			                                <div class="modal-footer">
			                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
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