<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Package</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/package" class="btn btn-primary btn-sm">View All</a>
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

			<?php echo form_open_multipart(base_url().'admin/package/add',array('class' => 'form-horizontal')); ?>
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Name *</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="p_name" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Description </label>
							<div class="col-sm-8">
								<textarea class="form-control" name="p_description" id="editor1"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Short Description</label>
							<div class="col-sm-8">
								<textarea class="form-control" name="p_description_short" style="height:120px;"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Location</label>
							<div class="col-sm-8">
								<textarea class="form-control" name="p_location" style="height:120px;"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Tour Start Date *</label>
							<div class="col-sm-2">
								<input type="text" autocomplete="off" class="form-control" name="p_start_date" value="" id="datepicker">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Tour End Date *</label>
							<div class="col-sm-2">
								<input type="text" autocomplete="off" class="form-control" name="p_end_date" value="" id="datepicker1">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Last Booking Date *</label>
							<div class="col-sm-2">
								<input type="text" autocomplete="off" class="form-control" name="p_last_booking_date" value="" id="datepicker2">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Map</label>
							<div class="col-sm-8">
								<textarea class="form-control" name="p_map" style="height:120px;"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Itinerary </label>
							<div class="col-sm-8">
								<textarea class="form-control" id="editor2" name="p_itinerary"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Price (per person) *</label>
							<div class="col-sm-2">
								<input type="text" autocomplete="off" class="form-control" name="p_price_single" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Policy </label>
							<div class="col-sm-8">
								<textarea class="form-control" id="editor3" name="p_policy"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Terms and Conditions </label>
							<div class="col-sm-8">
								<textarea class="form-control" id="editor4" name="p_terms"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Is Featured? </label>
							<div class="col-sm-2">
								<select name="p_is_featured" class="form-control select2">
									<option value="No">No</option>
									<option value="Yes">Yes</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Photo *</label>
							<div class="col-sm-8" style="padding-top:5px">
								<input type="file" name="photo">(Only jpg, jpeg, gif and png are allowed)
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Banner *</label>
							<div class="col-sm-8" style="padding-top:5px">
								<input type="file" name="banner">(Only jpg, jpeg, gif and png are allowed)
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Select Destination</label>
							<div class="col-sm-4">
								<select name="d_id" class="form-control select2">
									<?php
									foreach ($destination as $row) {
										?>
										<option value="<?php echo $row['d_id']; ?>"><?php echo $row['d_name']; ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label" style="padding-top:13px;">Tour Photos </label>
							<div class="col-sm-8" style="padding-top:5px">
								<table id="photoSelection" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:90%;">Select Photo</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                <input type="button" class="btn btn-primary btn-xs" id="btnAddNew" value="+ Add Photo" style="margin-bottom:10px;">
							</div>
						</div>


						<div class="form-group">
							<label for="" class="col-sm-3 control-label" style="padding-top:13px;">Tour Videos </label>
							<div class="col-sm-8" style="padding-top:5px">
								<table id="videoSelection" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:90%;">Video iFrame Code</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                <input type="button" class="btn btn-primary btn-xs" id="btnAddNew1" value="+ Add Video" style="margin-bottom:10px;">
							</div>
						</div>

						
						<h3 class="seo-info">SEO Information</h3>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Title </label>
							<div class="col-sm-8">
								<input type="text" autocomplete="off" class="form-control" name="meta_title" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Keywords </label>
							<div class="col-sm-8">
								<textarea class="form-control" name="meta_keyword" style="height:140px;"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Description </label>
							<div class="col-sm-8">
								<textarea class="form-control" name="meta_description" style="height:140px;"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>

</section>