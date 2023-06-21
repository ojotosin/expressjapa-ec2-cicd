<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_reset_password']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1>Reset Password</h1>
		</div>
	</div>
</div>

<div class="login-area bg-area pt_80 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<div class="col-md-offset-4 col-md-4 col-md-offset-4">
				<div class="login-form">
					<?php echo form_open(base_url().'traveller/reset_password/'.$var1.'/'.$var2);?>
						<div class="form-row">
							<div class="form-group">
								<label for="">New Password</label>
								<input type="password" class="form-control" name="traveller_password">
							</div>
							<div class="form-group">
								<label for="">Confirm Password</label>
								<input type="password" class="form-control" name="traveller_re_password">
							</div>
							<button type="submit" class="btn btn-primary" name="form1">Update</button>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>