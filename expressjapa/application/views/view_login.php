<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_login']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1>Login</h1>
		</div>
	</div>
</div>

<div class="login-area bg-area pt_80 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<div class="col-md-offset-4 col-md-4 col-md-offset-4">
				
				<div class="login-form">
					<?php echo form_open(base_url().'traveller/login',array('class' => '')); ?>
						<div class="form-row">
							<div class="form-group">
								<label for="">Email Address</label>
								<input type="text" class="form-control" name="traveller_email" value="<?php echo (PROJECT_MODE == 0) ? 'traveller@gmail.com' : ''; ?>">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" class="form-control" name="traveller_password" value="<?php echo (PROJECT_MODE == 0) ? '1234' : ''; ?>">
							</div>
							<?php if($setting['recaptcha_status'] == 'Show'): ?>
							<div class="form-group">
                                <div class="g-recaptcha" data-sitekey="<?php echo $setting['recaptcha_site_key']; ?>"></div>
                            </div>
							<?php endif; ?>
							<button type="submit" class="btn btn-primary" name="form1">Login</button> <a href="<?php echo base_url(); ?>traveller/forget_password" class="forget-password-link">Forget Password?</a>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>