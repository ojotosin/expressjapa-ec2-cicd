<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_service']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1><?php echo $page['service_heading']; ?></h1>
		</div>
	</div>
</div>

<div class="service-area pt_50 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<?php
			foreach ($services as $row) {
				?>
				<div class="col-md-4 col-xs-6 clear-three wow fadeIn" data-wow-delay="0.1s">
					<div class="service-item mt_30" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $row['photo']; ?>)">
						<a href="<?php echo base_url(); ?>service/view/<?php echo $row['id']; ?>">
								<i class="fa fa-cubes"></i>
								<div class="ser-text">
									<h4><?php echo $row['name']; ?></h4>
									<p>
										<?php echo nl2br($row['short_description']); ?>
									</p>
								</div>
							</a>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>