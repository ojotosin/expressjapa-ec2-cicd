<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_registration']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1>Registration</h1>
		</div>
	</div>
</div>

<div class="register-area bg-area pt_80 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<div class="col-md-offset-3 col-md-6 col-md-offset-3">

				<div class="regiser-form sell-form">
					<?php echo form_open(base_url().'traveller/registration_add',array('class' => '')); ?>
						<div class="form-row">
							<div class="form-group">
								<label for="">Full Name *</label>
								<input type="text" class="form-control" name="traveller_name" value="">
							</div>
							<div class="form-group">
								<label for="">Email Address *</label>
								<input type="email" class="form-control" name="traveller_email" value="">
							</div>
							<div class="form-group">
								<label for="">Phone Number *</label>
								<input type="text" class="form-control" name="traveller_phone" value="">
							</div>
							<div class="form-group">
								<label for="">Address *</label>
								<textarea name="traveller_address" class="form-control" cols="30" rows="10" style="height:120px;"></textarea>
							</div>
							<div class="form-group">
								<label for="">City *</label>
								<input type="text" class="form-control" name="traveller_city" value="">
							</div>
							<div class="form-group">
								<label for="">State *</label>
								<input type="text" class="form-control" name="traveller_state" value="">
							</div>
							<div class="form-group">
								<label for="">Country *</label>
								<input type="text" class="form-control" name="traveller_country" value="">
							</div>
							<div class="form-group">
								<label for="">Password *</label>
								<input type="password" class="form-control" name="traveller_password">
							</div>
							<div class="form-group">
								<label for="">Retype Password *</label>
								<input type="password" class="form-control" name="traveller_re_password">
							</div>
							<?php if($setting['recaptcha_status'] == 'Show'): ?>
							<div class="form-group">
                                <div class="g-recaptcha" data-sitekey="<?php echo $setting['recaptcha_site_key']; ?>"></div>
                            </div>
							<?php endif; ?>
							<button type="submit" class="btn btn-primary" name="form_registration">Register</button>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
