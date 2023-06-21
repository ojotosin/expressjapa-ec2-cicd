<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Destination</h1>
	</div>
	<div class="content-header-right">
		<a href="destination.php" class="btn btn-primary btn-sm">View All</a>
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

			<?php echo form_open_multipart(base_url().'admin/destination/edit/'.$destination['d_id'],array('class' => 'form-horizontal')); ?>
				<input type="hidden" name="current_photo" value="<?php echo $destination['d_featured_photo']; ?>">
				<input type="hidden" name="current_banner" value="<?php echo $destination['d_banner_photo']; ?>">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Name *</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="d_name" value="<?php echo $destination['d_name']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Heading</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="d_heading" value="<?php echo $destination['d_heading']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Short Description </label>
							<div class="col-sm-6">
								<textarea class="form-control" name="d_short_description" style="height: 180px;"><?php echo $destination['d_short_description']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Package Heading</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="d_package_heading" value="<?php echo $destination['d_package_heading']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Package SubHeading</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="d_package_subheading" value="<?php echo $destination['d_package_subheading']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Detail Heading</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="d_detail_heading" value="<?php echo $destination['d_detail_heading']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Detail SubHeading</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="d_detail_subheading" value="<?php echo $destination['d_detail_subheading']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Existing Photo</label>
							<div class="col-sm-9" style="padding-top:5px">
								<img src="<?php echo base_url(); ?>public/uploads/<?php echo $destination['d_featured_photo']; ?>" alt="Featured Photo" style="width:200px;">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">New Photo</label>
							<div class="col-sm-8" style="padding-top:5px">
								<input type="file" name="photo">(Only jpg, jpeg, gif and png are allowed)
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Existing Banner</label>
							<div class="col-sm-9" style="padding-top:5px">
								<img src="<?php echo base_url(); ?>public/uploads/<?php echo $destination['d_banner_photo']; ?>" alt="Banner Photo" style="width:200px;">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">New Banner</label>
							<div class="col-sm-8" style="padding-top:5px">
								<input type="file" name="banner">(Only jpg, jpeg, gif and png are allowed)
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Introduction</label>
							<div class="col-sm-8" style="margin-top:5px;">
								<textarea class="form-control" id="editor1" name="d_introduction"><?php echo $destination['d_introduction']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Experience</label>
							<div class="col-sm-8" style="margin-top:5px;">
								<textarea class="form-control" id="editor2" name="d_experience"><?php echo $destination['d_experience']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Weather</label>
							<div class="col-sm-8" style="margin-top:5px;">
								<textarea class="form-control" id="editor3" name="d_weather"><?php echo $destination['d_weather']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Hotel</label>
							<div class="col-sm-8" style="margin-top:5px;">
								<textarea class="form-control" id="editor4" name="d_hotel"><?php echo $destination['d_hotel']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Transportation</label>
							<div class="col-sm-8" style="margin-top:5px;">
								<textarea class="form-control" id="editor5" name="d_transportation"><?php echo $destination['d_transportation']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Culture</label>
							<div class="col-sm-8" style="margin-top:5px;">
								<textarea class="form-control" id="editor6" name="d_culture"><?php echo $destination['d_culture']; ?></textarea>
							</div>
						</div>


						<h3 class="seo-info">SEO Information</h3>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Title </label>
							<div class="col-sm-8">
								<input type="text" autocomplete="off" class="form-control" name="meta_title" value="<?php echo $destination['meta_title']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Keywords </label>
							<div class="col-sm-8">
								<input type="text" autocomplete="off" class="form-control" name="meta_keyword" value="<?php echo $destination['meta_keyword']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Description </label>
							<div class="col-sm-8">
								<textarea class="form-control" name="meta_description" style="height:140px;"><?php echo $destination['meta_description']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
							</div>
						</div>
					</div>
				</div>

			<?php echo form_close(); ?>
		</div>
	</div>

</section>