<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_testimonial']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1><?php echo $page['testimonial_heading']; ?></h1>
		</div>
	</div>
</div>

<div class="testimonial-page pt_80 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<div class="col-md-12 mt_30">
				<div class="testi-page-carousel owl-carousel">
					<?php
					foreach ($testimonials as $row) {
						?>
						<div class="testimonial-item wow fadeIn" data-wow-delay="0.1s">
							<div class="testimonial-photo" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $row['photo']; ?>)"></div>
							<div class="testimonial-text">
								<h2><?php echo $row['name']; ?></h2>
								<h3><?php echo $row['designation']; ?></h3>
								<div class="testimonial-pra">
									<p>
										<?php echo nl2br($row['comment']); ?>
									</p>
								</div>
							</div>
						</div>
						<?php
					}
					?>					
				</div>
			</div>
		</div>
	</div>
</div>