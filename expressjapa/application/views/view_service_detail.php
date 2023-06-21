<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $service['banner']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1><?php echo $service['name']; ?></h1>
		</div>
	</div>
</div>

<div class="single-service-area pt_50 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<div class="col-md-8 wow fadeIn" data-wow-delay="0.1s">
				<div class="service-content mt_30">
					<div class="service-photo-item">
						<img src="<?php echo base_url(); ?>public/uploads/<?php echo $service['photo']; ?>" alt="<?php echo $service['name']; ?>">
					</div>
					<div class="row">
						<div class="col-sm-12 wow fadeIn" data-wow-delay="0.3s">
							<div class="service-details headstyle mt_30">
								<?php echo $service['description']; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 wow fadeIn" data-wow-delay="0.2s">
				<div class="service-sidebar mt_30">
					<div class="service-widget service-list headstyle">
						<h4>All Services</h4>
						<ul>
							<?php
							foreach ($services as $row) {
								?>
								<li class="<?php if($row['id'] == $id) {echo 'active';} ?>"><a href="<?php echo base_url(); ?>service/view/<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
								<?php
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>