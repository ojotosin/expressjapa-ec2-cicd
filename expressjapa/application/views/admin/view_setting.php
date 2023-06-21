<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Settings Section</h1>
	</div>
</section>

<section class="content" style="min-height:auto;margin-bottom: -30px;">
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

		</div>
	</div>
</section>

<section class="content">

	<div class="row">
		<div class="col-md-12">
							
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_1" data-toggle="tab">Logo</a></li>
						<li><a href="#tab_2" data-toggle="tab">Favicon</a></li>
						<li><a href="#tab_3" data-toggle="tab">General Content</a></li>
						<li><a href="#tab_4" data-toggle="tab">Email</a></li>
						<li><a href="#tab_5" data-toggle="tab">News and Tours</a></li>
						<li><a href="#tab_6" data-toggle="tab">Home Page</a></li>
						<li><a href="#tab_9" data-toggle="tab">Banner</a></li>
                        <!--<li><a href="#tab_7" data-toggle="tab">Color</a></li>-->
                        <li><a href="#tab_8" data-toggle="tab">Payment</a></li>
                        <li><a href="#tab_10" data-toggle="tab">Captcha</a></li>
                        <li><a href="#tab_11" data-toggle="tab">Other</a></li>
					</ul>
					<div class="tab-content">
          				<div class="tab-pane active" id="tab_1">


          					<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
          					<div class="box box-info">
								<div class="box-body">
									<div class="form-group">
							            <label for="" class="col-sm-2 control-label">Existing Photo</label>
							            <div class="col-sm-6" style="padding-top:6px;">
							                <img src="<?php echo base_url(); ?>public/uploads/<?php echo $setting['logo']; ?>" class="existing-photo" style="height:80px;">
							            </div>
							        </div>
									<div class="form-group">
							            <label for="" class="col-sm-2 control-label">New Photo</label>
							            <div class="col-sm-6" style="padding-top:6px;">
							                <input type="file" name="photo_logo">
							            </div>
							        </div>
							        <div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_logo">Update Logo</button>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_close(); ?>

							


          				</div>
          				<div class="tab-pane" id="tab_2">

          					<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
							<div class="box box-info">
								<div class="box-body">
									<div class="form-group">
							            <label for="" class="col-sm-2 control-label">Existing Photo</label>
							            <div class="col-sm-6" style="padding-top:6px;">
							                <img src="<?php echo base_url(); ?>public/uploads/<?php echo $setting['favicon']; ?>" class="existing-photo" style="height:40px;">
							            </div>
							        </div>
									<div class="form-group">
							            <label for="" class="col-sm-2 control-label">New Photo</label>
							            <div class="col-sm-6" style="padding-top:6px;">
							                <input type="file" name="photo_favicon">
							            </div>
							        </div>
							        <div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_favicon">Update Favicon</button>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_close(); ?>


          				</div>
          				<div class="tab-pane" id="tab_3">

							<?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
							<div class="box box-info">
								<div class="box-body">
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">Footer - Copyright </label>
										<div class="col-sm-6">
											<input class="form-control" type="text" name="footer_copyright" value="<?php echo $setting['footer_copyright']; ?>">
										</div>
									</div>								
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">Footer Address </label>
										<div class="col-sm-6">
											<textarea class="form-control" name="footer_address" style="height:70px;"><?php echo $setting['footer_address']; ?></textarea>
										</div>
									</div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Footer Email </label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="footer_email" style="height:70px;"><?php echo $setting['footer_email']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Footer Phone </label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="footer_phone" style="height:70px;"><?php echo $setting['footer_phone']; ?></textarea>
                                        </div>
                                    </div>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">Top Bar Email </label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="top_bar_email" value="<?php echo $setting['top_bar_email']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">Top Bar Phone Number </label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="top_bar_phone" value="<?php echo $setting['top_bar_phone']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_general">Update</button>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_close(); ?>


          				</div>

          				<div class="tab-pane" id="tab_4">

          					<?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
							<div class="box box-info">
								<div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Send Email From <span>*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="send_email_from" maxlength="255" autocomplete="off" value="<?php echo $setting['send_email_from']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Receive Email To <span>*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="receive_email_to" maxlength="255" autocomplete="off" value="<?php echo $setting['receive_email_to']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">SMTP Host</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="smtp_host" maxlength="255" autocomplete="off" value="<?php echo $setting['smtp_host']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">SMTP Port</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="smtp_port" maxlength="255" autocomplete="off" value="<?php echo $setting['smtp_port']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">SMTP Username</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="smtp_username" maxlength="255" autocomplete="off" value="<?php echo $setting['smtp_username']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">SMTP Password</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="smtp_password" maxlength="255" autocomplete="off" value="<?php echo $setting['smtp_password']; ?>">
                                        </div>
                                    </div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_email">Update</button>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_close(); ?>


          				</div>

          				<div class="tab-pane" id="tab_5">

          					<?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
							<div class="box box-info">
								<div class="box-body">
									<div class="form-group">
										<label for="" class="col-sm-4 control-label">Footer (How many recent news?)<span>*</span></label>
										<div class="col-sm-2">
											<input type="text" class="form-control" name="total_recent_news_footer" value="<?php echo $setting['total_recent_news_footer']; ?>">
										</div>
									</div>		
									<div class="form-group">
										<label for="" class="col-sm-4 control-label">Footer (How many upcoming tours?)<span>*</span></label>
										<div class="col-sm-2">
											<input type="text" class="form-control" name="total_upcoming_tour_footer" value="<?php echo $setting['total_upcoming_tour_footer']; ?>">
										</div>
									</div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-4 control-label">Footer (How many featured tours?)<span>*</span></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="total_featured_tour_footer" value="<?php echo $setting['total_featured_tour_footer']; ?>">
                                        </div>
                                    </div>
									<div class="form-group">
										<label for="" class="col-sm-4 control-label">Sidebar (How many recent news?)<span>*</span></label>
										<div class="col-sm-2">
											<input type="text" class="form-control" name="total_recent_news_sidebar" value="<?php echo $setting['total_recent_news_sidebar']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-4 control-label">Home Page (How many recent news?)<span>*</span></label>
										<div class="col-sm-2">
											<input type="text" class="form-control" name="total_recent_news_home_page" value="<?php echo $setting['total_recent_news_home_page']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-4 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_news_tours">Update</button>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_close(); ?>


          				</div>


          				<div class="tab-pane" id="tab_6">
							
							
							<h3>Service Section</h3>
							<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
                            <div class="box box-info">
                                <div class="box-body">
	                                <div class="form-group">
										<label for="" class="col-sm-2 control-label">Title </label>
										<div class="col-sm-6">
											<input type="text" name="home_title_service" class="form-control" value="<?php echo $setting['home_title_service']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">SubTitle </label>
										<div class="col-sm-6">
											<input type="text" name="home_subtitle_service" class="form-control" value="<?php echo $setting['home_subtitle_service']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Show on Home? </label>
										<div class="col-sm-2">
											<select name="home_status_service" class="form-control select2" style="width:auto;">
                                                <option value="Show" <?php if($setting['home_status_service'] == 'Show') {echo 'selected';} ?>>Show</option>
                                                <option value="Hide" <?php if($setting['home_status_service'] == 'Hide') {echo 'selected';} ?>>Hide</option>
                                            </select>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_home_service">Update</button>
										</div>
									</div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>



                            <h3>Team Member Section</h3>
							<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
                            <div class="box box-info">
                                <div class="box-body">
	                                <div class="form-group">
										<label for="" class="col-sm-2 control-label">Title </label>
										<div class="col-sm-6">
											<input type="text" name="home_title_team_member" class="form-control" value="<?php echo $setting['home_title_team_member']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">SubTitle </label>
										<div class="col-sm-6">
											<input type="text" name="home_subtitle_team_member" class="form-control" value="<?php echo $setting['home_subtitle_team_member']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Show on Home? </label>
										<div class="col-sm-2" style="padding-top:7px;">
											<select name="home_status_team_member" class="form-control" style="width:auto;">
                                                <option value="Show" <?php if($setting['home_status_team_member'] == 'Show') {echo 'selected';} ?>>Show</option>
                                                <option value="Hide" <?php if($setting['home_status_team_member'] == 'Hide') {echo 'selected';} ?>>Hide</option>
                                            </select>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_home_team_member">Update</button>
										</div>
									</div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>


                            <h3>Counter Section (Text)</h3>
							<?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
                            <div class="box box-info">
                                <div class="box-body">
	                                <div class="form-group">
										<label for="" class="col-sm-2 control-label">Item 1 - Title </label>
										<div class="col-sm-3">
											<input type="text" name="counter_1_title" class="form-control" value="<?php echo $setting['counter_1_title']; ?>">
										</div>
										<label for="" class="col-sm-2 control-label">Item 1 - Value </label>
										<div class="col-sm-2">
											<input type="text" name="counter_1_value" class="form-control" value="<?php echo $setting['counter_1_value']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Item 2 - Title </label>
										<div class="col-sm-3">
											<input type="text" name="counter_2_title" class="form-control" value="<?php echo $setting['counter_2_title']; ?>">
										</div>
										<label for="" class="col-sm-2 control-label">Item 2 - Value </label>
										<div class="col-sm-2">
											<input type="text" name="counter_2_value" class="form-control" value="<?php echo $setting['counter_2_value']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Item 3 - Title </label>
										<div class="col-sm-3">
											<input type="text" name="counter_3_title" class="form-control" value="<?php echo $setting['counter_3_title']; ?>">
										</div>
										<label for="" class="col-sm-2 control-label">Item 3 - Value </label>
										<div class="col-sm-2">
											<input type="text" name="counter_3_value" class="form-control" value="<?php echo $setting['counter_3_value']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Item 4 - Title </label>
										<div class="col-sm-3">
											<input type="text" name="counter_4_title" class="form-control" value="<?php echo $setting['counter_4_title']; ?>">
										</div>
										<label for="" class="col-sm-2 control-label">Item 4 - Value </label>
										<div class="col-sm-2">
											<input type="text" name="counter_4_value" class="form-control" value="<?php echo $setting['counter_4_value']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Show on Home? </label>
										<div class="col-sm-2">
											<select name="counter_status" class="form-control select2" style="width:auto;">
                                                <option value="Show" <?php if($setting['counter_status'] == 'Show') {echo 'selected';} ?>>Show</option>
                                                <option value="Hide" <?php if($setting['counter_status'] == 'Hide') {echo 'selected';} ?>>Hide</option>
                                            </select>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_home_counter_text">Update</button>
										</div>
									</div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>



                            <h3>Counter Section (Photo)</h3>
							<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
                            <div class="box box-info">
                                <div class="box-body">	                                
									<div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Existing Counter Background</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <img src="<?php echo base_url(); ?>public/uploads/<?php echo $setting['counter_photo']; ?>" class="existing-photo" style="height:180px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">New Counter Background</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <input type="file" name="counter_photo">
                                        </div>
                                    </div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_home_counter_photo">Update</button>
										</div>
									</div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>

								
							<div class="row">
								<div class="col-md-6">
									<h3>Testimonial Section (Text)</h3>
									<?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
		                            <div class="box box-info">
		                                <div class="box-body">
			                                <div class="form-group">
												<label for="" class="col-sm-2 control-label">Title </label>
												<div class="col-sm-10">
													<input type="text" name="home_title_testimonial" class="form-control" value="<?php echo $setting['home_title_testimonial']; ?>">
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">SubTitle </label>
												<div class="col-sm-10">
													<input type="text" name="home_subtitle_testimonial" class="form-control" value="<?php echo $setting['home_subtitle_testimonial']; ?>">
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Show on Home? </label>
												<div class="col-sm-4">
													<select name="home_status_testimonial" class="form-control select2" style="width:auto;">
		                                                <option value="Show" <?php if($setting['home_status_testimonial'] == 'Show') {echo 'selected';} ?>>Show</option>
		                                                <option value="Hide" <?php if($setting['home_status_testimonial'] == 'Hide') {echo 'selected';} ?>>Hide</option>
		                                            </select>
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6">
													<button type="submit" class="btn btn-success pull-left" name="form_home_testimonial_text">Update</button>
												</div>
											</div>
		                                </div>
		                            </div>
		                            <?php echo form_close(); ?>
								</div>
								<div class="col-md-6">
									<h3>Testimonial Section (Photo)</h3>
									<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
		                            <div class="box box-info">
		                                <div class="box-body">	                                
											<div class="form-group">
		                                        <label for="" class="col-sm-2 control-label">Existing Testimonial Background</label>
		                                        <div class="col-sm-6" style="padding-top:6px;">
		                                            <img src="<?php echo base_url(); ?>public/uploads/<?php echo $setting['home_photo_testimonial']; ?>" class="existing-photo" style="height:180px;">
		                                        </div>
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="" class="col-sm-2 control-label">New Testimonial Background</label>
		                                        <div class="col-sm-6" style="padding-top:6px;">
		                                            <input type="file" name="home_photo_testimonial">
		                                        </div>
		                                    </div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6">
													<button type="submit" class="btn btn-success pull-left" name="form_home_testimonial_photo">Update</button>
												</div>
											</div>
		                                </div>
		                            </div>
		                            <?php echo form_close(); ?>
								</div>
							</div>

                            


                            



                            <h3>News Section</h3>
							<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
                            <div class="box box-info">
                                <div class="box-body">
	                                <div class="form-group">
										<label for="" class="col-sm-2 control-label">Title </label>
										<div class="col-sm-6">
											<input type="text" name="home_title_news" class="form-control" value="<?php echo $setting['home_title_news']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">SubTitle </label>
										<div class="col-sm-6">
											<input type="text" name="home_subtitle_news" class="form-control" value="<?php echo $setting['home_subtitle_news']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Show on Home? </label>
										<div class="col-sm-2">
											<select name="home_status_news" class="form-control select2" style="width:auto;">
                                                <option value="Show" <?php if($setting['home_status_news'] == 'Show') {echo 'selected';} ?>>Show</option>
                                                <option value="Hide" <?php if($setting['home_status_news'] == 'Hide') {echo 'selected';} ?>>Hide</option>
                                            </select>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_home_news">Update</button>
										</div>
									</div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>


                            <h3>Client Section</h3>
							<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
                            <div class="box box-info">
                                <div class="box-body">
	                                <div class="form-group">
										<label for="" class="col-sm-2 control-label">Title </label>
										<div class="col-sm-6">
											<input type="text" name="home_title_client" class="form-control" value="<?php echo $setting['home_title_client']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">SubTitle </label>
										<div class="col-sm-6">
											<input type="text" name="home_subtitle_client" class="form-control" value="<?php echo $setting['home_subtitle_client']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Show on Home? </label>
										<div class="col-sm-2">
											<select name="home_status_client" class="form-control select2" style="width:auto;">
                                                <option value="Show" <?php if($setting['home_status_client'] == 'Show') {echo 'selected';} ?>>Show</option>
                                                <option value="Hide" <?php if($setting['home_status_client'] == 'Hide') {echo 'selected';} ?>>Hide</option>
                                            </select>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_home_client">Update</button>
										</div>
									</div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>






                            <h3>Destination Section</h3>
                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Title </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="home_title_destination" class="form-control" value="<?php echo $setting['home_title_destination']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">SubTitle </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="home_subtitle_destination" class="form-control" value="<?php echo $setting['home_subtitle_destination']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Show on Home? </label>
                                        <div class="col-sm-2">
                                            <select name="home_status_destination" class="form-control select2" style="width:auto;">
                                                <option value="Show" <?php if($setting['home_status_destination'] == 'Show') {echo 'selected';} ?>>Show</option>
                                                <option value="Hide" <?php if($setting['home_status_destination'] == 'Hide') {echo 'selected';} ?>>Hide</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_home_destination">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>




                            <h3>Featured Package Section</h3>
                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Title </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="home_title_featured_package" class="form-control" value="<?php echo $setting['home_title_featured_package']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">SubTitle </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="home_subtitle_featured_package" class="form-control" value="<?php echo $setting['home_subtitle_featured_package']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Show on Home? </label>
                                        <div class="col-sm-2">
                                            <select name="home_status_featured_package" class="form-control select2" style="width:auto;">
                                                <option value="Show" <?php if($setting['home_status_featured_package'] == 'Show') {echo 'selected';} ?>>Show</option>
                                                <option value="Hide" <?php if($setting['home_status_featured_package'] == 'Hide') {echo 'selected';} ?>>Hide</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_home_featured_package">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>

			

                            
							
							
							<div class="row">
								<div class="col-md-6">
									<h3>Newsletter Section (Text)</h3>
									<?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
		                            <div class="box box-info">
		                                <div class="box-body">
			                                <div class="form-group">
												<label for="" class="col-sm-2 control-label">Title </label>
												<div class="col-sm-10">
													<input type="text" name="newsletter_title" class="form-control" value="<?php echo $setting['newsletter_title']; ?>">
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Newsletter Text </label>
												<div class="col-sm-10">
													<textarea name="newsletter_text" class="form-control" cols="30" rows="10" style="height: 120px;"><?php echo $setting['newsletter_text']; ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Status </label>
												<div class="col-sm-4">
													<select name="newsletter_status" class="form-control" style="width:auto;">
		                                                <option value="Show" <?php if($setting['newsletter_status'] == 'Show') {echo 'selected';} ?>>Show</option>
		                                                <option value="Hide" <?php if($setting['newsletter_status'] == 'Hide') {echo 'selected';} ?>>Hide</option>
		                                            </select>
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6">
													<button type="submit" class="btn btn-success pull-left" name="form_newsletter_text">Update</button>
												</div>
											</div>
		                                </div>
		                            </div>
		                            <?php echo form_close(); ?>
								</div>
								<div class="col-md-6">
									<h3>Newsletter Section (Photo)</h3>
									<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
		                            <div class="box box-info">
		                                <div class="box-body">
											<div class="form-group">
		                                        <label for="" class="col-sm-2 control-label">Existing Newsletter Background</label>
		                                        <div class="col-sm-6" style="padding-top:6px;">
		                                            <img src="<?php echo base_url(); ?>public/uploads/<?php echo $setting['newsletter_photo']; ?>" class="existing-photo" style="height:180px;">
		                                        </div>
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="" class="col-sm-2 control-label">New Newsletter Background</label>
		                                        <div class="col-sm-6" style="padding-top:6px;">
		                                            <input type="file" name="newsletter_photo">
		                                        </div>
		                                    </div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6">
													<button type="submit" class="btn btn-success pull-left" name="form_newsletter_photo">Update</button>
												</div>
											</div>
		                                </div>
		                            </div>
		                            <?php echo form_close(); ?>
								</div>
							</div>


          				</div>





          				<div class="tab-pane" id="tab_9">

                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">                                
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing About Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_about']; ?>" alt="" style="width: 100%;height:auto;">
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change About Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_about">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing FAQ Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_faq']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change FAQ Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_faq">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>

                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Service Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_service']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Service Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_service">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Testimonial Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_testimonial']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Testimonial Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_testimonial">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing News Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_news']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change News Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_news">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Contact Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_contact']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Contact Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_contact">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Search Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_search']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Search Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_search">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Category Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_category']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Category Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_category">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Terms Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_terms']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Terms Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_terms">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Privacy Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_privacy']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Privacy Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_privacy">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Destination Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_destination']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Destination Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_destination">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Team Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_team']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Team Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_team">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">    
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Payment Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_payment']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Payment Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_payment">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Payment Success Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_payment_success']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Payment Success Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_payment_success">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Payment Pending Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_payment_pending']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Payment Pending Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_payment_pending">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Registration Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_registration']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Registration Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_registration">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Login Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_login']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Login Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_login">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Forget Password Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_forget_password']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Forget Password Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_forget_password">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Reset Password Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_reset_password']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Reset Password Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_reset_password">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Reset Password Success Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_reset_password_success']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Reset Password Success Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_reset_password_success">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Verify Registration Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_verify_registration']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Verify Registration Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_verify_registration">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                        <tr>
                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
                                            <td style="width:50%">
                                                <h4>Existing Verify Subscriber Page Banner</h4>
                                                <p>
                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_verify_subscriber']; ?>" alt="" style="width: 100%;height:auto;">  
                                                </p>                                        
                                            </td>
                                            <td style="width:50%">
                                                <h4>Change Verify Subscriber Page Banner</h4>
                                                Select Photo<input type="file" name="photo">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_verify_subscriber">
                                            </td>
                                            <?php echo form_close(); ?>
                                        </tr>
                                    </table>
                                </div>
                            </div>
          					



          				</div>


                        <!--
                        <div class="tab-pane" id="tab_7">
                            <?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Color </label>
                                        <div class="col-sm-4">
                                            <input type="text" name="front_end_color" class="form-control jscolor" value="<?php echo $setting['front_end_color']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_color">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        -->




                        <div class="tab-pane" id="tab_8">
                            <?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">PayPal Email</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="paypal_email" maxlength="255" autocomplete="off" value="<?php echo $setting['paypal_email']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Stripe Public Key</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="stripe_public_key" maxlength="255" autocomplete="off" value="<?php echo $setting['stripe_public_key']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Stripe Secret Key</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="stripe_secret_key" maxlength="255" autocomplete="off" value="<?php echo $setting['stripe_secret_key']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Bank Detail</label>
                                        <div class="col-sm-5">
                                            <textarea name="bank_detail" class="form-control" cols="30" rows="10" style="height:130px;"><?php echo $setting['bank_detail']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_payment">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>




                        <div class="tab-pane" id="tab_10">
                            <?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Recaptcha Site Key</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="recaptcha_site_key" maxlength="255" autocomplete="off" value="<?php echo $setting['recaptcha_site_key']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Recaptcha Status</label>
                                        <div class="col-sm-5">
                                            <select name="recaptcha_status" class="form-control">
                                                <option value="Show" <?php echo ($setting['recaptcha_status'] == 'Show') ? 'selected' : ''; ?>>Show</option>
                                                <option value="Hide" <?php echo ($setting['recaptcha_status'] == 'Hide') ? 'selected' : ''; ?>>Hide</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_captcha">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>



                        <div class="tab-pane" id="tab_11">
                            <?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Preloader?</label>
                                        <div class="col-sm-3">
                                            <select name="preloader" class="form-control select2">
                                            	<option value="Show" <?php if($setting['preloader']=='Show') {echo 'selected';} ?>>Show</option>
                                            	<option value="Hide" <?php if($setting['preloader']=='Hide') {echo 'selected';} ?>>Hide</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Website Name</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="website_name" autocomplete="off" value="<?php echo $setting['website_name']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_other">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>






          			</div>
				</div>

			
		</div>
	</div>

</section>