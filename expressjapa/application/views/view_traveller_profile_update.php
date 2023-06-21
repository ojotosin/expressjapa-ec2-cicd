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
				<div class="detail-dashboard mt_30">
					<h1>Update Profile</h1>

					<?php
	                if($this->session->flashdata('error')) {
	                    echo '<div class="error-class">'.$this->session->flashdata('error').'</div>';
	                }
	                if($this->session->flashdata('success')) {
	                    echo '<div class="success-class">'.$this->session->flashdata('success').'</div>';
	                }
	                ?>

					<div class="login-area bg-area" style="padding-top: 0;">
						<div class="row">
							<div class="col-md-6">
								<div class="login-form">
									<?php echo form_open(base_url().'traveller/profile_update',array('class' => '')); ?>
										<div class="form-row">
											<div class="form-group">
												<label for="">Name *</label>
												<input type="text" class="form-control" name="traveller_name" value="<?php echo $this->session->userdata('traveller_name'); ?>">
											</div>

											<div class="form-group">
												<label for="">Email Address (Can not be changed)</label>
												<input type="email" class="form-control" name="" value="<?php echo $this->session->userdata('traveller_email'); ?>" disabled>
											</div>

											<div class="form-group">
												<label for="">Phone *</label>
												<input type="text" class="form-control" name="traveller_phone" value="<?php echo $this->session->userdata('traveller_phone'); ?>">
											</div>

											<div class="form-group">
												<label for="">Address *</label>
												<textarea name="traveller_address" class="form-control" cols="30" rows="10" style="height:120px;"><?php echo $this->session->userdata('traveller_address'); ?></textarea>
											</div>

											<div class="form-group">
												<label for="">City *</label>
												<input type="text" class="form-control" name="traveller_city" value="<?php echo $this->session->userdata('traveller_city'); ?>">
											</div>

											<div class="form-group">
												<label for="">State *</label>
												<input type="text" class="form-control" name="traveller_state" value="<?php echo $this->session->userdata('traveller_state'); ?>">
											</div>

											<div class="form-group">
												<label for="">Country *</label>
												<input type="text" class="form-control" name="traveller_country" value="<?php echo $this->session->userdata('traveller_country'); ?>">
											</div>

											<div class="form-group">
												<label for="">Password</label>
												<input type="password" class="form-control" name="traveller_password">
											</div>

											<div class="form-group">
												<label for="">Retype Password</label>
												<input type="password" class="form-control" name="traveller_re_password">
											</div>

											<button type="submit" class="btn btn-primary" name="form1">Update Information</button>

										</div>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>